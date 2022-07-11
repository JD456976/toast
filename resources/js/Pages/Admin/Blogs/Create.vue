<template>
    <Head>
        <title>Add New Blog Post</title>
        <meta name="description" content="Add New Blog">
    </Head>
    <div class="col-12">
        <div class="card text-bg-light mb-3">

            <div class="card-header">Add New Blog Post</div>
            <div class="card-body">
                <form @submit.prevent="create">
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
                        <label class="form-label" for="image">Image</label>
                        <image-uploader :maxFiles="1" :allowMultiple="false" />
                    </div>
                    <div class="col-12">
                        <ToggleButton class="h-2rem mr-3" v-bind:class='{"p-invalid": form.errors.is_featured}'
                                      v-model="form.is_featured"
                                      onIcon="pi pi-check" offIcon="pi pi-times" />
                        <label class="form-check-label" for="is_featured">Featured</label>
                        <div>
                            <small v-if="form.errors.is_featured" id="name-help"
                                   class="p-error">{{ form.errors.is_featured }}</small>
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
                        <Button type="submit" label="Add Blog" class="p-button-raised p-button-rounded"
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
import Chips from "primevue/chips";
import Dropdown from "primevue/dropdown";

const form = useForm({
    title: "",
    content: "",
    cat_id: "",
    user_id: "",
    tags: "",
    is_featured: "",
    is_active: ""
});

const props = defineProps({
    users: Array
});

const create = () => {
    form.post(route("admin.blog.store"), {
        onSuccess: () => {
            form.reset("title", "content");
        }
    });
};
</script>

<script>
import AdminLayout from "@/Shared/AdminLayout";

export default {
    name: "BlogCreate",
    remember: "form",
    layout: AdminLayout
};
</script>

<style scoped>

</style>
