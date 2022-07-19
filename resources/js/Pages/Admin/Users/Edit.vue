<template>
    <Head>
        <title>Editing: {{ user.name }}</title>
        <meta name="description" content="Editing User">
    </Head>
    <div class="col-6 col-offset-3 ">
        <div class="card text-bg-light mb-3">

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
                        <ToggleButton class="h-2rem mr-3" v-bind:class='{"p-invalid": form.errors.is_banned}'
                                      v-model="form.is_banned"
                                      onIcon="pi pi-check" offIcon="pi pi-times" />
                        <label class="form-check-label" for="is_banned">Banned?</label>
                        <div>
                            <small v-if="form.errors.is_banned" id="name-help"
                                   class="p-error">{{ form.errors.is_banned }}</small>
                        </div>
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

<script setup>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import ToggleButton from "primevue/toggleButton";

const props = defineProps({
    user: Object
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    active_status: props.user.active_status
});

const update = () => {
    form.patch(route("admin.user.update", props.user.id));
};
</script>

<script>
import AdminLayout from "@/Shared/AdminLayout";

export default {
    name: "UserEdit",
    remember: "form",
    layout: AdminLayout
};
</script>

<style scoped>

</style>
