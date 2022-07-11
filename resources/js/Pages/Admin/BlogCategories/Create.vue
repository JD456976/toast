<template>
    <Head>
        <title>Add New Blog Category</title>
        <meta name="description" content="Add New Blog Category">
    </Head>
    <div class="col-6 col-offset-3 ">
        <div class="card text-bg-light mb-3">

            <div class="card-header">Add New Blog Category</div>
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
                        <Button type="submit" label="Add Blog Category" class="p-button-raised p-button-rounded"
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

const form = useForm({
    title: "",
    is_featured: ""
});

const create = () => {
    form.post(route("admin.blog-category.store"), {
        onSuccess: () => {
            form.reset("title");
        }
    });
};
</script>

<script>
import AdminLayout from "@/Shared/AdminLayout";

export default {
    name: "BlogCategoryCreate",
    remember: "form",
    layout: AdminLayout
};
</script>

<style scoped>

</style>
