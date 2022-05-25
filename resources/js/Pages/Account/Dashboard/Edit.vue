<template>
    <Head>
        <title>Your Details</title>
        <meta name="description" content="Your Details">
    </Head>
    <div class="page-content pt-50 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <dash-menu />
                        <div class="col-md-9">
                            <flash-messages />
                            <h3 class="heading-2 mb-10">Update Your Info</h3>
                            <div class="col-12 pl-75">
                                <div>
                                    <form @submit.prevent="update">
                                        <div class="grid p-fluid">
                                            <div class="col-9 md:col-12 mb-3">
                                                <div class="field">
                                                    <label for="name">Name</label>
                                                    <InputText id="name" type="text"
                                                               v-bind:class='{"p-invalid": form.errors.name}'
                                                               v-model="form.name"
                                                    />
                                                    <small v-if="form.errors.name" id="name-help"
                                                           class="p-error">{{ form.errors.name }}</small>
                                                </div>
                                            </div>
                                            <div class="col-9 md:col-12 mb-3">
                                                <div class="field">
                                                    <label for="email">Email</label>
                                                    <InputText id="email" type="email"
                                                               v-bind:class='{"p-invalid": form.errors.email}'
                                                               v-model="form.email"
                                                    />
                                                    <small v-if="form.errors.email" id="name-help"
                                                           class="p-error">{{ form.errors.email }}</small>
                                                </div>
                                            </div>
                                            <div class="col-9 md:col-12 mb-3">
                                                <div class="field">
                                                    <label class="form-label" for="image">Image</label>
                                                    <FileUpload @input="form.image = $event.target.files[0]"
                                                                v-model="form.image" :multiple="true"
                                                                accept="image/*"
                                                                :maxFileSize="3000000">
                                                        <template #empty>
                                                            <p>Drag and drop files to here to upload.</p>
                                                        </template>
                                                    </FileUpload>
                                                </div>
                                            </div>
                                            <div class="col-9 md:col-12 mb-3">
                                                <div class="field">
                                                    <label for="password">Password</label>
                                                    <Password v-model="form.password"
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
                                            </div>
                                            <div class="col-9 md:col-12 mb-3">
                                                <div class="field">
                                                    <label for="password_confirmation">Confirm Password</label>
                                                    <Password v-model="form.password_confirmation"
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
                                            </div>
                                            <div class="col-9 md:col-12 mb-3">
                                                <div class="field">
                                                    <Button type="submit" class="p-button-success" label="Save Changes"
                                                            icon="pi pi-check" iconPos="right" />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import { Head } from "@inertiajs/inertia-vue3";
import DashMenu from "@/Shared/DashMenu";
import Card from "primevue/card";
import InputText from "primevue/inputtext";
import Password from "primevue/password";
import Button from "primevue/button";
import FlashMessages from "@/Shared/FlashMessages";
import FileUpload from "primevue/fileupload";


export default {
    components: {
        Head,
        DashMenu,
        Card,
        InputText,
        Password,
        Button,
        FlashMessages,
        FileUpload
    },
    name: "Index",
    props: {
        user: Object,
        errors: Object
    },
    remember: "form",
    data() {
        return {
            form: this.$inertia.form({
                _method: "put",
                name: this.user.name,
                email: this.user.email,
                password: "",
                image: "",
                password_confirmation: "",
                avatar: ""
            })
        };
    },
    methods: {
        update() {
            this.form.post(route("account.update", this.user.id), {
                onSuccess: () => this.form.reset("password", "password_confirmation")
            });
        }
    }
};
</script>
