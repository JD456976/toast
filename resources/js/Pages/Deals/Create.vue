<template>
    <Head>
        <title>Post New Deal</title>
        <meta name="description" content="Post New Deal">
    </Head>
    <div class="p-4">
        <h1 class="heading-2 mb-10">Post New Deal</h1>
        <div class="surface-border border-round surface-card" style="min-height: 20rem">
            <form @submit.prevent="store">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row">
                            <h4 class="mb-30">Deal Details</h4>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <Dropdown v-bind:class='{"p-invalid": form.errors.product}' v-model="form.product"
                                              :options="products" optionLabel="name"
                                              optionValue="id" placeholder="Select a Product" />
                                    <div>
                                        <small v-if="form.errors.product" id="name-help"
                                               class="p-error">{{ form.errors.product }}</small>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <Dropdown v-bind:class='{"p-invalid": form.errors.brand}' v-model="form.brand"
                                              :options="brands" optionLabel="name"
                                              optionValue="id" placeholder="Select a Brand" />
                                    <div>
                                        <small v-if="form.errors.brand" id="name-help"
                                               class="p-error">{{ form.errors.brand }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <Dropdown v-bind:class='{"p-invalid": form.errors.store}' v-model="form.store"
                                              :options="stores" optionLabel="name"
                                              optionValue="id" placeholder="Select a Store" />
                                    <div>
                                        <small v-if="form.errors.store" id="name-help"
                                               class="p-error">{{ form.errors.store }}</small>
                                    </div>

                                </div>
                                <div class="form-group col-lg-6">
                                    <div>
                                        <label for="tags">Tags</label>
                                    </div>
                                    <Chips v-model="form.tags"
                                           separator=","
                                           v-bind:class='{"p-invalid": form.errors.tags}'
                                    />
                                    <small v-if="form.errors.tags" id="name-help"
                                           class="p-error">{{ form.errors.tags }}</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="title">Title</label>
                                    <InputText id="title" type="text"
                                               v-bind:class='{"p-invalid": form.errors.title}'
                                               v-model="form.title"
                                    />
                                    <small v-if="form.errors.title" id="name-help"
                                           class="p-error">{{ form.errors.title }}</small>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="link">Deal Link</label>
                                    <InputText id="link" type="text"
                                               v-bind:class='{"p-invalid": form.errors.link}'
                                               v-model="form.link"
                                    />
                                    <small v-if="form.errors.link" id="name-help"
                                           class="p-error">{{ form.errors.link }}</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="discount">Discount</label>
                                            <InputText id="discount" type="text"
                                                       v-bind:class='{"p-invalid": form.errors.discount}'
                                                       v-model="form.discount"
                                            />
                                            <small v-if="form.errors.discount" id="name-help"
                                                   class="p-error">{{ form.errors.discount }}</small>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="price">Price</label>
                                            <InputText id="price" type="text"
                                                       v-bind:class='{"p-invalid": form.errors.price}'
                                                       v-model="form.price"
                                            />
                                            <small v-if="form.errors.price" id="name-help"
                                                   class="p-error">{{ form.errors.price }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="price_extras">Price Extras</label>
                                    <InputText id="price_extras" type="text"
                                               v-bind:class='{"p-invalid": form.errors.price_extras}'
                                               v-model="form.price_extras"
                                    />
                                    <small v-if="form.errors.price_extras" id="name-help"
                                           class="p-error">{{ form.errors.price_extras }}</small>
                                </div>
                            </div>
                            <div class="form-group mb-30">
                                <label for="description">Description</label>
                                <Textarea :autoResize="true" rows="5" cols="30" id="description"
                                          v-bind:class='{"p-invalid": form.errors.description}'
                                          v-model="form.description"
                                />
                                <small v-if="form.errors.description" id="name-help"
                                       class="p-error">{{ form.errors.description }}</small>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="border p-40 cart-totals ml-30 mb-50">
                            <div class="d-flex align-items-end justify-content-between mb-30">
                                <h4>Deal Images</h4>
                            </div>
                            <image-uploader :maxFiles="5" :allowMultiple="true" />
                        </div>
                        <div class="payment ml-30">
                            <Button type="submit" class="p-button-success" label="Add Deal"
                                    icon="pi pi-check" iconPos="right" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>


import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import Dropdown from "primevue/dropdown";
import FlashMessages from "@/Shared/FlashMessages";
import Button from "primevue/button";
import FileUpload from "primevue/fileupload";
import Editor from "primevue/editor";
import Chips from "primevue/chips";
import ImageUploader from "@/Shared/ImageUploader";

export default {
    name: "Create",
    remember: "form",
    components: {
        InputText,
        Textarea,
        Button,
        FlashMessages,
        Dropdown,
        FileUpload,
        Editor,
        ImageUploader,
        Chips
    },
    props: {
        brands: Array,
        products: Array,
        stores: Array
    },
    data() {
        return {
            products: this.products,
            stores: this.stores,
            brands: this.brands,
            form: this.$inertia.form({
                _method: "post",
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
            })
        };
    },
    methods: {
        store() {
            this.form.post(route("deal.store"), {
                onSuccess: () => this.form.reset("title", "description", "tags", "link", "discount", "price", "price_extras", "description")
            });
        }
    }
};
</script>

<style scoped>

</style>
