<template>
    <Head>
        <title>Editing Page: {{ page.title }}</title>
        <meta name="description" content="Edit Page">
    </Head>
    <div class="col-12">
        <div class="card text-bg-light mb-3">

            <div class="card-header">Editing Page: {{ page.title }}</div>
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
                        <Editor v-model="form.content" v-bind:class='{"p-invalid": form.errors.content}'
                                class="form-control" editorStyle="height: 320px" />
                        <small v-if="form.errors.content" id="name-help"
                               class="p-error">{{ form.errors.content }}</small>
                    </div>
                    <div class="col-9 md:col-12 mb-3">
                        <div class="field">
                            <label class="form-label" for="image">Image</label>
                            <image-uploader :maxFiles="1" :allowMultiple="false" :files="media" />
                        </div>
                    </div>
                    <div class="col-12">
                        <ToggleButton class="h-2rem mr-3" v-bind:class='{"p-invalid": form.errors.is_active}'
                                      v-model="form.is_active"
                                      onIcon="pi pi-check" offIcon="pi pi-times" />
                        <label class="form-check-label" for="is_featured">Active</label>
                        <div>
                            <small v-if="form.errors.is_active" id="name-help"
                                   class="p-error">{{ form.errors.is_active }}</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <ToggleButton class="h-2rem mr-3" v-bind:class='{"p-invalid": form.errors.header_menu}'
                                      v-model="form.header_menu"
                                      onIcon="pi pi-check" offIcon="pi pi-times" />
                        <label class="form-check-label" for="is_featured">Header Menu</label>
                        <div>
                            <small v-if="form.errors.header_menu" id="name-help"
                                   class="p-error">{{ form.errors.header_menu }}</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <ToggleButton class="h-2rem mr-3" v-bind:class='{"p-invalid": form.errors.footer_menu}'
                                      v-model="form.footer_menu"
                                      onIcon="pi pi-check" offIcon="pi pi-times" />
                        <label class="form-check-label" for="is_featured">Footer Menu</label>
                        <div>
                            <small v-if="form.errors.footer_menu" id="name-help"
                                   class="p-error">{{ form.errors.footer_menu }}</small>
                        </div>
                    </div>

                    <div class="col-12">
                        <Button type="submit" label="Edit Page" class="p-button-raised p-button-rounded"
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
import ToggleButton from "primevue/toggleButton";
import Editor from "primevue/editor";
import ImageUploader from "@/Shared/ImageUploader";

const props = defineProps({
    page: Object,
    media: Array
});

const form = useForm({
    title: props.page.title,
    content: props.page.content,
    is_active: props.page.is_active,
    footer_menu: props.page.footer_menu,
    header_menu: props.page.header_menu
});

const update = () => {
    form.patch(route("admin.page.update", props.page.id), {
        onSuccess: () => {
            form.reset("title", "content");
        }
    });
};
</script>

<script>
import AdminLayout from "@/Shared/AdminLayout";

export default {
    name: "PageEdit",
    remember: "form",
    layout: AdminLayout
};
</script>

<style scoped>

</style>
