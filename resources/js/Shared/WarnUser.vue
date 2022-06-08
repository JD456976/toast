<template>
    <div class="grid flex-column">
        <div class="col end-0">
            <Button v-tooltip.top="'Warn User'" @click="openBasic" icon="pi pi-flag-fill"
                    class="ml-10 p-button-danger" />
            <Dialog header="Warn User" v-model:visible="displayBasic" :style="{width: '50vw'}">
                <form>
                    <Dropdown
                        v-model="form.warn_user_reason"
                        v-bind:class='{"p-invalid": form.errors.warn_user_reason}'
                        :options="reasons"
                        optionLabel="name"
                        optionValue="value"
                        placeholder="Select a Reason" />
                    <div>
                        <small v-if="form.errors.warn_user_reason" id="name-help"
                               class="p-error">{{ form.errors.warn_user_reason }}</small>
                    </div>

                    <label for="comment">Comment</label>
                    <Textarea :autoResize="true" rows="5" cols="30" id="comment"
                              v-bind:class='{"p-invalid": form.errors.warn_user_comment}'
                              v-model="form.warn_user_comment"
                    />
                    <small v-if="form.errors.warn_user_comment" id="name-help"
                           class="p-error">{{ form.errors.warn_user_comment }}</small>
                    <div class="field col-12 md:col-4">
                        <div>
                            <label for="basic">Warn Expiration Date</label>
                        </div>
                        <Calendar v-bind:class='{"p-invalid": form.errors.expires}'
                                  id="basic" v-model="form.expires" autocomplete="off" />
                        <div>
                            <small v-if="form.errors.expires" id="name-help"
                                   class="p-error">{{ form.errors.expires }}</small>
                        </div>
                    </div>

                </form>
                <template #footer>
                    <Button @click="closeBasic" label="Cancel" icon="pi pi-times" class="p-button-secondary" />
                    <Button @click="store" label="Submit" icon="pi pi-check" autofocus />
                </template>
            </Dialog>
        </div>
    </div>
</template>

<script>
import Dialog from "primevue/dialog";
import Button from "primevue/button";
import Tooltip from "primevue/tooltip";
import Textarea from "primevue/textarea";
import Dropdown from "primevue/dropdown";
import Ripple from "primevue/ripple";
import Calendar from "primevue/calendar";


export default {
    name: "WarnUser",
    components: {
        Button,
        Dialog,
        Textarea,
        Dropdown,
        Ripple,
        Calendar
    },
    props: {
        user: Object,
        admin: Boolean
    },
    directives: {
        "tooltip": Tooltip,
        "ripple": Ripple
    },
    remember: "form",
    data() {
        return {
            form: this.$inertia.form({
                _method: "post",
                warn_user_reason: "",
                warn_user_comment: "",
                expires: "",
                user_id: this.user.id
            }),
            displayBasic: false,
            reasons: [
                { name: "Spam", value: "spam" },
                { name: "Duplicate", value: "dupe" },
                { name: "Missing Info", value: "info" },
                { name: "Other", value: "other" }
            ]
        };
    },
    methods: {
        store() {
            this.form.post(route("admin.warn.store"), {
                onSuccess: () => {
                    this.form.reset("warn_user_comment", "warn_user_reason", "expires");
                    this.displayBasic = false;
                }
            });
        },
        openBasic() {
            this.displayBasic = true;
        },
        closeBasic() {
            this.displayBasic = false;
        }
    }
};
</script>

<style scoped>

</style>
