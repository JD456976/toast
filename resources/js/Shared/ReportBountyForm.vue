<template>
    <div class="grid flex-column">
        <div class="col">
            <Button v-tooltip.top="'Report Bounty'" @click="openBasic" icon="pi pi-flag-fill"
                    class="p-button-rounded p-button-danger" />
            <Dialog :header="bounty.title" v-model:visible="displayBasic" :style="{width: '50vw'}">
                <form>
                    <Dropdown
                        v-model="form.reason"
                        v-bind:class='{"p-invalid": form.errors.reason}'
                        :options="reasons"
                        optionLabel="name"
                        optionValue="value"
                        placeholder="Select a Reason" />
                    <div>
                        <small v-if="form.errors.reason" id="name-help"
                               class="p-error">{{ form.errors.reason }}</small>
                    </div>

                    <label for="comment">Comment</label>
                    <Textarea :autoResize="true" rows="5" cols="30" id="comment"
                              v-bind:class='{"p-invalid": form.errors.comment}'
                              v-model="form.comment"
                    />
                    <small v-if="form.errors.comment" id="name-help"
                           class="p-error">{{ form.errors.comment }}</small>

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
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import Dialog from "primevue/dialog";
import Button from "primevue/button";
import Tooltip from "primevue/tooltip";
import Textarea from "primevue/textarea";
import Dropdown from "primevue/dropdown";
import Ripple from "primevue/ripple";


export default {
    setup() {
        const user = computed(() => usePage().props.value.auth.user);
        return {
            user
        };
    },
    name: "ReportBountyForm",
    components: {
        Button,
        Dialog,
        Textarea,
        Dropdown,
        Ripple
    },
    props: {
        bounty: Object
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
                reason: "",
                comment: "",
                bounty_slug: this.bounty.slug
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
            this.form.post(route("report.bounty", this.bounty.id), {
                onSuccess: () => {
                    this.form.reset("comment", "reason");
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
