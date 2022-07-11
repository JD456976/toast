<template>
    <Head>
        <title>Editing Store Category: {{category.name}}</title>
        <meta name="description" content="Editing Store Category">
    </Head>
    <div class="col-6 col-offset-3 ">
        <div class="card text-bg-light mb-3">

            <div class="card-header">Editing Store Category: {{ category.name }}</div>
            <div class="card-body">
                <form @submit.prevent="update">
                    <div class="col-12">
                        <label class="form-label" for="name">Name</label>
                        <InputText id="name" type="name"
                                   class="form-control"
                                   v-bind:class='{"p-invalid": form.errors.name}'
                                   v-model="form.name"
                        />
                        <small v-if="form.errors.name" id="name-help"
                               class="p-error">{{ form.errors.name }}</small>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="description">Description</label>
                        <Textarea :autoResize="true" rows="5" cols="30" id="description"
                                  v-bind:class='{"p-invalid": form.errors.description}'
                                  class="form-control"
                                  v-model="form.description"
                        />
                        <small v-if="form.errors.description" id="name-help"
                               class="p-error">{{ form.errors.description }}</small>
                    </div>
                    <div class="col-12">
                        <div>
                            <label class="form-label" for="parent_id">Store</label>
                        </div>
                        <Dropdown v-model="form.parent_id" :options="stores" optionLabel="name" optionValue="id"
                                  placeholder="Select a Store" />
                        <div>
                            <small v-if="form.errors.parent_id" id="name-help"
                                   class="p-error">{{ form.errors.parent_id }}</small>
                        </div>
                    </div>

                    <div class="col-12">
                        <Button type="submit" label="Update Store Category" class="p-button-raised p-button-rounded"
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
import Textarea from "primevue/textarea";
import Dropdown from "primevue/dropdown";

const props = defineProps({
    stores: Array,
    category: Object
});

const form = useForm({
    name: props.category.name,
    description: props.category.description,
    parent_id: props.category.parent_id
});

const update = () => {
    form.patch(route("admin.store-category.update", props.category.id), {
        onSuccess: () => {
            form.reset("name", "description");
        }
    });
};

</script>

<script>
import AdminLayout from "@/Shared/AdminLayout";

export default {
    name: "StoreCategoryEdit",
    remember: "form",
    layout: AdminLayout
};
</script>

<style scoped>

</style>
