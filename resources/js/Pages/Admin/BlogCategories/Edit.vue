<template>
    <Head>
        <title>Editing Blog Category {{ category.title }}</title>
        <meta name="description" content="Add New Store">
    </Head>
    <div class="col-6 col-offset-3 ">
        <div class="card text-bg-light mb-3">

            <div class="card-header">Editing Blog Category {{ category.title }}</div>
            <div class="card-body">
                <form @submit.prevent="update">
                    <div class="col-12">
                        <label class="form-label" for="title">Tilte</label>
                        <InputText id="title" type="text"
                                   class="form-control"
                                   v-bind:class='{"p-invalid": form.errors.title}'
                                   v-model="form.title"
                        />
                        <small v-if="form.errors.title" id="name-help"
                               class="p-error">{{ form.errors.title }}</small>
                    </div>
                    <div class="col-12">
                        <Checkbox id="binary" :binary="true"
                                  trueValue="1"
                                  falseValue="0"
                                  v-bind:class='{"p-invalid": form.errors.is_featured}'
                                  v-model="form.is_featured" />
                        <label class="form-check-label" for="is_featured">Featured</label>
                    </div>

                    <div class="col-12">
                        <Button type="submit" label="Edit Blog Category" class="p-button-raised p-button-rounded"
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

export default {
    name: "Create",
    remember: "form",
    components: {
        Button,
        InputText,
        Textarea,
        Checkbox,
        Head,
        FlashMessages
    },
    layout: AdminLayout,
    props: {
        category: Object
    },
    data() {
        return {
            form: this.$inertia.form({
                _method: "patch",
                title: this.category.title,
                is_featured: this.category.is_featured
            })
        };
    },
    methods: {
        update() {
            this.form.patch(route("admin.blog-category.update", this.category.id), {
                onSuccess: () => this.form.reset("title")
            });
        }
    }
};
</script>

<style scoped>

</style>
