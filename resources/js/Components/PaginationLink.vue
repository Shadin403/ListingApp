<script setup>
defineProps({
    links: Array,
});
</script>

<template>
    <div v-if="links.length > 3">
        <div
            v-for="link in links"
            :key="link.url"
            class="inline-flex items-center -space-x-px"
        >
            <Link
                v-if="link.url"
                :href="link.url"
                class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
                :class="{ 'bg-gray-100 text-gray-700': link.active }"
                v-html="link.label"
            ></Link>
        </div>
    </div>
    <div v-else>
        <div class="inline-flex items-center -space-x-px">
            <Link
                class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
                :class="{ 'bg-gray-100 text-gray-700': link.active }"
                v-html="link.label"
            ></Link>
        </div>
    </div>
</template>
