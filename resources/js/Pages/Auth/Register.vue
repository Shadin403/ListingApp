<script setup>
import Container from "../../Components/Container.vue";
import Title from "../../Components/Title.vue";
import TextLink from "../../Components/TextLink.vue";
import InputField from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import { useForm, Head } from "@inertiajs/vue3";
import ErrorMessages from "../../Components/ErroMessages.vue";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Register" />
    <Container class="w-1/2">
        <div class="mb-8 text-center">
            <Title>Register a new account</Title>

            <p>
                Already have an account?
                <TextLink routeName="login" label="Login" />
            </p>
        </div>

        <form @submit.prevent="submit" class="space-y-6">
            <ErrorMessages :errors="form.errors" />
            <input-field label="Name" icon="id-badge" v-model="form.name" />
            <input-field label="Email" icon="at" v-model="form.email" />
            <input-field
                label="Password"
                type="password"
                icon="key"
                v-model="form.password"
            />
            <input-field
                label="Password Confirmation"
                type="password"
                icon="key"
                v-model="form.password_confirmation"
            />
            <p class="text-sm text-slate-500 dark:text-slate-400">
                by creating an account, you agree to our Terms and Conditions
                and Privacy Policy
            </p>

            <primary-btn :disablad="form.processing">Register</primary-btn>
        </form>
    </Container>
</template>
