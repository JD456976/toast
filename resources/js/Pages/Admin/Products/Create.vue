<template>
    <Head>
        <title>Add New Product</title>
        <meta name="description" content="Add New Product">
    </Head>
    <div class="col-6 col-offset-3 ">
        <div class="card text-bg-light mb-3">

            <div class="card-header">Add New Product</div>
            <div class="card-body">
                <form @submit.prevent="create">
                    <div class="col-12">
                        <label class="form-label" for="name">Name</label>
                        <InputText id="name" type="text"
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
                        <label class="form-label" for="msrp">MSRP</label>
                        <InputText id="msrp" type="text"
                                   class="form-control"
                                   v-bind:class='{"p-invalid": form.errors.msrp}'
                                   v-model="form.msrp"
                        />
                        <small v-if="form.errors.name" id="name-help"
                               class="p-error">{{ form.errors.name }}</small>
                    </div>
                    <div class="col-12">
                        <div>
                            <label class="form-label" for="link">Brand</label>
                        </div>
                        <Dropdown v-model="form.brand_id" :options="brands" optionLabel="name" optionValue="id"
                                  placeholder="Select a Brand" />
                        <div>
                            <small v-if="form.errors.brand_id" id="name-help"
                                   class="p-error">{{ form.errors.brand_id }}</small>
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
                        <Button type="submit" label="Add Product" class="p-button-raised p-button-rounded"
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
import ToggleButton from "primevue/toggleButton";

const props = defineProps({
    brands: Array
});

const form = useForm({
    name: "",
    description: "",
    brand_id: "",
    msrp: "",
    is_featured: ""
});

const create = () => {
    form.post(route("admin.product.store"), {
        onSuccess: () => {
            form.reset("name", "description", "msrp");
        }
    });
};
</script>

<script>
import AdminLayout from "@/Shared/AdminLayout";

export default {
    name: "ProductCreate",
    remember: "form",
    layout: AdminLayout
};
</script>

<style scoped>

</style>
