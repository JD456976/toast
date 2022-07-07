<template>
    <Head>
        <title>Editing Announcement: {{ announcement.title }}</title>
        <meta name="description" content="Add New Store">
    </Head>
    <div class="col-12 ">
        <div class="card text-bg-light mb-3">
            <div class="card-header">Editing Announcement: {{ announcement.title }}</div>
            <div class="card-body">
                <form @submit.prevent="update">
                    <div class="col-12">
                        <label class="form-label" for="title">Title</label>
                        <InputText id="name" type="text"
                                   class="form-control"
                                   v-bind:class='{"p-invalid": form.errors.title}'
                                   v-model="form.title"
                        />
                        <small v-if="form.errors.title" id="name-help"
                               class="p-error">{{ form.errors.title }}</small>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="content">Content</label>
                        <Editor
                            :autoResize="true"
                            v-bind:class='{"p-invalid": form.errors.content}'
                            v-model="form.content"
                            editorStyle="height: 320px" />
                        <small v-if="form.errors.content" id="name-help"
                               class="p-error">{{ form.errors.content }}</small>
                    </div>
                    <div class="col-12">
                        <Dropdown v-model="form.type" :options="types"
                                  placeholder="Select a Type" />
                        <div>
                            <small v-if="form.errors.type" id="name-help"
                                   class="p-error">{{ form.errors.type }}</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <div>
                            <label class="form-label" for="content">Expires</label>
                        </div>
                        <Calendar id="icon" v-model="form.expires" :showIcon="true" />
                    </div>
                    <div class="col-12">
                        <Checkbox id="binary" :binary="true"
                                  trueValue="1"
                                  falseValue="0"
                                  v-bind:class='{"p-invalid": form.errors.is_active}'
                                  v-model="form.is_active" />
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>

                    <div class="col-12">
                        <Button type="submit" label="Edit Announcement" class="p-button-raised p-button-rounded"
                                icon="pi pi-check"
                                iconPos="right" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import Button from "primevue/button";
import AdminLayout from "@/Shared/AdminLayout";
import InputText from "primevue/inputtext";
import Checkbox from "primevue/checkbox";
import FlashMessages from "@/Shared/FlashMessages";
import Dropdown from "primevue/dropdown";
import Calendar from "primevue/calendar";
import Editor from "primevue/editor";

export default {
    name: "Create",
    remember: "form",
    components: {
        Button,
        InputText,
        Editor,
        Checkbox,
        Head,
        FlashMessages,
        Dropdown,
        Calendar
    },
    layout: AdminLayout,
    props: {
        announcement: Object,
        types: Array
    },
    data() {
        return {
            form: this.$inertia.form({
                _method: "patch",
                title: this.announcement.title,
                content: this.announcement.content,
                expires: this.announcement.expires,
                type: this.announcement.type,
                is_active: this.announcement.is_active
            })
        };
    },
    methods: {
        update() {
            this.form.patch(route("admin.announcement.update", this.announcement.id), {
                onSuccess: () => this.form.reset("title", "content")
            });
        }
    }
};
</script>

<style scoped>

</style>
