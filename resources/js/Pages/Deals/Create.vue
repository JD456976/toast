<template>
    <Head>
        <title>Post New Deal</title>
        <meta name="description" content="Post New Deal">
    </Head>
    <div class="surface-ground px-4 py-8 md:px-6 lg:px-8">
        <form @submit.prevent="store">
            <div class="text-900 font-medium text-3xl mb-3">Post New Deal</div>
            <div class="surface-card p-4 shadow-2 border-round">
                <div class="grid formgrid p-fluid">
                    <div class="field mb-4 col-12 md:col-12">
                        <label for="title" class="font-medium text-900">Title</label>
                        <InputText id="title" type="text"
                                   v-bind:class='{"p-invalid": form.errors.title}'
                                   v-model="form.title"
                        />
                        <small v-if="form.errors.title" id="name-help"
                               class="p-error">{{ form.errors.title }}</small>
                    </div>
                    <div class="surface-border border-top-1 opacity-50 mb-3 col-12"></div>
                    <div class="field mb-4 col-12 md:col-6">
                        <label for="price" class="font-medium text-900">Price</label>
                        <InputText id="price" type="text"
                                   v-bind:class='{"p-invalid": form.errors.price}'
                                   v-model="form.price"
                        />
                        <small v-if="form.errors.price" id="name-help"
                               class="p-error">{{ form.errors.price }}</small>
                    </div>
                    <div class="field mb-4 col-12 md:col-6">
                        <label for="discount" class="font-medium text-900">Discount</label>
                        <InputText id="discount" type="text"
                                   v-bind:class='{"p-invalid": form.errors.discount}'
                                   v-model="form.discount"
                        />
                        <small v-if="form.errors.discount" id="name-help"
                               class="p-error">{{ form.errors.discount }}</small>
                    </div>
                    <div class="field mb-4 col-12 md:col-6">
                        <label for="link" class="font-medium text-900">Deal Link</label>
                        <InputText id="link" type="text"
                                   v-bind:class='{"p-invalid": form.errors.link}'
                                   v-model="form.link"
                        />
                        <small v-if="form.errors.link" id="name-help"
                               class="p-error">{{ form.errors.link }}</small>
                    </div>
                    <div class="field mb-4 col-12 md:col-6">
                        <label for="price_extras" class="font-medium text-900">Price Extras</label>
                        <InputText id="price_extras" type="text"
                                   v-bind:class='{"p-invalid": form.errors.price_extras}'
                                   v-model="form.price_extras"
                        />
                        <small v-if="form.errors.price_extras" id="name-help"
                               class="p-error">{{ form.errors.price_extras }}</small>
                    </div>
                    <div class="surface-border border-top-1 opacity-50 mb-3 col-12"></div>
                    <div class="field mb-4 col-12 md:col-6">
                        <label for="brands" class="font-medium text-900">Brand</label>
                        <Dropdown id="brands" v-model="form.brand" :options="brands" optionLabel="name"
                                  v-bind:class='{"p-invalid": form.errors.brand}'
                                  :filter="true" filterBy="name" :showClear="true" placeholder="Select a Brand">
                        </Dropdown>
                        <div>
                            <small v-if="form.errors.brand" id="name-help"
                                   class="p-error">{{ form.errors.brand }}</small>
                        </div>
                    </div>
                    <div class="field mb-4 col-12 md:col-6">
                        <label for="products" class="font-medium text-900">Product</label>
                        <Dropdown id="products" v-model="form.product" :options="products" optionLabel="name"
                                  v-bind:class='{"p-invalid": form.errors.product}'
                                  :filter="true" filterBy="name" :showClear="true" placeholder="Select a Product">
                        </Dropdown>
                        <div>
                            <small v-if="form.errors.product" id="name-help"
                                   class="p-error">{{ form.errors.product }}</small>
                        </div>
                    </div>
                    <div class="field mb-4 col-12 md:col-6">
                        <label for="stores" class="font-medium text-900">Store</label>
                        <Dropdown id="stores" v-model="form.store" :options="stores" optionLabel="name"
                                  v-bind:class='{"p-invalid": form.errors.store}'
                                  :filter="true" filterBy="name" :showClear="true" placeholder="Select a Store">
                        </Dropdown>
                        <div>
                            <small v-if="form.errors.store" id="name-help"
                                   class="p-error">{{ form.errors.store }}</small>
                        </div>
                    </div>
                    <div class="field mb-4 col-12 md:col-6">
                        <label for="tags" class="font-medium text-900">Tags</label>
                        <Chips separator="," addOnBlur="true" allowDuplicate="false"
                               v-model="form.tags" v-bind:class='{"p-invalid": form.errors.tags}' />
                        <small v-if="form.errors.tags" id="name-help"
                               class="p-error">{{ form.errors.tags }}</small>
                    </div>
                    <div class="surface-border border-top-1 opacity-50 mb-3 col-12"></div>
                    <div class="field mb-4 col-12 md:col-6">
                        <label for="description" class="font-medium text-900">Description</label>
                        <Textarea :autoResize="true" :rows="5" id="description"
                                  v-bind:class='{"p-invalid": form.errors.description}'
                                  v-model="form.description"
                        />
                        <small v-if="form.errors.description" id="description"
                               class="p-error">{{ form.errors.description }}</small>
                    </div>
                    <div class="field mb-4 col-12 md:col-6">
                        <label for="images" class="font-medium text-900">Deal Images</label>
                        <div class="">
                            <image-uploader :maxFiles="5" :allowMultiple="true" />
                        </div>
                    </div>
                    <div class="surface-border border-top-1 opacity-50 mb-3 col-12"></div>
                    <div class="col-12">
                        <Button type="submit" label="Submit Deal" class="p-button-raised w-auto mt-3"></Button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import Dropdown from "primevue/dropdown";
import Button from "primevue/button";
import ImageUploader from "@/Shared/ImageUploader";
import { useForm } from "@inertiajs/inertia-vue3";
import Chips from "primevue/chips";

const props = defineProps({
    brands: Array,
    products: Array,
    stores: Array
});

const products = props.products;
const stores = props.stores;
const brands = props.brands;

const form = useForm({
    product: "",
    brand: "",
    store: "",
    tags: "",
    image: "",
    title: "",
    link: "",
    discount: "",
    price: "",
    price_extras: "",
    description: ""
});

const store = () => {
    form.post(route("deal.store"), {
        onSuccess: () => form.reset("title", "description", "tags", "link", "discount", "price", "price_extras", "description")
    });
};
</script>

<script>
export default {
    name: "DealCreate",
    remember: "form"
};
</script>

<style scoped>
.p-chips, .p-dropdown {
    height: 64px;
}
</style>
