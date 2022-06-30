<template>
    <Head>
        <title>Your Details</title>
        <meta name="description" content="Your Details">
    </Head>
    <div class="p-4">
        <div class="surface-border border-round surface-card" style="min-height: 20rem">
            <div class="grid">
                <dash-menu class="col-3" :user="user" />
                <div class="col-4 px-5 flex flex-column flex-auto">
                    <div>
                        <form @submit.prevent="update">
                            <div class="surface-card p-4 shadow-2 border-round">
                                <div class="flex align-items-center text-xl font-medium text-900 mb-4">Your Info</div>
                                <div class="grid formgrid p-fluid">
                                    <div class="field mb-4 col-12">
                                        <label for="nickname" class="font-medium">Name</label>
                                        <InputText id="name" type="text" disabled
                                                   v-bind:class='{"p-invalid": form.errors.name}'
                                                   v-model="form.name"
                                        />
                                        <small v-if="form.errors.name" id="name-help"
                                               class="p-error">{{ form.errors.name }}</small>
                                    </div>
                                    <div class="surface-100 mb-3 col-12" style="height:2px"></div>
                                    <div class="field mb-4 col-12 md:col-6">
                                        <label for="bio" class="font-medium">Bio</label>
                                        <Editor v-bind:class='{"p-invalid": form.errors.bio}' v-model="form.bio"
                                                editorStyle="height: 320px">
                                            <template v-slot:toolbar>
                                                <span class="ql-formats">
                                                    <button class="ql-bold" v-tooltip.bottom="'Bold'"></button>
                                                    <button class="ql-italic" v-tooltip.bottom="'Italic'"></button>
                                                    <button class="ql-underline"
                                                            v-tooltip.bottom="'Underline'"></button>
                                                </span>
                                            </template>
                                        </Editor>
                                        <small v-if="form.errors.bio" id="name-help"
                                               class="p-error">{{ form.errors.bio }}</small>
                                    </div>
                                    <div class="field mb-4 col-12 md:col-6">
                                        <label for="avatar" class="font-medium">Avatar</label>
                                        <div class="flex align-items-center">
                                            <Avatar class="mr-4"
                                                    v-bind:class='{"p-invalid": form.errors.avatar}'
                                                    image="https://i.pravatar.cc/300"
                                                    shape="circle"></Avatar>
                                            <div class="field col-9">
                                                <image-uploader :maxFiles="1" :allowMultiple="false"
                                                                :files="media" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="surface-100 mb-3 col-12" style="height:2px"></div>
                                    <div class="field mb-4 col-12 md:col-6">
                                        <label for="email" class="font-medium">Email</label>
                                        <InputText id="email" type="email"
                                                   v-bind:class='{"p-invalid": form.errors.email}'
                                                   v-model="form.email"
                                        />
                                        <small v-if="form.errors.email" id="name-help"
                                               class="p-error">{{ form.errors.email }}</small>
                                    </div>
                                    <div class="field mb-4 col-12 md:col-6">
                                        <label for="bio" class="font-medium">Country</label>
                                        <Dropdown v-model="form.country" :options="countries"
                                                  optionLabel="name" :filter="true"
                                                  filterBy="name" :showClear="true"
                                                  placeholder="Select a Country">
                                            <template #option="slotProps">
                                                <div class="flex align-items-center">
                                                    <div>{{ slotProps.option.name }}</div>
                                                </div>
                                            </template>
                                        </Dropdown>
                                    </div>
                                    <div class="field mb-4 col-12 md:col-6">
                                        <label for="city" class="font-medium">Password</label>
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
                                    <div class="field mb-4 col-12 md:col-6">
                                        <label for="state" class="font-medium">Confirm Password</label>
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
                                    <div class="surface-100 mb-3 col-12" style="height:2px"></div>
                                    <div class="field mb-4 col-12">
                                        <label for="website" class="font-medium">Website</label>
                                        <div class="p-inputgroup">
                                            <span class="p-inputgroup-addon">www</span>
                                            <InputText
                                                v-bind:class='{"p-invalid": form.errors.website}'
                                                v-model="form.website" id="website" type="text" />
                                            <small v-if="form.errors.website" id="name-help"
                                                   class="p-error">{{ form.errors.website
                                                }}</small>
                                        </div>
                                    </div>
                                    <div class="surface-100 mb-3 col-12" style="height:2px"></div>
                                    <div class="field mb-4 col-12">
                                        <label for="privacy" class="font-medium">Privacy</label>
                                        <div class="flex align-items-center">
                                            <InputSwitch :binary="true"
                                                         v-model="form.comment_notifications"></InputSwitch>
                                            <span class="mx-2">Comment Notifications</span>
                                            <InputSwitch :binary="true" class="ml-5"
                                                         v-model="form.deal_notifications"></InputSwitch>
                                            <span class="mx-2">Deal Notifications</span>
                                            <InputSwitch :binary="true" class="ml-5"
                                                         v-model="form.followers_notifications"></InputSwitch>
                                            <span class="mx-2">Follower Notifications</span>
                                        </div>
                                    </div>
                                    <div class="surface-100 mb-3 col-12" style="height:2px"></div>
                                    <div class="col-12">
                                        <Button type="submit" label="Save Changes" class="w-auto mt-3"></Button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
import Avatar from "primevue/avatar";
import Dropdown from "primevue/dropdown";
import InputSwitch from "primevue/inputswitch";
import Editor from "primevue/editor";
import Tooltip from "primevue/tooltip";


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
        TabView,
        Avatar,
        Dropdown,
        InputSwitch,
        Editor
    },
    name: "Index",
    props: {
        user: Object,
        media: Array
    },
    remember: "form",
    data() {
        return {
            checked: true,
            countries: [
                { name: "Australia", code: "AU" },
                { name: "Brazil", code: "BR" },
                { name: "China", code: "CN" },
                { name: "Egypt", code: "EG" },
                { name: "France", code: "FR" },
                { name: "Germany", code: "DE" },
                { name: "India", code: "IN" },
                { name: "Japan", code: "JP" },
                { name: "Spain", code: "ES" },
                { name: "United States", code: "US" }
            ],
            form: this.$inertia.form({
                _method: "put",
                name: this.user.name,
                email: this.user.email,
                country: this.user.country,
                comment_notifications: this.user.comment_notifications,
                deal_notifications: this.user.deal_notifications,
                followers_notifications: this.user.followers_notifications,
                bio: this.user.bio,
                website: this.user.website,
                password: "",
                password_confirmation: ""
            })
        };
    },
    directives: {
        "tooltip": Tooltip
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
