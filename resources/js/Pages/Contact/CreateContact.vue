<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm, router} from '@inertiajs/vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";

const form = useForm({
    first_name: null,
    last_name: null,
    phone_num: null
})

function createContact() {
    form.post(route('contact.store'), {
        preserveScroll: true,
        onSuccess: () => alert('Contact created'),
    })
}

defineProps({ errors: Object })

</script>

<template>
    <Head title="Phonebook"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create a Contact</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Create new contact</h2>

                            <form @submit.prevent="createContact" class="mt-6 space-y-6">
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
                                        v-model="form.last_name"
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
                                    <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

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
