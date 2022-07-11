<template>
    <Head>
        <title>Add New Announcement</title>
        <meta name="description" content="Add New Announcement">
    </Head>
    <div class="col-12">
        <div class="card text-bg-light mb-3">
            <div class="card-header">Add New Announcement</div>
            <div class="card-body">
                <form @submit.prevent="create">
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
                            v-model="form.content" editorStyle="height: 320px" />
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
                        <ToggleButton class="h-2rem mr-3" v-bind:class='{"p-invalid": form.errors.is_active}'
                                      v-model="form.is_active"
                                      onIcon="pi pi-check" offIcon="pi pi-times" />
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>

                    <div class="col-12">
                        <Button type="submit" label="Save Announcement" class="p-button-raised p-button-rounded"
                                icon="pi pi-check"
                                iconPos="right" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import Dropdown from "primevue/dropdown";
import Calendar from "primevue/calendar";
import Editor from "primevue/editor";
import ToggleButton from "primevue/toggleButton";

const props = defineProps({
    types: Array
});

const form = useForm({
    title: "",
    content: "",
    expires: "",
    type: "",
    is_active: ""
});

const create = () => {
    form.post(route("admin.announcement.store"), {
        onSuccess: () => {
            form.reset("title", "content");
        }
    });
};
</script>

<script>
import AdminLayout from "@/Shared/AdminLayout";

export default {
    name: "AnnouncementCreate",
    remember: "form",
    layout: AdminLayout
};
</script>

<style scoped>

</style>
