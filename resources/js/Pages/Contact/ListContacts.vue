<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DeleteContact from "@/Pages/Contact/DeleteContact.vue";
import EditButton from "@/Components/EditButton.vue";
import { Link } from '@inertiajs/vue3';
import TextInput from "@/Components/TextInput.vue";
import { router } from '@inertiajs/vue3'
import {reactive} from "vue";

const props = defineProps({ contacts: Object })

const searchQuery = reactive({
    term: ''
});

function reset()
{
    router.visit(route('contact.index'));
}

function searchContacts()
{
    router.post(route('contact.search'), {
        searchQuery: searchQuery.term,
    }, {
        preserveState: true
    })
}

</script>

<template>
    <Head title="Phonebook" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Contacts</h2>
        </template>

        <div class="pt-6 flex flex-row w-full justify-center items-center">
            <TextInput
                id="search_query"
                type="text"
                class="mt-1 w-1/2 mr-2"
                autofocus
                @keyup.enter="searchContacts"
                @input="searchContacts"
                v-model="searchQuery.term"
            />
            <div class="pr-2">
                <PrimaryButton @click="reset">Reset</PrimaryButton>
            </div>
            <div class="pr-2">
                <PrimaryButton @click="searchContacts">Search</PrimaryButton>
            </div>
        </div>


        <div class="flex flex-row justify-center">
            <div class="flex flex-col w-2/3">
                <div class="flex flex-col items-end py-10">
                    <Link :href="route('contact.create')">
                        <PrimaryButton>Create Contact</PrimaryButton>
                    </Link>
                </div>

                <div class="flex flex-col items-center">
                    <div v-for="contact in contacts" :key="contact.id" class="bg-white w-full">
                        <div class="flex hover:bg-gray-50 flex-row min-w-0 border-b-2 border-gray-50 p-2">
                            <div class="w-2/3">
                                <Link :href="route('contact.edit', contact)">
                                    <p class="text-lg hover:text-gray-700 text-center font-semibold leading-6 text-gray-900">{{ contact.first_name }} {{ contact.last_name }}</p>
                                </Link>
                                <p class="mt-1 text-center truncate text-xs leading-5 text-gray-500">{{contact.phone_num }}</p>
                            </div>
                            <div class="flex w-1/3 items-center justify-end p-4">
                                <Link class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out" :href="route('contact.edit', contact)">
                                    <EditButton></EditButton>
                                </Link>
                                <DeleteContact :contact="contact"></DeleteContact>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
