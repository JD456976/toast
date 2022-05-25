<template>
    <Button label="Forgot Password" class="text-muted p-button-link" @click="openBasic" />
    <Dialog v-model:visible="displayBasic">
        <template #header>
            <h4>Reset Password</h4>
        </template>
        <div class="mb-10">
            <p>Forgot your password? No problem! Enter your email below to start
                the reset process
            </p>
        </div>
        <form>
            <div class="form-group">
                <InputText id="email" type="email"
                           class="form-control"
                           placeholder="Email"
                           v-bind:class='{"p-invalid": form.errors.email}'
                           v-model="form.email"
                />
                <small v-if="form.errors.email" id="name-help"
                       class="p-error">{{ form.errors.email }}</small>
            </div>
        </form>
        <template #footer>
            <Button @click="closeBasic" label="Cancel" icon="pi pi-times" class="p-button-text" />
            <Button @click="reset" label="Reset Password" icon="pi pi-check" autofocus />
        </template>
    </Dialog>
</template>

<script>
import Dialog from "primevue/dialog";
import Button from "primevue/button";
import InputText from "primevue/inputtext";

export default {
    name: "ForgotPassword",
    components: {
        Dialog,
        Button,
        InputText
    },
    data() {
        return {
            displayBasic: false,
            form: this.$inertia.form({
                _method: "post",
                email: ""
            })
        };
    },
    methods: {
        openBasic() {
            this.displayBasic = true;
        },
        closeBasic() {
            this.displayBasic = false;
        },
        reset() {
            this.form.post(route("password.email"), {
                onSuccess: () => this.form.reset("email")
            });
        }
    }
};
</script>

<style scoped>

</style>
