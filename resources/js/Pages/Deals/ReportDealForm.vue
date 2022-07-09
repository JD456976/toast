<template>
    <div class="grid flex-column">
        <div class="col">
            <Button v-tooltip.top="'Report Deal'" @click="openBasic" icon="pi pi-flag-fill"
                    class="ml-10 p-button-danger p-button-raised " />
            <Dialog :header="'Report Deal: ' + deal.title" v-model:visible="displayBasic" :style="{width: '50vw'}">
                <form>
                    <Dropdown
                        v-model="form.report_deal_reason"
                        v-bind:class='{"p-invalid": form.errors.report_deal_reason}'
                        :options="reasons"
                        optionLabel="name"
                        optionValue="value"
                        placeholder="Select a Reason" />
                    <div>
                        <small v-if="form.errors.report_deal_reason" id="name-help"
                               class="p-error">{{ form.errors.report_deal_reason }}</small>
                    </div>

                    <label for="comment">Comment</label>
                    <Textarea :autoResize="true" rows="5" cols="30" id="comment"
                              v-bind:class='{"p-invalid": form.errors.report_deal_comment}'
                              v-model="form.report_deal_comment"
                    />
                    <small v-if="form.errors.report_deal_comment" id="name-help"
                           class="p-error">{{ form.errors.report_deal_comment }}</small>

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
import { useForm } from "@inertiajs/inertia-vue3";
import Dialog from "primevue/dialog";
import Button from "primevue/button";
import Textarea from "primevue/textarea";
import Dropdown from "primevue/dropdown";
import { ref } from "vue";
import { reasons } from "@/stores/reasonsStore";

const props = defineProps({
    deal: Object,
    auth: Object
});

const form = useForm({
    report_deal_reason: "",
    report_deal_comment: "",
    deal_slug: props.deal.slug
});


const openBasic = () => {
    displayBasic.value = true;
};

const closeBasic = () => {
    displayBasic.value = false;
};

let displayBasic = ref(false);

const store = () => {
    form.post(route("report.deal", props.deal.id), {
        onSuccess: () => {
            form.reset("report_deal_comment", "report_deal_reason");
            closeBasic();
        }
    });
};
</script>

<script>

import Ripple from "primevue/ripple";
import Tooltip from "primevue/tooltip";

export default {
    name: "ReportDealForm",
    directives: {
        "tooltip": Tooltip,
        "ripple": Ripple
    }
};
</script>

<style scoped>

</style>
