<script setup>
const model = defineModel();

defineProps({
    label: String,
    icon: String,

    placeholer: {
        type: String,
        default: "",
    },

    type: {
        type: String,
        default: "text",
    },
});
</script>

<template>
    <div>
        <label
            :for="label"
            class="block text-sm font-medium text-slate-700 dark:text-slate-300"
            >{{ label }}</label
        >

        <div class="relative mt-1 rounded-md">
            <div
                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
            >
                <span class="grid text-sm place-content-center text-slate-400"
                    ><i :class="`fa-solid fa-${icon}`"></i
                ></span>
            </div>
            <input
                :type="type"
                :name="label"
                :placeholder="placeholer"
                v-model="model"
                class="block w-full pr-3 text-sm rounded-md pl-9 dark:text-slate-900 border-slate-300 outline-0 focus:ring-1 focus:ring-inset focus:ring-indigo-400 focus:border-indigo-400 placeholder:text-slate-400"
            />
        </div>
    </div>
</template>
