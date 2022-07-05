<template>
    <Head>
        <title>Editing Blog {{ blog.title }}</title>
        <meta name="description" content="Editing Blog">
    </Head>
    <div class="col-6 col-offset-3 ">
        <div class="card text-bg-light mb-3">

            <div class="card-header">Editing Blog {{ blog.title }}</div>
            <div class="card-body">
                <form @submit.prevent="update">
                    <div class="col-12">
                        <label class="form-label" for="title">Title</label>
                        <InputText id="title" type="text"
                                   class="form-control"
                                   v-bind:class='{"p-invalid": form.errors.title}'
                                   v-model="form.title"
                        />
                        <small v-if="form.errors.title" id="name-help"
                               class="p-error">{{ form.errors.title }}</small>
                    </div>
                    <div class="col-12">
                        <div>
                            <label class="form-label" for="link">Posted By</label>
                        </div>
                        <Dropdown v-model="form.user_id" :options="users" optionLabel="name" optionValue="id"
                                  placeholder="Select a User" />
                        <div>
                            <small v-if="form.errors.user_id" id="name-help"
                                   class="p-error">{{ form.errors.user_id }}</small>
                        </div>
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
                        <div>
                            <label class="form-label" for="tags">Tags</label>
                        </div>
                        <Chips v-model="form.tags"
                               separator=","
                               addOnBlur="true"
                               allowDuplicate="false"
                               v-bind:class='{"p-invalid": form.errors.tags}'
                        >
                            <template #chip="slotProps">
                                <div>
                                    <span>{{ slotProps.value }} </span>
                                </div>
                            </template>
                        </Chips>
                        <small v-if="form.errors.tags" id="name-help"
                               class="p-error">{{ form.errors.tags }}</small>
                    </div>
                    <div class="col-12">
                        <div>
                            <label class="form-label" for="link">Category</label>
                        </div>
                        <Dropdown v-model="form.cat_id" :options="categories" optionLabel="title" optionValue="id"
                                  placeholder="Select a Category" />
                        <div>
                            <small v-if="form.errors.cat_id" id="name-help"
                                   class="p-error">{{ form.errors.cat_id }}</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <Checkbox id="binary" :binary="true"
                                  v-bind:class='{"p-invalid": form.errors.is_featured}'
                                  v-model="form.is_featured" />
                        <label class="form-check-label" for="is_featured">Featured</label>
                    </div>

                    <div class="col-12">
                        <Checkbox id="binary" :binary="true"
                                  v-bind:class='{"p-invalid": form.errors.is_active}'
                                  v-model="form.is_active" />
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>

                    <div class="col-12">
                        <Button type="submit" label="Edit Blog" class="p-button-raised p-button-rounded"
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
import Dropdown from "primevue/dropdown";
import Chips from "primevue/chips";
import FileUpload from "primevue/fileupload";
import Editor from "primevue/editor";
import Image from "primevue/image";
import ImageUploader from "@/Shared/ImageUploader.vue";

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
        Dropdown,
        Chips,
        ImageUploader,
        Editor,
        Image
    },
    props: {
        categories: Array,
        blog: Object,
        users: Array,
        tagged: Array,
        media: Array
    },
    layout: AdminLayout,
    data() {
        return {
            form: this.$inertia.form({
                _method: "patch",
                title: this.blog.title,
                content: this.blog.content,
                cat_id: this.blog.cat_id,
                user_id: this.blog.user_id,
                image: this.media,
                tags: this.tagged,
                is_featured: this.blog.is_featured,
                is_active: this.blog.is_active
            })
        };
    },
    methods: {
        update() {
            this.form.patch(route("admin.blog.update", this.blog.id), {
                onSuccess: () => this.form.reset("title", "content")
            });
        }
    }
};
</script>

<style scoped>

</style>
