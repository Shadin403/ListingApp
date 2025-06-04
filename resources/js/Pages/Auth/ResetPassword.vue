<script setup>
import Container from "../../Components/Container.vue";
import Title from "../../Components/Title.vue";
import TextLink from "../../Components/TextLink.vue";
import InputField from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import { useForm, Head } from "@inertiajs/vue3";
import ErrorMessages from "../../Components/ErroMessages.vue";

const props = defineProps({
    token: String,
    email: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("password.update"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Register" />
    <Container class="w-1/2">
        <div class="mb-8 text-center">
            <Title>Reset Your Password</Title>
        </div>

        <form @submit.prevent="submit" class="space-y-6">
            <ErrorMessages :errors="form.errors" />

            <input-field
                label="Email"
                icon="at"
                v-model="form.email"
                placeholder="john@example.com"
            />
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

            <primary-btn :disabled="form.processing"
                >Reset Password</primary-btn
            >
        </form>
    </Container>
</template>
