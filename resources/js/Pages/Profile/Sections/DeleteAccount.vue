<script setup>
import Container from "../../../Components/Container.vue";
import InputField from "../../../Components/InputField.vue";
import Title from "../../../Components/Title.vue";
import ErrorMessages from "../../../Components/ErroMessages.vue";
import SessionMessagess from "../../../Components/SessionMessagess.vue";
import { Head, useForm } from "@inertiajs/vue3";
import PrimaryBtn from "../../../Components/PrimaryBtn.vue";
import { ref } from "vue";

const form = useForm({
    password: "",
});

const showConfirmPassword = ref(false);

console.log(form);
const submit = () => {
    form.delete(route("deleteUser"));
};
</script>

<template>
    <Head title="Update Info" />
    <Container class="mb-6">
        <div class="mb-6">
            <Title>Delete Account</Title>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Reprehenderit quibusdam eveniet quasi, harum minima veritatis
                numquam sunt sed vero itaque soluta modi facere odit laborum
                corporis corrupti repellat, excepturi perspiciatis.
            </p>
            <ErrorMessages :errors="form.errors" />
        </div>

        <div v-show="showConfirmPassword">
            <form @submit.prevent="submit" class="space-y-6">
                <input-field
                    label="Password"
                    type="password"
                    icon="key"
                    v-model="form.password"
                    class="w-1/2"
                />

                <primary-btn :disabled="form.processing">Confirm</primary-btn>
                <button
                    @click="showConfirmPassword = false"
                    class="ml-5 font-medium text-indigo-500 underline dark:text-indigo-400"
                >
                    Cancel
                </button>
            </form>
        </div>

        <button
            v-show="!showConfirmPassword"
            @click="showConfirmPassword = true"
            class="flex items-center justify-center gap-2 px-6 py-3 mt-10 text-lg font-semibold text-white transition-colors duration-300 bg-red-600 rounded-xl hover:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 disabled:bg-slate-300 disabled:cursor-not-allowed"
        >
            <i class="fa-solid fa-trash"></i>
            Delete Account
        </button>
    </Container>
</template>
