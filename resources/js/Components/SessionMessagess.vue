<script setup>
defineProps({
    status: String,
});
</script>

<template>
    <div class="mb-4 text-sm font-medium text-green-600" v-if="status">
        {{ status }}
    </div>
</template>
