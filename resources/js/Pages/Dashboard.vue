<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import { onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    users: {
        type: Array,
        default: () => []
    },
    auth: {
        type: Object,
        required: true
    },
    jetstream: {
        type: Object,
        required: true
    }
});

onMounted(() => {
    console.log('Users:', props.users);
});
</script>

<template>
    <AppLayout>
        <Head title="Dashboard" />
        
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                    
                    <!-- Lista de usuários -->
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900">Usuários ({{ users.length }})</h3>
                        <div class="mt-6">
                            <div v-if="users.length === 0" class="text-gray-500">
                                Nenhum usuário encontrado.
                            </div>
                            <ul v-else class="divide-y divide-gray-200">
                                <li v-for="user in users" :key="user.id" class="py-4 flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ user.name }}</p>
                                        <p class="text-sm text-gray-500">{{ user.email }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
