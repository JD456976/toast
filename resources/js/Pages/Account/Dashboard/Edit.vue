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
                        <dash-menu :user="user" />
                        <div class="col-md-9">
                            <flash-messages />
                            <h3 class="heading-2 mb-10">Update Your Info</h3>
                            <div class="col-12 pl-75">
                                <form @submit.prevent="update">
                                    <TabView class="tabview-custom" ref="tabview4">
                                        <TabPanel>
                                            <template #header>
                                                <span>Info</span>
                                                <i class="pi pi-calendar"></i>
                                            </template>
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
                                        </TabPanel>
                                        <TabPanel>
                                            <template #header>
                                                <span>Avatar</span>
                                                <i class="pi pi-user"></i>
                                            </template>
                                            <div class="col-9 md:col-12 mb-3">
                                                <div class="field">
                                                    <label class="form-label" for="image">Avatar</label>
                                                    <image-uploader :maxFiles="1" :allowMultiple="false"
                                                                    :files="media" />
                                                </div>
                                            </div>
                                        </TabPanel>
                                        <TabPanel>
                                            <template #header>
                                                <span>Password</span>
                                                <i class="pi pi-cog"></i>
                                            </template>
                                            <div class="col-9 md:col-12 mb-3">
                                                <div class="field">
                                                    <div>
                                                        <label for="password">Password</label>
                                                    </div>
                                                    <Password v-model="form.password" class="w-100"
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
                                                    <div>
                                                        <label for="password_confirmation">Confirm Password</label>
                                                    </div>
                                                    <Password v-model="form.password_confirmation" class="w-100"
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
                                        </TabPanel>
                                        <TabPanel>
                                            <template #header>
                                                <span>Misc</span>
                                                <i class="pi pi-cog"></i>
                                            </template>

                                            <div class="surface-section">
                                                <div class="font-medium text-3xl text-900 mb-3">Misc. Information</div>
                                                <div class="text-500 mb-5">Your information and stats
                                                </div>
                                                <ul class="list-none p-0 m-0">
                                                    <li class="flex align-items-center py-3 px-2 border-top-1 surface-border flex-wrap">
                                                        <div class="text-500 w-6 md:w-3 font-medium">Joined</div>
                                                        <div
                                                            class="text-900 w-full md:w-8 md:flex-order-0 flex-order-1">
                                                            {{ user.created_at }}
                                                        </div>
                                                    </li>
                                                    <li class="flex align-items-center py-3 px-2 border-top-1 surface-border flex-wrap">
                                                        <div class="text-500 w-6 md:w-3 font-medium"># of Deals Posted
                                                        </div>
                                                        <div
                                                            class="text-900 w-full md:w-8 md:flex-order-0 flex-order-1">
                                                            {{ user.deals.length }}
                                                        </div>
                                                    </li>
                                                    <li class="flex align-items-center py-3 px-2 border-top-1 surface-border flex-wrap">
                                                        <div class="text-500 w-6 md:w-3 font-medium"># of Bounties
                                                            Posted

                                                        </div>
                                                        <div
                                                            class="text-900 w-full md:w-8 md:flex-order-0 flex-order-1">
                                                            {{ user.bounties.length }}
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </TabPanel>
                                    </TabView>
                                    <Button type="submit" class="p-button-success" label="Save Changes"
                                            icon="pi pi-check" iconPos="right" />
                                </form>
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
import ImageUploader from "@/Shared/ImageUploader";
import TabPanel from "primevue/tabpanel";
import TabView from "primevue/tabview";


export default {
    components: {
        Head,
        DashMenu,
        Card,
        InputText,
        Password,
        Button,
        FlashMessages,
        ImageUploader,
        TabPanel,
        TabView
    },
    name: "Index",
    props: {
        user: Object,
        media: Array
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
                password_confirmation: ""
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
