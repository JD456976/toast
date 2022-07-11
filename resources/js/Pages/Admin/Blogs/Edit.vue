<template>
    <Head>
        <title>Editing Blog {{ blog.title }}</title>
        <meta name="description" content="Editing Blog">
    </Head>
    <div class="col-12">
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
                        <Button type="submit" label="Edit Blog" class="p-button-raised p-button-rounded"
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

const props = defineProps({
    blog: Object,
    media: Array
});

const form = useForm({
    title: props.blog.title,
    content: props.blog.content,
    cat_id: props.blog.cat_id,
    user_id: props.blog.user_id,
    image: props.media,
    tags: props.tagged,
    is_featured: props.blog.is_featured,
    is_active: props.blog.is_active
});

const update = () => {
    form.patch(route("admin.blog.update", props.blog.id), {
        onSuccess: () => {
            form.reset("title", "content");
        }
    });
};
</script>

<script>
import AdminLayout from "@/Shared/AdminLayout";

export default {
    name: "BlogEdit",
    remember: "form",
    layout: AdminLayout
};
</script>

<style scoped>

</style>
