<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function redirect(string $provider): RedirectResponse
    {
        try {
            Log::info('Iniciando redirecionamento para ' . $provider);
            $url = Socialite::driver($provider)->stateless()->redirect()->getTargetUrl();
            Log::info('URL de redirecionamento: ' . $url);
            return new RedirectResponse($url);
        } catch (Exception $e) {
            Log::error('Erro no redirecionamento: ' . $e->getMessage());
            return redirect()->route('login')->withErrors([
                'email' => 'Erro ao iniciar login social.',
            ]);
        }
    }

    public function callback(string $provider)
    {
        try {
            Log::info('Iniciando callback do ' . $provider);
            
            $socialUser = Socialite::driver($provider)->stateless()->user();
            Log::info('Dados do usuário social:', [
                'id' => $socialUser->getId(),
                'email' => $socialUser->getEmail(),
                'name' => $socialUser->getName()
            ]);

            $user = User::updateOrCreate([
                'email' => $socialUser->getEmail(),
            ], [
                'name' => $socialUser->getName(),
                'password' => bcrypt(Str::random(16)),
                'provider_id' => $socialUser->getId(),
                'provider_name' => $provider,
                'provider_token' => $socialUser->token,
                'provider_refresh_token' => $socialUser->refreshToken,
            ]);

            Log::info('Usuário encontrado/criado:', [
                'id' => $user->id,
                'email' => $user->email
            ]);

            if (!$user->currentTeam) {
                $team = Team::forceCreate([
                    'user_id' => $user->id,
                    'name' => explode(' ', $user->name, 2)[0]."'s Team",
                    'personal_team' => true,
                ]);

                $user->current_team_id = $team->id;
                $user->save();

                $user->teams()->attach($team, ['role' => 'admin']);
                $user->switchTeam($team);

                $team->save();

                Log::info('Time criado:', [
                    'team_id' => $team->id,
                    'team_name' => $team->name
                ]);
            }

            Auth::login($user);

            Log::info('Status da autenticação:', [
                'autenticado' => Auth::check(),
                'usuario_id' => Auth::id(),
                'team_id' => $user->currentTeam?->id
            ]);

            return redirect()->route('dashboard');
        } catch (Exception $e) {
            Log::error('Erro no callback: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return redirect()->route('login')->withErrors([
                'email' => 'Erro ao realizar login social: ' . $e->getMessage(),
            ]);
        }
    }
} 