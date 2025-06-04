<script setup>
import { useForm } from "@inertiajs/vue3";
import Container from "../../Components/Container.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import SessionMessagess from "../../Components/SessionMessagess.vue";
const form = useForm({});
defineProps({
    status: String,
});
const submit = () => {
    form.post(route("verification.send"));
};
</script>

<template>
    <head title="-  Email Verification" />

    <Container class="w-1/2">
        <div class="mb-8 text-center">
            <Title>Email Verification</Title>

            <p>
                Thanks for signing up! Before getting started, could you verify
                your email address by clicking on the link we just emailed to
                you? If you didn't receive the email, we will gladly send you
                another.
            </p>

            <SessionMessagess :status="status" />

            <form @submit.prevent="submit" class="mt-4">
                <PrimaryBtn :disbaled="form.processing"
                    >Resend Verification Email</PrimaryBtn
                >
            </form>
        </div>
    </Container>
</template>
