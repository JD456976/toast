<template>
    <Head>
        <title>Editing Product Category: {{category.name}}</title>
        <meta name="description" content="Editing Product Category">
    </Head>
    <div class="col-6 col-offset-3 ">
        <div class="card text-bg-light mb-3">

            <div class="card-header">Editing Product Category: {{ category.name }}</div>
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
                        <Dropdown v-model="form.parent_id" :options="products" optionLabel="name" optionValue="id"
                                  placeholder="Select a Product" />
                        <div>
                            <small v-if="form.errors.parent_id" id="name-help"
                                   class="p-error">{{ form.errors.parent_id }}</small>
                        </div>
                    </div>

                    <div class="col-12">
                        <Button type="submit" label="Update Product Category" class="p-button-raised p-button-rounded"
                                icon="pi pi-check"
                                iconPos="right" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import Button from "primevue/button";
import AdminLayout from "@/Shared/AdminLayout.vue";
import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import Checkbox from "primevue/checkbox";
import FlashMessages from "@/Shared/FlashMessages.vue";
import Dropdown from "primevue/dropdown";

export default {
    name: "Create",
    remember: "form",
    components: {
        Button,
        InputText,
        Textarea,
        Checkbox,
        Head,
        FlashMessages,
        Dropdown
    },
    props: {
        products: Array,
        category: Object
    },
    layout: AdminLayout,
    data() {
        return {
            form: this.$inertia.form({
                _method: "patch",
                name: this.category.name,
                description: this.category.description,
                parent_id: this.category.parent_id
            })
        };
    },
    methods: {
        update() {
            this.form.patch(route("admin.product-category.update", this.category.id), {
                onSuccess: () => this.form.reset("name", "description")
            });
        }
    }
};
</script>

<style scoped>

</style>
