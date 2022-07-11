<template>
    <Head>
        <title>Editing Deal: {{ deal.title }}</title>
        <meta name="description" content="Editing Deal">
    </Head>
    <div class="col-12 ">
        <div class="card text-bg-light mb-3">

            <div class="card-header">Editing Deal: {{ deal.title }}</div>
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
                            <label class="form-label" for="tags">Tags</label>
                        </div>
                        <Chips v-model="form.tags"
                               separator=","
                               v-bind:class='{"p-invalid": form.errors.tags}'>
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
                        <label class="form-label" for="discount">Discount</label>
                        <InputText id="discount" type="text"
                                   class="form-control"
                                   v-bind:class='{"p-invalid": form.errors.discount}'
                                   v-model="form.discount"
                        />
                        <small v-if="form.errors.discount" id="name-help"
                               class="p-error">{{ form.errors.discount }}</small>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="price">Price</label>
                        <InputText id="price" type="text"
                                   class="form-control"
                                   v-bind:class='{"p-invalid": form.errors.price}'
                                   v-model="form.price"
                        />
                        <small v-if="form.errors.price" id="name-help"
                               class="p-error">{{ form.errors.price }}</small>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="price_extras">Price Extras</label>
                        <InputText id="price_extras" type="text"
                                   class="form-control"
                                   v-bind:class='{"p-invalid": form.errors.price_extras}'
                                   v-model="form.price_extras"
                        />
                        <small v-if="form.errors.price_extras" id="name-help"
                               class="p-error">{{ form.errors.price_extras }}</small>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="link">Link</label>
                        <InputText id="link" type="text"
                                   class="form-control"
                                   v-bind:class='{"p-invalid": form.errors.link}'
                                   v-model="form.link"
                        />
                        <small v-if="form.errors.link" id="name-help"
                               class="p-error">{{ form.errors.link }}</small>
                    </div>
                    <div class="col-12">
                        <div>
                            <label class="form-label" for="link">Product</label>
                        </div>
                        <Dropdown v-model="form.product_id" :options="products" optionLabel="name" optionValue="id"
                                  placeholder="Select a Product" />
                        <div>
                            <small v-if="form.errors.product_id" id="name-help"
                                   class="p-error">{{ form.errors.product_id }}</small>
                        </div>
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
                        <div>
                            <label class="form-label" for="link">Store</label>
                        </div>
                        <Dropdown v-model="form.store_id" :options="stores" optionLabel="name" optionValue="id"
                                  placeholder="Select a Store" />
                        <div>
                            <small v-if="form.errors.store_id" id="name-help"
                                   class="p-error">{{ form.errors.store_id }}</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <div>
                            <label class="form-label" for="link">Deal Images</label>
                        </div>
                        <div>
                            <image-uploader :maxFiles="5" :allowMultiple="true" :files="media" />
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
                        <ToggleButton class="h-2rem mr-3" v-bind:class='{"p-invalid": form.errors.is_frontpage}'
                                      v-model="form.is_frontpage"
                                      onIcon="pi pi-check" offIcon="pi pi-times" />
                        <label class="form-check-label" for="is_featured">Frontpage</label>
                        <div>
                            <small v-if="form.errors.is_frontpage" id="name-help"
                                   class="p-error">{{ form.errors.is_frontpage }}</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <Button type="submit" label="Edit Deal" class="p-button-raised p-button-rounded"
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
import Chips from "primevue/chips";
import ImageUploader from "@/Shared/ImageUploader";
import ToggleButton from "primevue/toggleButton";

const props = defineProps({
    deal: Object,
    brands: Array,
    stores: Array,
    products: Array,
    tags: Array,
    media: Array
});

const form = useForm({
    title: props.deal.title,
    description: props.deal.description,
    link: props.deal.link,
    tags: props.tags,
    price: props.deal.price,
    price_extras: props.deal.price_extras,
    discount: props.deal.discount,
    brand_id: props.deal.brand_id,
    store_id: props.deal.store_id,
    product_id: props.deal.product_id,
    is_featured: props.deal.is_featured,
    is_active: props.deal.is_active,
    is_frontpage: props.deal.is_frontpage
});

const update = () => {
    form.patch(route("admin.deal.update", props.deal.id), {
        onSuccess: () => {
            form.reset("name", "description", "link", "price", "tags", "price", "price_extras", "discount");
        }
    });
};
</script>

<script>


import AdminLayout from "@/Shared/AdminLayout";

export default {
    name: "DealEdit",
    remember: "form",
    layout: AdminLayout
};
</script>

<style scoped>

</style>
