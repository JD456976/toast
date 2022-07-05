<template>
    <Head>
        <title>Add New Page</title>
        <meta name="description" content="Add New Page">
    </Head>
    <div class="col-6 col-offset-3 ">
        <div class="card text-bg-light mb-3">

            <div class="card-header">Add New Page</div>
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
                        <Editor v-model="form.content" v-bind:class='{"p-invalid": form.errors.content}'
                                class="form-control" editorStyle="height: 320px" />
                        <small v-if="form.errors.content" id="name-help"
                               class="p-error">{{ form.errors.content }}</small>
                    </div>
                    <div class="col-9 md:col-12 mb-3">
                        <div class="field">
                            <label class="form-label" for="image">Image</label>
                            <image-uploader :maxFiles="1" :allowMultiple="false" />
                        </div>
                    </div>
                    <div class="col-12">
                        <Checkbox id="binary" :binary="true"
                                  v-bind:class='{"p-invalid": form.errors.is_active}'
                                  v-model="form.is_active" />
                        <label class="form-check-label" for="is_featured">Active</label>
                    </div>
                    <div class="col-12">
                        <Checkbox id="binary" :binary="true"
                                  v-bind:class='{"p-invalid": form.errors.header_menu}'
                                  v-model="form.header_menu" />
                        <label class="form-check-label" for="header_menu">Header Menu</label>
                    </div>
                    <div class="col-12">
                        <Checkbox id="binary" :binary="true"
                                  v-bind:class='{"p-invalid": form.errors.footer_menu}'
                                  v-model="form.footer_menu" />
                        <label class="form-check-label" for="footer_menu">Footer Menu</label>
                    </div>

                    <div class="col-12">
                        <Button type="submit" label="Add Page" class="p-button-raised p-button-rounded"
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
import AdminLayout from "@/Shared/AdminLayout.vue";
import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import Checkbox from "primevue/checkbox";
import FlashMessages from "@/Shared/FlashMessages.vue";
import ImageUploader from "@/Shared/ImageUploader.vue";
import Editor from "primevue/editor";

export default {
    name: "Create",
    remember: "form",
    components: {
        Button,
        InputText,
        Textarea,
        Checkbox,
        Head,
        FlashMessages,
        ImageUploader,
        Editor
    },
    layout: AdminLayout,
    data() {
        return {
            form: this.$inertia.form({
                _method: "post",
                title: "",
                content: "",
                is_active: "",
                footer_menu: "",
                header_menu: ""
            })
        };
    },
    methods: {
        create() {
            this.form.post(route("admin.page.store"), {
                onSuccess: () => this.form.reset("name", "description")
            });
        }
    }
};
</script>

<style scoped>

</style>
