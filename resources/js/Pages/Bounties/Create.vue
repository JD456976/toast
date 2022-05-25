<template>
    <Head>
        <title>Post New Bounty</title>
        <meta name="description" content="Post New Bounty">
    </Head>
    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">Post New Bounty</h1>
                </div>
                <flash-messages />
            </div>
            <form @submit.prevent="store">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row">
                            <h4 class="mb-30">Bounty Details</h4>
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
                                    <label for="tags">Tags</label>
                                    <InputText id="tags" type="text"
                                               v-bind:class='{"p-invalid": form.errors.tags}'
                                               v-model="form.tags"
                                    />
                                    <small v-if="form.errors.tags" id="name-help"
                                           class="p-error">{{ form.errors.tags }}</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="item_name">Item Name</label>
                                    <InputText id="item_name" type="text"
                                               v-bind:class='{"p-invalid": form.errors.item_name}'
                                               v-model="form.item_name"
                                    />
                                    <small v-if="form.errors.item_name" id="name-help"
                                           class="p-error">{{ form.errors.item_name }}</small>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="item_url">Item Link</label>
                                    <InputText id="item_url" type="text"
                                               v-bind:class='{"p-invalid": form.errors.item_url}'
                                               v-model="form.item_url"
                                    />
                                    <small v-if="form.errors.item_url" id="name-help"
                                           class="p-error">{{ form.errors.item_url }}</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="award">Bounty Award</label>
                                    <InputText id="award" type="text"
                                               v-bind:class='{"p-invalid": form.errors.award}'
                                               v-model="form.award"
                                    />
                                    <small v-if="form.errors.award" id="name-help"
                                           class="p-error">{{ form.errors.award }}</small>
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
                                <h4>Bounty Images</h4>
                            </div>
                            <FileUpload @input="form.image = $event.target.files[0]" v-model="form.image"
                                        :multiple="true"
                                        accept="image/*"
                                        :maxFileSize="3000000">
                                <template #empty>
                                    <p>Drag and drop files to here to upload.</p>
                                </template>
                            </FileUpload>
                        </div>
                        <div class="payment ml-30">
                            <Button type="submit" class="p-button-success" label="Add Bounty"
                                    icon="pi pi-check" iconPos="right" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</template>

<script>

import Textarea from "primevue/textarea";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import FlashMessages from "@/Shared/FlashMessages";
import Dropdown from "primevue/dropdown";
import FileUpload from "primevue/fileupload";


export default {
    name: "Create",
    remember: "form",
    components: {
        InputText,
        Textarea,
        Button,
        FlashMessages,
        Dropdown,
        FileUpload
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
                item_name: "",
                item_url: "",
                award: "",
                description: ""
            })
        };
    },
    methods: {
        store() {
            this.form.post(route("bounty.store"), {
                onSuccess: () => this.form.reset("item_name", "description", "tags", "item_url", "award", "description")
            });
        }
    }
};
</script>

<style scoped>

</style>
