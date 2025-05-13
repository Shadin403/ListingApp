<script setup>
defineProps({
    routeName: String,
    label: String,
});
</script>

<template>
    <Link
        :href="route(routeName)"
        class="font-medium text-indigo-500 underline hover:text-indigo-600 dark:text-indigo-400 dark:hover:text-indigo-500"
        >{{ label }}</Link
    >
</template>
