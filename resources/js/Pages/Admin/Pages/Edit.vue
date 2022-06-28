<template>
    <Head>
        <title>Editing Page: {{ page.title }}</title>
        <meta name="description" content="Edit Page">
    </Head>
    <div class="col-6 col-offset-3 ">
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
                        <Button type="submit" label="Edit Page" class="p-button-raised p-button-rounded"
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
import Textarea from "primevue/textarea";
import Checkbox from "primevue/checkbox";
import FlashMessages from "@/Shared/FlashMessages";
import ImageUploader from "@/Shared/ImageUploader";
import Editor from "primevue/editor";

export default {
    name: "Create",
    remember: "form",
    components: {
        Button,
        InputText,
        Checkbox,
        Head,
        FlashMessages,
        Editor,
        ImageUploader
    },
    props: {
        page: Object,
        media: Array
    },
    layout: AdminLayout,
    data() {
        return {
            form: this.$inertia.form({
                _method: "patch",
                title: this.page.title,
                content: this.page.content,
                is_active: this.page.is_active,
                footer_menu: this.page.footer_menu,
                header_menu: this.page.header_menu
            })
        };
    },
    methods: {
        update() {
            this.form.patch(route("admin.page.update", this.page.id), {
                onSuccess: () => this.form.reset("title", "content")
            });
        }
    }
};
</script>

<style scoped>

</style>
