<script setup>
import DeleteButton from "@/Components/DeleteButton.vue";
import {router} from "@inertiajs/vue3";

defineProps({ contact: Object })

function deleteContact(contact) {
    router.delete(route('contact.destroy', contact.id), {
        preserveScroll: true,
        onSuccess: () => alert('Contact deleted'),
    })
}
</script>

<template>
    <DeleteButton @click.once="deleteContact(contact)"></DeleteButton>
</template>

<style scoped>

</style>
