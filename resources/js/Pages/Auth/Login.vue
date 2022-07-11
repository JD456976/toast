<template>
    <Head>
        <title>Login</title>
        <meta name="description" content="Login">
    </Head>
    <div class="surface-ground px-4 py-8 md:px-6 lg:px-8">
        <div class="flex-wrap shadow-2">
            <form @submit.prevent="login">
                <div class="w-full lg:w-12 p-4 lg:p-7 surface-card">
                    <div class="flex align-items-center justify-content-between mb-7">
                        <span class="text-2xl font-medium text-900">Login</span>
                        <Link
                            class="font-medium text-blue-500 hover:text-blue-700 cursor-pointer transition-colors transition-duration-150"
                            tabindex="0" :href="$route('register')">
                            Sign Up
                        </Link>
                    </div>
                    <div class="flex justify-content-between">
                        <Button
                            class="mr-2 w-6 font-medium border-1 surface-border surface-100 py-3 px-2 p-component hover:surface-200 active:surface-300 text-900 cursor-pointer transition-colors transition-duration-150 inline-flex align-items-center justify-content-center">
                            <i class="pi pi-twitter text-indigo-400 mr-2"></i>
                            <span>Sign in With Twitter</span>
                        </Button>
                        <Button
                            class="mr-2 w-6 font-medium border-1 surface-border surface-100 py-3 px-2 p-component hover:surface-200 active:surface-300 text-900 cursor-pointer transition-colors transition-duration-150 inline-flex align-items-center justify-content-center">
                            <i class="pi pi-discord text-indigo-400 mr-2"></i>
                            <span>Sign in With Discord</span>
                        </Button>
                        <Button
                            class="ml-2 w-6 font-medium border-1 surface-border surface-100 py-3 px-2 p-component hover:surface-200 active:surface-300 text-900 cursor-pointer transition-colors transition-duration-150 inline-flex align-items-center justify-content-center">
                            <i class="pi pi-google text-pink-400 mr-2"></i>
                            <span>Sign in With Google</span>
                        </Button>
                    </div>
                    <Divider align="center" class="my-4">
                        <span class="text-600 font-normal text-sm">OR</span>
                    </Divider>

                    <label for="email4" class="block text-900 font-medium mb-2">Email</label>
                    <InputText id="email" type="email"
                               class="w-full mb-3 p-3"
                               placeholder="Email"
                               v-bind:class='{"p-invalid": form.errors.email}'
                               v-model="form.email" />
                    <small v-if="form.errors.email" id="name-help"
                           class="p-error">{{ form.errors.email }}</small>

                    <label for="password4" class="block text-900 font-medium mb-2">Password</label>
                    <InputText id="password" type="password"
                               class="w-full mb-3 p-3"
                               placeholder="Password"
                               v-bind:class='{"p-invalid": form.errors.password}'
                               v-model="form.password" />
                    <small v-if="form.errors.password" id="name-help"
                           class="p-error">{{ form.errors.password }}</small>

                    <div class="flex align-items-center justify-content-between mb-6">
                        <div class="flex align-items-center">
                            <div class="col-12">
                                <ToggleButton class="h-2rem mr-3" v-bind:class='{"p-invalid": form.errors.remember}'
                                              v-model="form.remember"
                                              onIcon="pi pi-check" offIcon="pi pi-times" />
                                <label for="rememberme">Remember me</label>
                            </div>
                        </div>
                        <forgot-password />
                    </div>
                    <Button type="submit" label="Sign In" class="p-button-raised w-2 py-3 font-medium"></Button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import ToggleButton from "primevue/toggleButton";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import ForgotPassword from "@/Pages/Auth/ForgotPassword";
import Divider from "primevue/divider";

const props = defineProps({
    session: Object
});

const form = useForm({
    email: "",
    password: "",
    remember: ""
});

const login = () => {
    form.post(route("login"), {
        onSuccess: () => {
            form.reset("email", "password");
        }
    });
};


</script>

<script>


export default {
    name: "Login",
    remember: "form"
};
</script>

<style scoped>

</style>
