<template>
    <Head>
        <title>Editing Bounty: {{ bounty.item_name }}</title>
        <meta name="description" content="Editing Bounty">
    </Head>
    <div class="col-6 col-offset-3 ">
        <div class="card text-bg-light mb-3">

            <div class="card-header">Editing Bounty: {{ bounty.item_name }}</div>
            <div class="card-body">
                <form @submit.prevent="update">
                    <div class="col-12">
                        <label class="form-label" for="item_name">Title</label>
                        <InputText id="item_name" type="text"
                                   class="form-control"
                                   v-bind:class='{"p-invalid": form.errors.item_name}'
                                   v-model="form.item_name"
                        />
                        <small v-if="form.errors.item_name" id="name-help"
                               class="p-error">{{ form.errors.item_name }}</small>
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
                               v-bind:class='{"p-invalid": form.errors.tags}'
                        />
                        <small v-if="form.errors.tags" id="name-help"
                               class="p-error">{{ form.errors.tags }}</small>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="award">Award</label>
                        <InputText id="award" type="text"
                                   class="form-control"
                                   v-bind:class='{"p-invalid": form.errors.award}'
                                   v-model="form.award"
                        />
                        <small v-if="form.errors.award" id="name-help"
                               class="p-error">{{ form.errors.award }}</small>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="link">Item URL</label>
                        <InputText id="item_url" type="text"
                                   class="form-control"
                                   v-bind:class='{"p-invalid": form.errors.item_url}'
                                   v-model="form.item_url"
                        />
                        <small v-if="form.errors.item_url" id="name-help"
                               class="p-error">{{ form.errors.item_url }}</small>
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
                            <label class="form-label" for="link">Bounty Images</label>
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
                        <ToggleButton class="h-2rem mr-3" v-bind:class='{"p-invalid": form.errors.is_verified}'
                                      v-model="form.is_verified"
                                      onIcon="pi pi-check" offIcon="pi pi-times" />
                        <label class="form-check-label" for="is_featured">Verified</label>
                        <div>
                            <small v-if="form.errors.is_verified" id="name-help"
                                   class="p-error">{{ form.errors.is_verified }}</small>
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
                        <ToggleButton class="h-2rem mr-3" v-bind:class='{"p-invalid": form.errors.is_filled}'
                                      v-model="form.is_filled"
                                      onIcon="pi pi-check" offIcon="pi pi-times" />
                        <label class="form-check-label" for="is_featured">Filled</label>
                        <div>
                            <small v-if="form.errors.is_filled" id="name-help"
                                   class="p-error">{{ form.errors.is_filled }}</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <Button type="submit" label="Edit Bounty" class="p-button-raised p-button-rounded"
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
import ToggleButton from "primevue/toggleButton";
import ImageUploader from "@/Shared/ImageUploader";

const props = defineProps({
    bounty: Object,
    brands: Array,
    stores: Array,
    products: Array,
    tags: Object,
    media: Array
});

const form = useForm({
    item_name: props.bounty.item_name,
    description: props.bounty.description,
    item_url: props.bounty.item_url,
    tags: props.bounty.tags,
    award: props.bounty.award,
    brand_id: props.bounty.brand_id,
    store_id: props.bounty.store_id,
    product_id: props.bounty.product_id,
    is_featured: props.bounty.is_featured,
    is_active: props.bounty.is_active,
    is_verified: props.bounty.is_verified,
    is_filled: props.bounty.is_filled
});

const update = () => {
    form.patch(route("admin.bounty.update", props.bounty.id), {
        onSuccess: () => {
            form.reset("item_name", "description", "item_url", "award", "tags");
        }
    });
};
</script>

<script>
import AdminLayout from "@/Shared/AdminLayout";

export default {
    name: "BountyCreate",
    remember: "form",
    layout: AdminLayout
};
</script>

<style scoped>

</style>
