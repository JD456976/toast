report_bounty_comment_
<template>
    <div class="grid flex-column">
        <div class="col">
            <Button
                v-if="comment.is_reported === 1"
                disabled="disabled"
                icon="pi pi-flag-fill"
                class="p-button-rounded p-button-danger" />
            <Button v-else
                    v-tooltip.top="'Report Comment'"
                    @click="openBasic"
                    icon="pi pi-flag-fill"
                    class="p-button-rounded p-button-danger float-end" />
            <div>
                <small
                    v-if="comment.is_reported === true"
                    class="p-error">Already reported</small>
            </div>
            <Dialog :header="'Report Bounty Comment: ' + comment.comment" v-model:visible="displayBasic"
                    :style="{width: '50vw'}">
                <form>
                    <Dropdown
                        v-model="form.report_bounty_comment_reason"
                        v-bind:class='{"p-invalid": form.errors.report_bounty_comment_reason}'
                        :options="reasons"
                        optionLabel="name"
                        optionValue="value"
                        placeholder="Select a Reason" />
                    <div>
                        <small v-if="form.errors.report_bounty_comment_reason" id="name-help"
                               class="p-error">{{ form.errors.report_bounty_comment_reason }}</small>
                    </div>

                    <label for="report_bounty_comment_comment">Comment</label>
                    <Textarea :autoResize="true" rows="5" cols="30" id="report_bounty_comment_comment"
                              v-bind:class='{"p-invalid": form.errors.report_bounty_comment_comment}'
                              v-model="form.report_bounty_comment_comment"
                    />
                    <small v-if="form.errors.report_bounty_comment_comment" id="name-help"
                           class="p-error">{{ form.errors.report_bounty_comment_comment }}</small>

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
import Dialog from "primevue/dialog";
import Button from "primevue/button";
import { ref } from "vue";
import { reasons } from "@/stores/reasonsStore";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    bounty: Object,
    comment: Object
});

const openBasic = () => {
    displayBasic.value = true;
};

const closeBasic = () => {
    displayBasic.value = false;
};

let displayBasic = ref(false);

const form = useForm({
    report_bounty_comment_reason: "",
    report_bounty_comment_comment: "",
    slug: props.bounty.slug
});

const store = () => {
    form.post(route("report.bounty.comment", props.bounty.id), {
        onSuccess: () => {
            form.reset("report_bounty_comment_comment", "report_bounty_comment_reason");
            closeBasic();
        }
    });
};

</script>

<script>


import Tooltip from "primevue/tooltip";
import Ripple from "primevue/ripple";

export default {
    name: "ReportBountyCommentForm",
    remember: "form",
    directives: {
        "tooltip": Tooltip,
        "ripple": Ripple
    }
};
</script>

<style scoped></style>
