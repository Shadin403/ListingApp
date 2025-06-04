<script setup>
import UpdateInfo from "./Sections/UpdateInfo.vue";
import UpdatePassword from "./Sections/UpdatePassword.vue";
import DeleteAccount from "./Sections/DeleteAccount.vue";

defineProps({
    user: Object,
    status: String,
});
</script>

<template>
    <UpdateInfo :user="user" :status="status" />
    <UpdatePassword :status="status" />
    <delete-account :status="status" />
</template>
