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
    password: "",
});

const submit = () => {
    form.post(route("password.confirm"), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Confirm Password" />
    <Container class="lg:w-[400px]">
        <div class="mb-8 text-center">
            <p>
                This is a secure area of the application. Please confirm your
                password before continuing.
            </p>
        </div>
        <ErrorMessages :errors="form.errors" />

        <form @submit.prevent="submit" class="space-y-6">
            <input-field
                label="Password"
                type="password"
                icon="key"
                v-model="form.password"
            />
            <primary-btn :disabled="form.processing">Confirm</primary-btn>
        </form>
    </Container>
</template>
