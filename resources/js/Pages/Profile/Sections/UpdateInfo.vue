<script setup>
import Container from "../../../Components/Container.vue";
import InputField from "../../../Components/InputField.vue";
import Title from "../../../Components/Title.vue";
import ErrorMessages from "../../../Components/ErroMessages.vue";
import SessionMessagess from "../../../Components/SessionMessagess.vue";
import { Head, router, useForm } from "@inertiajs/vue3";
import PrimaryBtn from "../../../Components/PrimaryBtn.vue";

const props = defineProps({
    user: Object,
    status: String,
});
const form = useForm({
    name: props.user.name,
    email: props.user.email,
});

const resentEmail = (e) => {
    router.post(
        route("verification.send"),
        {},
        {
            onStart: () => (e.target.disabled = true),
            onFinish: () => (e.target.disabled = false),
        }
    );
};
</script>

<template>
    <Head title="Update Info" />
    <Container class="mb-6">
        <div class="mb-6">
            <Title>Update Information</Title>
            <p>Update your account's profile information and email address.</p>
            <ErrorMessages :errors="form.errors" />
        </div>

        <form
            @submit.prevent="form.patch(route('profile.info'))"
            class="space-y-6"
        >
            <input-field
                label="Name"
                icon="id-badge"
                class="w-1/2"
                v-model="form.name"
            />
            <input-field
                label="Email"
                icon="at"
                class="w-1/2"
                v-model="form.email"
            />

            <div v-if="props.user.email_verified_at === null">
                <SessionMessagess :status="status" />
                <p>
                    Your email address is unverified.
                    <button
                        @click="resentEmail"
                        class="text-indigo-600 underline disabled:text-slate-400"
                    >
                        Click here to re-send the verification email.
                    </button>
                </p>
            </div>

            <primary-btn :disabled="form.processing">Save</primary-btn>
        </form>
    </Container>
</template>
