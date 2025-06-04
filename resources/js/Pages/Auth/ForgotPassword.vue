<script setup>
import Container from "../../Components/Container.vue";
import InputField from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import { useForm, Head } from "@inertiajs/vue3";
import ErrorMessages from "../../Components/ErroMessages.vue";
import SessionMessagess from "../../Components/SessionMessagess.vue";
defineProps({
    status: String,
});
const form = useForm({
    email: "",
});

const submit = () => {
    form.post(route("password.email"));
};
</script>

<template>
    <Head title="- Forgot Password" />
    <Container class="lg:w-[400px]">
        <div class="mb-8 text-center">
            <p>
                Forgot your password? No problem. Just let us know your email
                address and we will email you a password reset link that will
                allow you to choose a new one.
            </p>
        </div>
        <ErrorMessages :errors="form.errors" />
        <SessionMessagess :status="status" />
        <form @submit.prevent="submit" class="space-y-6">
            <input-field label="Email" icon="at" v-model="form.email" />

            <primary-btn :disabled="form.processing"
                >Sent Password Reset Link</primary-btn
            >
        </form>
    </Container>
</template>
