<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { computed } from "vue";
// import { usePage } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
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
// const page = usePage();

// console.log(page.props.errors.email);
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <div class="text-center">
            <a
                href="auth/github/redirect"
                class="inline-block bg-white p-2 rounded-md hover:bg-gray-300 duration-300"
            >
                <img
                    :src="'https://icon-library.com/images/github-icon/github-icon-15.jpg'"
                    alt="Github Icon"
                    class="rounded-full w-12 h-12"
                />
            </a>
            <a
                href="auth/google/redirect"
                class="inline-block bg-white p-2 rounded-md ml-2 hover:bg-gray-300 duration-300"
            >
                <img
                    :src="'https://icon-library.com/images/free-google-icon/free-google-icon-17.jpg'"
                    alt="Google Icon"
                    class="rounded-full w-12 h-12"
                />
            </a>
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" class="text-white" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <div v-if="$page.props.errors" class="text-red-600">
                    {{ $page.props.errors.email }}
                </div>
            </div>

            <div class="mt-4">
                <InputLabel
                    for="password"
                    value="Password"
                    class="text-white"
                />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-white">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Forgot your password?
                </Link>

                <Link
                    :href="route('register')"
                    class="underline text-sm text-white ml-4 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Dont have account?
                </Link>

                <PrimaryButton
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
