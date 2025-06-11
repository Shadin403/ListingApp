<script setup>
import { watch } from "vue";
import { router, useForm, Head } from "@inertiajs/vue3";
// import debounce from "lodash/debounce";

import Card from "../Components/Card.vue";
import PaginationLink from "../Components/PaginationLink.vue";
import InputField from "../Components/InputField.vue";

const props = defineProps({
    listings: Object,
    filters: Object,
});

const form = useForm({
    search: "",
});

const search = () => {
    router.get(
        route("home"),
        { search: form.search }, // Pass the search term as a query parameter
        {
            preserveState: true, // Keep component state (e.g., input focus)
            preserveScroll: true, // Don't scroll to the top on new results
            replace: true, // Avoid adding new entries to browser history
        }
    );
};
</script>

<template>
    <!-- Use <main> for the primary content of the page for better semantics -->
    <main>
        <Head title="Home" />

        <div class="flex items-center justify-between mb-4">
            <div class="text-3xl font-bold">Listings</div>

            <div class="w-full md:w-1/3">
                <form @submit.prevent="search">
                    <InputField
                        label="Search"
                        type="search"
                        icon="magnifying-glass"
                        placeholder="Search by city, address..."
                        v-model="form.search"
                    />
                </form>
                <!-- Note: A visually hidden label is better for accessibility than an empty one.
                     Ensure your InputField component can handle this. -->
            </div>
        </div>

        <!-- Check if the 'data' array has items. This is more precise than
             checking if the paginator object itself has keys. -->
        <div
            v-if="listings.data.length"
            class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3"
        >
            <div v-for="listing in listings.data" :key="listing.id">
                <Card :listing="listing" />
            </div>
        </div>
        <!-- This block is shown when no listings match the criteria -->
        <div v-else>
            <p class="text-gray-500">No listings found matching your search.</p>
            <button class="text-link" @click.prevent="form.search = ''">
                Reset Page
            </button>
        </div>

        <!-- This section is now conditionally rendered to avoid showing it when there are no results -->
        <div
            v-if="listings.data.length"
            class="flex flex-col items-center justify-between mt-6 md:flex-row"
        >
            <PaginationLink :links="listings.links" />

            <div class="mt-4 text-sm text-gray-600 md:mt-0">
                Showing {{ listings.from }} to {{ listings.to }} of
                {{ listings.total }} results
            </div>
        </div>
    </main>
</template>
