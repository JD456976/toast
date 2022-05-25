<template>
    <Head>
        <title>Editing: {{ user.name }}</title>
        <meta name="description" content="Editing User">
    </Head>
    <div class="col-6 col-offset-3 ">
        <div class="card text-bg-light mb-3">
            <flash-messages />
            <div class="card-header">Editing: {{ user.name }}</div>
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
                        <label class="form-label" for="email">Email</label>
                        <InputText id="email" type="email"
                                   class="form-control"
                                   v-bind:class='{"p-invalid": form.errors.email}'
                                   v-model="form.email"
                        />
                        <small v-if="form.errors.email" id="name-help"
                               class="p-error">{{ form.errors.email }}</small>
                    </div>

                    <div class="col-12">
                        <Checkbox id="binary" :binary="true"
                                  trueValue="1"
                                  falseValue="0"
                                  v-bind:class='{"p-invalid": form.errors.active_status}'
                                  v-model="form.active_status" />
                        <label class="form-check-label" for="active_status">Active?</label>
                    </div>

                    <div class="col-12">
                        <Button type="submit" label="Update" class="p-button-raised p-button-rounded"
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
import AdminLayout from "@/Shared/AdminLayout";
import InputText from "primevue/inputtext";
import Checkbox from "primevue/checkbox";
import FlashMessages from "@/Shared/FlashMessages";
import Button from "primevue/button";

export default {
    name: "Edit",
    components: {
        Head,
        Checkbox,
        Button,
        InputText,
        FlashMessages
    },
    props: {
        user: Object
    },
    remember: "form",
    layout: AdminLayout,
    data() {
        return {
            form: this.$inertia.form({
                _method: "patch",
                name: this.user.name,
                email: this.user.email,
                active_status: this.user.active_status
            })
        };
    },
    methods: {
        update() {
            this.form.patch(route("admin.user.update", this.user.id), {
                onSuccess: () => this.form.reset("name", "email")
            });
        }
    }
};
</script>

<style scoped>

</style>
