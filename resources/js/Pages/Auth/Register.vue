<template>
    <Head>
        <title>Register</title>
        <meta name="description" content="Register">
    </Head>
    <div class="row">
        <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
            <div class="row">
                <div class="col-lg-6 col-md-8">

                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h1 class="mb-5">Create an Account</h1>
                                <p class="mb-30">Already have an account?
                                    <Link :href="$route('login')">
                                        Login
                                    </Link>
                                </p>
                            </div>
                            <form @submit.prevent="register">
                                <div class="form-group">
                                    <InputText id="name" type="text"
                                               class="form-control"
                                               placeholder="Name"
                                               v-bind:class='{"p-invalid": form.errors.name}'
                                               v-model="form.name"
                                    />
                                    <small v-if="form.errors.name" id="name-help"
                                           class="p-error">{{ form.errors.name }}</small>
                                </div>
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
                                    <Password v-model="form.password"
                                              class="form-control"
                                              v-bind:class='{"p-invalid": form.errors.password}'>
                                        <template #header>
                                            <h6>Pick a password</h6>
                                        </template>
                                        <template #footer>
                                            <Divider />
                                            <p class="mt-2">Suggestions</p>
                                            <ul class="pl-2 ml-2 mt-0" style="line-height: 1.5">
                                                <li>At least one lowercase</li>
                                                <li>At least one uppercase</li>
                                                <li>At least one numeric</li>
                                                <li>Minimum 8 characters</li>
                                            </ul>
                                        </template>
                                    </Password>
                                    <small v-if="form.errors.password" id="name-help"
                                           class="p-error">{{ form.errors.password }}</small>
                                </div>
                                <div class="form-group">
                                    <Password v-model="form.password_confirmation"
                                              class="form-control"
                                              v-bind:class='{"p-invalid": form.errors.password_confirmation}'>
                                        <template #header>
                                            <h6>Confirm your password</h6>
                                        </template>
                                        <template #footer>
                                            <Divider />
                                            <p class="mt-2">Suggestions</p>
                                            <ul class="pl-2 ml-2 mt-0" style="line-height: 1.5">
                                                <li>At least one lowercase</li>
                                                <li>At least one uppercase</li>
                                                <li>At least one numeric</li>
                                                <li>Minimum 8 characters</li>
                                            </ul>
                                        </template>
                                    </Password>
                                    <small v-if="form.errors.password_confirmation" id="name-help"
                                           class="p-error">{{ form.errors.password_confirmation
                                        }}</small>
                                </div>
                                <div class="login_footer form-group mb-50">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <Checkbox id="binary" :binary="true"
                                                      v-bind:class='{"p-invalid": form.errors.tos}'
                                                      v-model="form.tos" />
                                            <label class="form-check-label" for="remember">Agree to TOS</label>
                                            <div>
                                                <small v-if="form.errors.tos" id="name-help"
                                                       class="p-error">{{ form.errors.tos
                                                    }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="page-privacy-policy.html"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean
                                        more</a>
                                </div>
                                <div class="form-group mb-30">
                                    <Button type="submit" label="Register" class="p-button-raised p-button-rounded"
                                            icon="pi pi-key"
                                            iconPos="right" />
                                </div>
                                <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to
                                    support your experience throughout this website, to manage access to your account,
                                    and for other purposes described in our privacy policy</p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pr-30 d-none d-lg-block">
                    <div class="card-login mt-115">
                        <a href="#" class="social-login facebook-login">
                            <img src="assets/imgs/theme/icons/logo-facebook.svg" alt="" />
                            <span>Continue with Facebook</span>
                        </a>
                        <a href="#" class="social-login google-login">
                            <img src="assets/imgs/theme/icons/logo-google.svg" alt="" />
                            <span>Continue with Google</span>
                        </a>
                        <a href="#" class="social-login apple-login">
                            <img src="assets/imgs/theme/icons/logo-apple.svg" alt="" />
                            <span>Continue with Apple</span>
                        </a>
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
import Password from "primevue/password";

export default {
    name: "Register",
    remember: "form",
    components: {
        Button,
        InputText,
        Head,
        FlashMessages,
        Password
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
