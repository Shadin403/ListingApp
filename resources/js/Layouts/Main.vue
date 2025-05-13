<script setup>
import { switchTheme } from "../theme";
import LavLink from "../Components/NavLink.vue";
</script>

<template>
    <header class="text-white bg-slate-800">
        <nav
            class="flex items-center justify-between max-w-screen-lg p-6 mx-auto"
        >
           
            <lav-link routeName="home">Home</lav-link>
            <lav-link routeName="login">Login</lav-link>

            <div>
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
        <slot />
    </main>
</template>
