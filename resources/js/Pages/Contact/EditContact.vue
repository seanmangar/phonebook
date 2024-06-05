<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, router} from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from '@inertiajs/vue3'

const props = defineProps({ errors: Object, contact: Object })


const form = useForm({
    'first_name': props.contact.first_name,
    'last_name': props.contact.last_name,
    'phone_num': props.contact.phone_num,
});

function updateContact(contact) {
    form.post(route('contact.update', contact), {
        preserveScroll: true,
        onSuccess: () => alert('Contact updated'),
    })
}
</script>

<template>
    <Head title="Phonebook"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit {{ contact.first_name }} {{ contact.last_name }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Edit {{ contact.first_name }} {{ contact.last_name }}</h2>

                            <form @submit.prevent="updateContact(contact)" class="mt-6 space-y-6">
                                <div>
                                    <InputLabel for="first_name" value="First Name"/>
                                    <TextInput
                                        id="first_name"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.first_name"
                                        required
                                        autofocus
                                        autocomplete="first_name"
                                    />
                                    <InputError class="mt-2" :message="errors.first_name"/>
                                </div>

                                <div>
                                    <InputLabel for="last_name" value="Last Name"/>
                                    <TextInput
                                        id="last_name"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="contact.last_name"
                                        required
                                        autofocus
                                        autocomplete="last_name"
                                    />
                                    <InputError class="mt-2" :message="errors.last_name"/>
                                </div>

                                <div>
                                    <InputLabel for="phone_num" value="Phone Number"/>
                                    <TextInput
                                        id="phone_num"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.phone_num"
                                        required
                                        autofocus
                                        autocomplete="phone_num"
                                    />
                                    <InputError class="mt-2" :message="errors.phone_num"/>
                                </div>


                                <div class="flex items-center gap-4">
                                    <PrimaryButton :disabled="form.processing">Update</PrimaryButton>

                                    <Transition
                                        enter-active-class="transition ease-in-out"
                                        enter-from-class="opacity-0"
                                        leave-active-class="transition ease-in-out"
                                        leave-to-class="opacity-0"
                                    >
                                        <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                                    </Transition>
                                </div>
                            </form>

                        </header>
                    </section>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<style scoped>

</style>
