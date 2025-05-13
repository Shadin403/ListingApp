<script setup>
const model = defineModel();

defineProps({
    name: String,
});
</script>

<template>
    <div class="flex items-center gap-2">
        <input
            type="checkbox"
            v-model="model"
            :id="name"
            class="text-indigo-500 rounded-md border-1 outline-0 ring-indigo-500 border-slate-700"
        />

        <label
            :for="name"
            class="block text-sm font-medium cursor-pointer text-slate-700 dark:text-slate-300"
            ><slot
        /></label>
    </div>
</template>
