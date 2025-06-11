<script setup>
defineProps({
    listing: Object,
});
</script>

<template>
    <div
        class="flex flex-col justify-between h-full overflow-hidden bg-white rounded shadow-lg dark:bg-slate-800"
    >
        <div>
            <div class="w-full h-48 bg-slate-300">
                <Link>
                    <img
                        class="object-cover w-full h-full"
                        :src="
                            listing.image
                                ? `/storage/${listing.image}`
                                : `/storage/images/listing/default.png`
                        "
                        alt="Card image"
                    />
                </Link>
            </div>

            <div class="p-4">
                <h3 class="mb-2 text-2xl font-semibold leading-tight">
                    {{ listing.title.substring(0, 20) + "..." || "No title()" }}
                </h3>
                <p class="mb-2 text-sm text-gray-700 dark:text-gray-300">
                    Card description
                </p>
                <p>
                    Listed on
                    {{ new Date(listing.created_at).toDateString() }} by User
                    <button class="text-link">{{ listing.user.name }}</button>
                </p>
            </div>
        </div>
        <div v-if="listing.tags" class="flex items-center gap-3 px-4 pb-4">
            <div v-for="tag in listing.tags" :key="tag">
                <button class="tag-button">
                    {{ tag }}
                </button>
            </div>
        </div>
    </div>
</template>
