<template>
    <Head>
        <title>Your Details</title>
        <meta name="description" content="Your Details">
    </Head>
    <div id="account-detail">
        <div class="card">
            <div class="card-header">
                <h5>Account Details</h5>
            </div>
            <div class="card-body">
                <form @submit.prevent="update">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <text-input
                                v-model="form.name"
                                class=""
                                :error="form.errors.name"
                                label="Name"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <text-input
                                v-model="form.email"
                                class=""
                                type="email"
                                :error="form.errors.email"
                                label="Email"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <image-upload />
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <text-input
                                v-model="form.password"
                                class=""
                                type="password"
                                :error="form.errors.password"
                                label="Password"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <text-input
                                v-model="form.password_confirmation"
                                class=""
                                type="password"
                                :error="form.errors.password_confirmation"
                                label="Confirm Password"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <button type="submit" :disabled="form.processing">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row justify-content-center">
                <div class="col-4">
                    <button type="button" class="btn btn-danger mt-20"
                            data-bs-toggle="modal" data-bs-target="#delete_account">
                        Delete Account
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Layout from "../../Shared/Layout";
import { Head } from "@inertiajs/inertia-vue3";
import TextInput from "../../Shared/TextInput";
import ImageUpload from "../../Shared/ImageUpload";


export default {
    components: {
        Head,
        TextInput,
        ImageUpload
    },
    name: "Index",
    props: {
        user: Object,
        errors: Object
    },
    layout: Layout,
    remember: "form",
    data() {
        return {
            form: this.$inertia.form({
                _method: "put",
                name: this.user.name,
                email: this.user.email,
                password: "",
                password_confirmation: "",
                avatar: ""
            })
        };
    },
    methods: {
        update() {
            this.form.post(`/account/update/${this.user.id}`, {
                onSuccess: () => this.form.reset("password", "password_confirmation")
            });
        }
    }
};
</script>
