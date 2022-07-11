<template>
    <Head>
        <title>Editing Product {{ product.name }}</title>
        <meta name="description" content="Editing Product">
    </Head>
    <div class="col-6 col-offset-3 ">
        <div class="card text-bg-light mb-3">

            <div class="card-header">Editing Product {{ product.name }}</div>
            <div class="card-body">
                <form @submit.prevent="update">
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
                        <Button type="submit" label="Edit Product" class="p-button-raised p-button-rounded"
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
import ToggleButton from "primevue/toggleButton";
import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import Dropdown from "primevue/dropdown";

const props = defineProps({
    brands: Array,
    product: Object
});

const form = useForm({
    name: props.product.name,
    description: props.product.description,
    brand_id: props.product.brand_id,
    msrp: props.product.msrp,
    is_featured: props.product.is_featured
});

const update = () => {
    form.patch(route("admin.product.update", props.product.id), {
        onSuccess: () => {
            form.reset("name", "description", "msrp");
        }
    });
};
</script>

<script>


import AdminLayout from "@/Shared/AdminLayout";

export default {
    name: "ProductsEdit",
    remember: "form",
    layout: AdminLayout
};
</script>

<style scoped>

</style>
