<template>
    <Head>
        <title>Register</title>
        <meta name="description" content="Register">
    </Head>
    <div class="surface-ground px-4 py-8 md:px-6 lg:px-8">
        <div class="flex-wrap shadow-2">
            <form @submit.prevent="register">
                <div class="w-full lg:w-12 p-4 lg:p-7 surface-card">
                    <div class="flex align-items-center justify-content-between mb-7">
                        <span class="text-2xl font-medium text-900">Login</span>
                    </div>

                    <label for="name" class="block text-900 font-medium mb-2">Name</label>
                    <InputText id="name" type="text"
                               class="w-full mb-3 p-3"
                               placeholder="Name"
                               v-bind:class='{"p-invalid": form.errors.name}'
                               v-model="form.name" />
                    <small v-if="form.errors.name" id="name-help"
                           class="p-error">{{ form.errors.name }}</small>

                    <label for="email4" class="block text-900 font-medium mb-2">Email</label>
                    <InputText id="email" type="email"
                               class="w-full mb-3 p-3"
                               placeholder="Email"
                               v-bind:class='{"p-invalid": form.errors.email}'
                               v-model="form.email" />
                    <small v-if="form.errors.email" id="name-help"
                           class="p-error">{{ form.errors.email }}</small>

                    <label for="password" class="block text-900 font-medium mb-2">Password</label>
                    <Password class="w-full mb-3 p-3"
                              placeholder="Password"
                              v-bind:class='{"p-invalid": form.errors.password}'
                              v-model="form.password" toggleMask></Password>
                    <small v-if="form.errors.password" id="name-help"
                           class="p-error">{{ form.errors.password }}</small>

                    <label for="password_confirmation" class="block text-900 font-medium mb-2">Password
                        Confirmation</label>
                    <Password class="w-full mb-3 p-3"
                              placeholder="Password Confirmation"
                              v-bind:class='{"p-invalid": form.errors.password_confirmation}'
                              v-model="form.password_confirmation" toggleMask></Password>
                    <small v-if="form.errors.password_confirmation" id="name-help"
                           class="p-error">{{ form.errors.password_confirmation }}</small>

                    <div class="flex align-items-center justify-content-between mb-6">
                        <div class="flex align-items-center">
                            <Checkbox class="mr-2" id="tos" :binary="true"
                                      v-bind:class='{"p-invalid": form.errors.tos}'
                                      v-model="form.tos"></Checkbox>
                            <label for="tos">ToS?</label>
                        </div>
                        <forgot-password />
                    </div>

                    <Button type="submit" label="Sign Up" class="w-2 py-3 font-medium"></Button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import { Head } from "@inertiajs/inertia-vue3";
import FlashMessages from "@/Shared/FlashMessages";
import Password from "primevue/password";
import ForgotPassword from "@/Pages/Auth/ForgotPassword";
import Checkbox from "primevue/checkbox";

export default {
    name: "Register",
    remember: "form",
    components: {
        Button,
        InputText,
        Head,
        FlashMessages,
        Password,
        ForgotPassword,
        Checkbox
    },
    data() {
        return {
            form: this.$inertia.form({
                _method: "post",
                email: "",
                password: "",
                tos: "",
                name: ""
            })
        };
    },
    methods: {
        register() {
            this.form.post(route("register"), {
                onSuccess: () => this.form.reset("email", "password", "name")
            });
        }
    }
};
</script>

<style scoped>

</style>
