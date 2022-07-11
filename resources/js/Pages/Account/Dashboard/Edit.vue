<template>
    <Head>
        <title>Your Details</title>
        <meta name="description" content="Your Details">
    </Head>
    <div class="p-4">
        <div class="surface-border border-round surface-card" style="min-height: 20rem">
            <div class="grid">
                <dash-menu class="col-3" :auth="auth" />
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
                                            <div class="field col-12">
                                                <image-uploader :maxFiles="1" :allowMultiple="false"
                                                                :files="auth.user.avatar" />
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
                                                  optionValue="code"
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
                                            <ToggleButton class="h-2rem mr-3"
                                                          v-bind:class='{"p-invalid": form.errors.comment_notifications}'
                                                          v-model="form.comment_notifications"
                                                          onIcon="pi pi-check" offIcon="pi pi-times" />
                                            <span class="mx-2">Comment Notifications</span>
                                            <ToggleButton class="h-2rem ml-5"
                                                          v-bind:class='{"p-invalid": form.errors.deal_notifications}'
                                                          v-model="form.deal_notifications"
                                                          onIcon="pi pi-check" offIcon="pi pi-times" />
                                            <span class="mx-2">Deal Notifications</span>
                                            <ToggleButton class="h-2rem ml-5"
                                                          v-bind:class='{"p-invalid": form.errors.followers_notifications}'
                                                          v-model="form.followers_notifications"
                                                          onIcon="pi pi-check" offIcon="pi pi-times" />
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

<script setup>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import DashMenu from "@/Shared/DashMenu";
import InputText from "primevue/inputtext";
import Password from "primevue/password";
import Button from "primevue/button";
import ImageUploader from "@/Shared/ImageUploader";
import Dropdown from "primevue/dropdown";
import Editor from "primevue/editor";
import ToggleButton from "primevue/toggleButton";
import { ref } from "vue";

const props = defineProps({
    auth: Object,
    user: Object
});

const countries = ref([
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
]);

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    country: props.user.country,
    comment_notifications: props.user.comment_notifications,
    deal_notifications: props.user.deal_notifications,
    followers_notifications: props.user.followers_notifications,
    bio: props.user.bio,
    website: props.user.website,
    password: "",
    password_confirmation: ""
});

const update = () => {
    form.put(route("account.update", props.user.id), {
        onSuccess: () => {
            form.reset("password", "password_confirmation");
        }
    });
};

</script>

<script>
import Tooltip from "primevue/tooltip";

export default {
    name: "DashboardEdit",
    remember: "form",
    directives: {
        "tooltip": Tooltip
    }
};
</script>
