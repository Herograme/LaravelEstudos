<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\User;
use Laravel\Jetstream\Jetstream;

class DashboardController extends Controller
{
    public function index()
    {   
        return Inertia::render('Dashboard', [
            'users' => User::select('id', 'name', 'email')->get(),
            'auth' => [
                'user' => [
                    'id' => auth()->id(),
                    'name' => auth()->user()->name,
                    'email' => auth()->user()->email,
                    'current_team_id' => auth()->user()->current_team_id,
                    'all_teams' => auth()->user()->allTeams(),
                    'current_team' => auth()->user()->currentTeam,
                ],
            ],
            'jetstream' => [
                'canCreateTeams' => Jetstream::hasTeamFeatures(),
                'canManageTwoFactorAuthentication' => true,
                'canUpdatePassword' => true,
                'canUpdateProfileInformation' => true,
                'hasEmailVerification' => false,
                'hasTeamFeatures' => Jetstream::hasTeamFeatures(),
                'managesProfilePhotos' => Jetstream::managesProfilePhotos(),
            ],
        ]);
    }
} 