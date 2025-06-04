<script setup>
import { switchTheme } from "../theme";
import Swal from "sweetalert2";
import NavLink from "../Components/NavLink.vue";
import { usePage } from "@inertiajs/vue3";
import { computed, ref, watch } from "vue";
const show = ref(false);
const page = usePage();
const user = computed(() => page.props.auth.user);
const successMessage = computed(() => page.props.flash.success);
const errorMessage = computed(() => page.props.flash.error);

// Flash messages

watch(successMessage, (message) => {
    if (message) {
        Swal.fire({
            icon: "success",
            title: "Success",
            text: message,
            showConfirmButton: false,
            timer: 1500,
        });
    }
});

watch(errorMessage, (message) => {
    if (message) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: message,
            showConfirmButton: false,
            timer: 1500,
        });
    }
});
</script>

<template>
    <!-- *Overlay -->
    <div v-show="show" @click="show = false" class="fixed inset-0 z-40"></div>

    <header class="text-white bg-slate-800">
        <nav
            class="flex items-center justify-between max-w-screen-lg p-6 mx-auto"
        >
            <Link class="text-2xl font-bold" :href="route('home')">
                Listing App
            </Link>
            <nav-link routeName="home" componentName="Home">Home</nav-link>

            <div class="flex items-center space-x-6">
                <div v-if="user" class="relative">
                    <div
                        @click="show = !show"
                        class="flex items-center gap-2 px-3 py-1 rounded-lg cursor-pointer hover:bg-slate-700"
                        :class="{ 'bg-slate-700': show }"
                    >
                        <p>{{ user.name }}</p>
                        <i class="fa-solid fa-caret-down"></i>
                    </div>

                    <div
                        v-show="show"
                        @click="show = false"
                        class="absolute right-0 z-50 w-40 overflow-hidden text-white border rounded-lg top-16 bg-slate-800 border-slate-300"
                    >
                        <Link
                            :href="route('dashboard')"
                            class="block w-full px-6 py-3 text-left hover:bg-slate-700"
                            >Dashboard</Link
                        >
                        <Link
                            :href="route('profile.edit')"
                            class="block w-full px-6 py-3 text-left hover:bg-slate-700"
                            >Profile</Link
                        >
                        <Link
                            :href="route('logout')"
                            class="block w-full px-6 py-3 text-left hover:bg-slate-700"
                            >Logout</Link
                        >
                    </div>
                </div>

                <div v-else class="space-x-6">
                    <nav-link routeName="login" componentName="Auth/Login"
                        >Login</nav-link
                    >
                    <nav-link routeName="register" componentName="Auth/Register"
                        >Register</nav-link
                    >
                </div>

                <button
                    @click="switchTheme"
                    class="grid h-6 rounded-full hover:bg-slate-700 w-7 place-items-center hover:outline-1 outline-white"
                >
                    <i class="fa-solid fa-circle-half-stroke"></i>
                </button>
            </div>
        </nav>
    </header>

    <main class="max-w-screen-lg p-6 mx-auto">
        <!-- <p class="text-red-500" v-if="errorMessage">{{ errorMessage }}</p>
        <p class="text-green-500" v-if="successMessage">{{ successMessage }}</p> -->
        <slot />
    </main>
</template>
