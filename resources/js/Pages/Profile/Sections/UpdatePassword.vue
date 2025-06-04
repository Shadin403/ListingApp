<script setup>
import Container from "../../../Components/Container.vue";
import InputField from "../../../Components/InputField.vue";
import Title from "../../../Components/Title.vue";
import ErrorMessages from "../../../Components/ErroMessages.vue";
import SessionMessagess from "../../../Components/SessionMessagess.vue";
import { Head, useForm } from "@inertiajs/vue3";
import PrimaryBtn from "../../../Components/PrimaryBtn.vue";

const form = useForm({
    current_password: "",
    password: "",
    password_confirmation: "",
});

console.log(form);
const submit = () => {
    form.put(route("profile.password"), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Update Info" />
    <Container class="mb-6">
        <div class="mb-6">
            <Title>Update Password</Title>
            <p>
                Ensure your account is using a long, random password to stay
                secure.
            </p>
            <ErrorMessages :errors="form.errors" />
        </div>

        <form @submit.prevent="submit" class="space-y-6">
            <input-field
                label="Current Password"
                type="password"
                icon="key"
                v-model="form.current_password"
                class="w-1/2"
            />
            <input-field
                label="New Password"
                icon="key"
                class="w-1/2"
                v-model="form.password"
            />
            <input-field
                label="Confirm Password"
                icon="key"
                class="w-1/2"
                v-model="form.password_confirmation"
            />
            <p v-if="form.recentlySuccessful" class="text-green-500">Saved!</p>
            <primary-btn :disabled="form.processing">Save</primary-btn>
        </form>
    </Container>
</template>
