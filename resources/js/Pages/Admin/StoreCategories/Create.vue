<template>
    <Head>
        <title>Add New Store Category</title>
        <meta name="description" content="Add New Store Category">
    </Head>
    <div class="col-6 col-offset-3 ">
        <div class="card text-bg-light mb-3">

            <div class="card-header">Add New Store Category</div>
            <div class="card-body">
                <form @submit.prevent="create">
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
                        <Dropdown v-model="form.parent_id" :options="stores" optionLabel="name" optionValue="id"
                                  placeholder="Select a Store" />
                        <div>
                            <small v-if="form.errors.parent_id" id="name-help"
                                   class="p-error">{{ form.errors.parent_id }}</small>
                        </div>
                    </div>

                    <div class="col-12">
                        <Button type="submit" label="Add Store Category" class="p-button-raised p-button-rounded"
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
import AdminLayout from "@/Shared/AdminLayout";
import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import Checkbox from "primevue/checkbox";
import FlashMessages from "@/Shared/FlashMessages";
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
        stores: Array
    },
    layout: AdminLayout,
    data() {
        return {
            form: this.$inertia.form({
                _method: "post",
                name: "",
                description: "",
                parent_id: ""
            })
        };
    },
    methods: {
        create() {
            this.form.post(route("admin.store-category.store"), {
                onSuccess: () => this.form.reset("name", "description")
            });
        }
    }
};
</script>

<style scoped>

</style>
