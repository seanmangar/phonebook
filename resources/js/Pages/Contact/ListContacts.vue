<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import NavLink from "@/Components/NavLink.vue";
import DeleteContact from "@/Pages/Contact/DeleteContact.vue";

defineProps({ contacts: Object })

</script>

<template>
    <Head title="Phonebook" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Contacts</h2>
        </template>

        <!-- TODO: search bar -->
        <!-- TODO: search bar -->

        <div class="flex flex-col">
            <div class="flex flex-row-reverse py-10">
                <NavLink :href="route('contact.create')">
                    <PrimaryButton>Create Contact</PrimaryButton>
                </NavLink>
            </div>

            <div class="flex flex-col items-center">
                <div v-for="contact in contacts" :key="contact.id" class="bg-white w-1/2">
                    <div class="flex flex-row min-w-0 border-b-2 border-gray-50">
                        <div class="w-2/3">
                            <p class="text-sm text-center font-semibold leading-6 text-gray-900">{{
                                    contact.first_name
                                }} {{ contact.last_name }}</p>
                            <p class="mt-1 text-center truncate text-xs leading-5 text-gray-500">{{
                                    contact.phone_num
                                }}</p>
                        </div>
                        <div class="flex w-1/3 justify-end">
                            <DeleteContact :contact="contact"></DeleteContact>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
