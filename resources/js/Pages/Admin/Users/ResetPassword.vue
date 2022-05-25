<template>
    <Head>
        <title>Reset User Password</title>
        <meta name="description" content="Reset User Password">
    </Head>
    <div>
        <div class="col-6 col-offset-3 ">
            <div class="card text-bg-light mb-3">
                <div class="card-header">Reset User Password</div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="col-12">
                            <label class="form-label" for="email">Email Address</label>
                            <InputText id="email" type="email"
                                       class="form-control"
                                       v-bind:class='{"p-invalid": form.errors.email}'
                                       v-model="form.email"
                            />
                            <small v-if="form.errors.email" id="name-help"
                                   class="p-error">{{ form.errors.email }}</small>
                        </div>

                        <div class="col-12">
                            <Button type="submit" label="Reset Password" class="p-button-raised p-button-rounded"
                                    icon="pi pi-send"
                                    iconPos="right" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import InputText from "primevue/inputtext";
import { Head } from "@inertiajs/inertia-vue3";
import Button from "primevue/button";
import AdminLayout from "@/Shared/AdminLayout";

export default {
    name: "ResetPassword",
    components: {
        Button,
        InputText,
        Head
    },
    remember: "form",
    layout: AdminLayout,
    data() {
        return {
            form: this.$inertia.form({
                _method: "post",
                email: ""
            })
        };
    },
    methods: {
        create() {
            this.form.post(route("admin.send-password"), {
                onSuccess: () => this.form.reset("email")
            });
        }
    }
};
</script>

<style scoped>

</style>
