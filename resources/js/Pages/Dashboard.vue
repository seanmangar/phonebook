<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Welcome to our phonebook app</div>
                </div>

                <div class="mt-12 bg-white overflow-hidden shadow-sm sm:rounded-lg w-1/4">
                    <ResponsiveNavLink :href="route('phonebook.index')">Access phonebook app </ResponsiveNavLink>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
