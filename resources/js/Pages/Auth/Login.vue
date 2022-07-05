<template>
    <Head>
        <title>Login</title>
        <meta name="description" content="Login">
    </Head>
    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
        <div class="row">
            <div class="col-lg-6 pr-30 d-none d-lg-block">
                <img class="border-radius-15" src="assets/frontend/imgs/page/login-1.png" alt="" />
            </div>
            <div class="col-lg-6 col-md-8">

                <div class="login_wrap widget-taber-content background-white">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h1 class="mb-5">Login</h1>
                            <p class="mb-30">Don't have an account?
                                <Link :href="$route('register')">
                                    Register Here
                                </Link>
                            </p>
                        </div>
                        <form @submit.prevent="login">
                            <div class="form-group">
                                <InputText id="email" type="email"
                                           class="form-control"
                                           placeholder="Email"
                                           v-bind:class='{"p-invalid": form.errors.email}'
                                           v-model="form.email"
                                />
                                <small v-if="form.errors.email" id="name-help"
                                       class="p-error">{{ form.errors.email }}</small>
                            </div>
                            <div class="form-group">
                                <InputText id="password" type="password"
                                           class="form-control"
                                           placeholder="Password"
                                           v-bind:class='{"p-invalid": form.errors.password}'
                                           v-model="form.password"
                                />
                                <small v-if="form.errors.password" id="name-help"
                                       class="p-error">{{ form.errors.password }}</small>
                            </div>
                            <div class="login_footer form-group mb-50">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <div class="field-checkbox">
                                        </div>
                                        <Checkbox id="binary" :binary="true"
                                                  v-bind:class='{"p-invalid": form.errors.remember}'
                                                  v-model="form.remember" />
                                        <label for="binary">Remember Me</label>
                                    </div>
                                </div>
                                <forgot-password />
                            </div>
                            <div class="form-group">
                                <Button type="submit" label="Login" class="p-button-raised p-button-rounded"
                                        icon="pi pi-key"
                                        iconPos="right" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import { Head } from "@inertiajs/inertia-vue3";
import FlashMessages from "@/Shared/FlashMessages.vue";
import ForgotPassword from "@/Pages/Auth/ForgotPassword.vue";
import Checkbox from "primevue/checkbox";

export default {
    name: "Login",
    remember: "form",
    components: {
        ForgotPassword,
        Button,
        InputText,
        Head,
        FlashMessages,
        Checkbox
    },
    props: { session: Object },
    data() {
        return {
            form: this.$inertia.form({
                _method: "post",
                email: "",
                password: "",
                remember: ""
            })
        };
    },
    methods: {
        login() {
            this.form.post(route("login"), {
                onSuccess: () => this.form.reset("email", "password")
            });
        }
    }
};
</script>

<style scoped>

</style>
