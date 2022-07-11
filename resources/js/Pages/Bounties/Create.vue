<template>
    <Head>
        <title>Post New Bounty</title>
        <meta name="description" content="Post New Bounty">
    </Head>
    <div class="surface-ground px-4 py-8 md:px-6 lg:px-8">
        <form @submit.prevent="store">
            <div class="text-900 font-medium text-3xl mb-3">Post New Bounty</div>
            <div class="surface-card p-4 shadow-2 border-round">
                <div class="grid formgrid p-fluid">
                    <div class="field mb-4 col-12 md:col-12">
                        <label for="item_name" class="font-medium text-900">Item Name</label>
                        <InputText id="item_name" type="text"
                                   v-bind:class='{"p-invalid": form.errors.item_name}'
                                   v-model="form.item_name"
                        />
                        <small v-if="form.errors.item_name" id="name-help"
                               class="p-error">{{ form.errors.item_name }}</small>
                    </div>
                    <div class="surface-border border-top-1 opacity-50 mb-3 col-12"></div>
                    <div class="field mb-4 col-12 md:col-6">
                        <label for="item_url" class="font-medium text-900">Item Link</label>
                        <InputText id="item_url" type="text"
                                   v-bind:class='{"p-invalid": form.errors.item_url}'
                                   v-model="form.item_url"
                        />
                        <small v-if="form.errors.item_url" id="name-help"
                               class="p-error">{{ form.errors.item_url }}</small>
                    </div>
                    <div class="field mb-4 col-12 md:col-6">
                        <label for="award" class="font-medium text-900">Award</label>
                        <InputText id="award" type="text"
                                   v-bind:class='{"p-invalid": form.errors.award}'
                                   v-model="form.award"
                        />
                        <small v-if="form.errors.award" id="name-help"
                               class="p-error">{{ form.errors.award }}</small>
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
                        <label for="images" class="font-medium text-900">Bounty Images</label>
                        <div class="">
                            <image-uploader :maxFiles="5" :allowMultiple="true" />
                        </div>
                    </div>
                    <div class="surface-border border-top-1 opacity-50 mb-3 col-12"></div>
                    <div class="col-12">
                        <Button type="submit" label="Post Bounty" class="p-button-raised w-auto mt-3"></Button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import Textarea from "primevue/textarea";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import Dropdown from "primevue/dropdown";
import Chips from "primevue/chips";
import ImageUploader from "@/Shared/ImageUploader";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    brands: Array,
    products: Array,
    stores: Array
});

const form = useForm({
    product: "",
    brand: "",
    store: "",
    tags: "",
    image: "",
    item_name: "",
    item_url: "",
    award: "",
    description: ""
});

const store = () => {
    form.post(route("bounty.store"), {
        onSuccess: () => form.reset("item_name", "description", "tags", "item_url", "award", "description")
    });
};
</script>

<script>
export default {
    name: "BountyCreate"
};
</script>

<style scoped>
.p-chips, .p-dropdown {
    height: 64px;
}
</style>
