<template>
    <Head>
        <title>Reset Password</title>
        <meta name="description" content="Reset Password">
    </Head>
    <div class="row">
        <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <flash-messages />
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h1 class="mb-5">Reset Password</h1>
                                <p class="mb-30">Already have an account?
                                    <Link :href="$route('login')">
                                        Login
                                    </Link>
                                </p>
                            </div>
                            <form @submit.prevent="reset">
                                <div class="form-group">
                                    <InputText id="email" type="text"
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
                                              placeholder="Password"
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
                                    <div>
                                        <small v-if="form.errors.password" id="name-help"
                                               class="p-error">{{ form.errors.password }}</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <Password v-model="form.password_confirmation"
                                              placeholder="Confirm Password"
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
                                    <div>
                                        <small v-if="form.errors.password_confirmation" id="name-help"
                                               class="p-error">{{ form.errors.password_confirmation
                                            }}</small>
                                    </div>
                                </div>
                                <div class="form-group mb-30">
                                    <Button type="submit" label="Reset Password"
                                            class="p-button-raised p-button-rounded"
                                            icon="pi pi-lock"
                                            iconPos="right" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import FlashMessages from "@/Shared/FlashMessages";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import Password from "primevue/password";


export default {
    name: "ResetPassword",
    components: {
        Head,
        FlashMessages,
        Button,
        InputText,
        Password
    },
    props: {
        email: String,
        token: String
    },
    data() {
        return {
            form: this.$inertia.form({
                _method: "post",
                email: this.$page.props.route.query.email,
                password: "",
                password_confirmation: "",
                token: this.$page.props.route.params.token
            })
        };
    },
    methods: {
        reset() {
            this.form.post(route("password.update"), {
                onSuccess: () => {
                    this.form.reset("email", "password", "password_confirmation")
                    this.$toast.add({
                        severity: "success",
                        summary: "Success!",
                        detail: "Your password was reset. Please login with your new password",
                        life: 5000
                    });
                }
            });
        }
    }
};
</script>

<style scoped>

</style>
