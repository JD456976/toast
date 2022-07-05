<template>
    <Head>
        <title>Warning For: {{ warn.user.name }}</title>
        <meta name="description" content="Edit Warning">
    </Head>
    <div class="col-6 col-offset-3 ">
        <div class="card text-bg-light mb-3">

            <div class="card-header">Warning For: {{ warn.user.name }}</div>
            <div class="card-body">
                <form @submit.prevent="update">
                    <div class="col-12">
                        <div>
                            <label class="form-label" for="reason">Reason</label>
                        </div>
                        <Dropdown
                            v-model="form.reason"
                            v-bind:class='{"p-invalid": form.errors.reason}'
                            :options="reasons"
                            optionLabel="name"
                            optionValue="value"
                            placeholder="Select a Reason" />
                        <div>
                            <small v-if="form.errors.reason" id="name-help"
                                   class="p-error">{{ form.errors.reason }}</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="content">Content</label>
                        <Editor v-model="form.content" v-bind:class='{"p-invalid": form.errors.content}'
                                class="form-control" editorStyle="height: 320px" />
                        <small v-if="form.errors.content" id="name-help"
                               class="p-error">{{ form.errors.content }}</small>
                    </div>
                    <div class="col-12">
                        <div>
                            <label for="basic">Warn Expiration Date</label>
                        </div>
                        <Calendar v-bind:class='{"p-invalid": form.errors.expires}'
                                  id="basic" v-model="form.expires" autocomplete="off" />
                        <div>
                            <small v-if="form.errors.expires" id="name-help"
                                   class="p-error">{{ form.errors.expires }}</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <Button type="submit" label="Update" class="p-button-raised p-button-sm mr-2" />
                        <Link
                            v-tooltip.top="'Delete Warning'"
                            method="delete"
                            :href="$route('admin.warn.destroy',warn.id)">
                            <Button label="Delete" class="p-button-raised p-button-danger p-button-sm mr-2">
                            </Button>
                        </Link>
                        <Link
                            v-tooltip.top="'Cancel'"
                            method="get"
                            :href="$route('admin.warn.index')">
                            <Button label="Cancel" class="p-button-raised p-button-secondary p-button-sm">
                            </Button>
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Button from "primevue/button";
import { Head, Link } from "@inertiajs/inertia-vue3";
import FlashMessages from "@/Shared/FlashMessages.vue";
import Editor from "primevue/editor";
import AdminLayout from "@/Shared/AdminLayout.vue";
import Dropdown from "primevue/dropdown";
import Calendar from "primevue/calendar";
import Tooltip from "primevue/tooltip";

export default {
    name: "Edit",
    remember: "form",
    components: {
        Button,
        Head,
        FlashMessages,
        Editor,
        Dropdown,
        Calendar,
        Link
    },
    props: {
        warn: Object
    },
    directives: {
        "tooltip": Tooltip
    },
    layout: AdminLayout,
    data() {
        return {
            form: this.$inertia.form({
                _method: "patch",
                reason: this.warn.reason,
                content: this.warn.content,
                expires: this.warn.expires
            }),
            reasons: [
                { name: "Spam", value: "spam" },
                { name: "Duplicate", value: "dupe" },
                { name: "Missing Info", value: "info" },
                { name: "Other", value: "other" }
            ]
        };
    },
    methods: {
        update() {
            this.form.patch(route("admin.warn.update", this.warn.id), {
                onSuccess: () => this.form.reset("reason", "content")
            });
        }
    }
};
</script>

<style scoped>

</style>
