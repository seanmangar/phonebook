<script setup>
import DeleteButton from "@/Components/DeleteButton.vue";
import {router} from "@inertiajs/vue3";

defineProps({ contact: Object })

function deleteContact(contact) {
    router.delete(route('contact.destroy', contact.id), {preserveScroll: true})
}
</script>

<template>
    <DeleteButton @click="deleteContact(contact)"></DeleteButton>
</template>

<style scoped>

</style>
