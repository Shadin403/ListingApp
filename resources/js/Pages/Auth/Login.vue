<script setup>
import Container from "../../Components/Container.vue";
import Title from "../../Components/Title.vue";
import TextLink from "../../Components/TextLink.vue";
import InputField from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import { useForm, Head } from "@inertiajs/vue3";
import ErrorMessages from "../../Components/ErroMessages.vue";
import CheckBox from "../../Components/CheckBox.vue";
import SessionMessagess from "../../Components/SessionMessagess.vue";

defineProps({
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Login" />
    <Container class="lg:w-[400px]">
        <div class="mb-8 text-center">
            <Title>Login to your account</Title>

            <p>
                Don't have an account?
                <TextLink routeName="register" label="Register" />
            </p>
        </div>

        <form @submit.prevent="submit" class="space-y-6">
            <ErrorMessages :errors="form.errors" />
            <SessionMessagess :status="status" />

            <input-field label="Email" icon="at" v-model="form.email" />
            <input-field
                label="Password"
                type="password"
                icon="key"
                v-model="form.password"
            />

            <div class="flex items-center justify-between">
                <check-box name="remember" v-model="form.remember"
                    >Remember me</check-box
                >
                <TextLink
                    routeName="password.request"
                    label="Forget Password"
                />
            </div>

            <primary-btn :disabled="form.processing">Login</primary-btn>
        </form>
    </Container>
</template>
