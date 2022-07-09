<template>
    <div class="grid flex-column">
        <div class="col">
            <Button v-tooltip.top="'Report Bounty'" @click="openBasic" icon="pi pi-flag-fill"
                    class="ml-10 p-button-danger" />
            <Dialog :header="'Report Bounty: ' + bounty.item_name" v-model:visible="displayBasic"
                    :style="{width: '50vw'}">
                <form>
                    <Dropdown
                        v-model="form.report_bounty_reason"
                        v-bind:class='{"p-invalid": form.errors.report_bounty_reason}'
                        :options="reasons"
                        optionLabel="name"
                        optionValue="value"
                        placeholder="Select a Reason" />
                    <div>
                        <small v-if="form.errors.report_bounty_reason" id="name-help"
                               class="p-error">{{ form.errors.report_bounty_reason }}</small>
                    </div>

                    <label for="comment">Comment</label>
                    <Textarea :autoResize="true" rows="5" cols="30" id="comment"
                              v-bind:class='{"p-invalid": form.errors.report_bounty_comment}'
                              v-model="form.report_bounty_comment"
                    />
                    <small v-if="form.errors.report_bounty_comment" id="name-help"
                           class="p-error">{{ form.errors.report_bounty_comment }}</small>

                </form>
                <template #footer>
                    <Button @click="closeBasic" label="Cancel" icon="pi pi-times" class="p-button-secondary" />
                    <Button @click="store" label="Submit" icon="pi pi-check" autofocus />
                </template>
            </Dialog>
        </div>
    </div>
</template>

<script setup>
import Textarea from "primevue/textarea";
import Dropdown from "primevue/dropdown";
import { useForm } from "@inertiajs/inertia-vue3";
import Dialog from "primevue/dialog";
import Button from "primevue/button";
import { reasons } from "@/stores/reasonsStore";
import { ref } from "vue";

const props = defineProps({
    bounty: Object,
    auth: Object
});

const openBasic = () => {
    displayBasic.value = true;
};

const closeBasic = () => {
    displayBasic.value = false;
};

let displayBasic = ref(false);

const form = useForm({
    report_bounty_reason: "",
    report_bounty_comment: "",
    bounty_slug: props.bounty.slug
});


const store = () => {
    form.post(route("report.bounty", props.bounty.id), {
        onSuccess: () => {
            form.reset("report_bounty_comment", "report_bounty_reason");
            closeBasic();
        }
    });
};

</script>

<script>

import Tooltip from "primevue/tooltip";
import Ripple from "primevue/ripple";

export default {
    name: "ReportBountyForm",
    directives: {
        "tooltip": Tooltip,
        "ripple": Ripple
    },
    remember: "form"
};
</script>

<style scoped>

</style>
