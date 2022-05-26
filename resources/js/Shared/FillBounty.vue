<template>
    <div class="mb-20">
        <Button :disabled="bounty.is_filled" @click="openFillBounty" label="Fill Bounty" icon="pi pi-filter-fill"
                class="p-button-raised p-button-warning">
            <span v-if="bounty.is_filled">Bounty Filled</span>
        </Button>
    </div>
    <Dialog header="Fill Bounty" v-model:visible="fillBounty" :style="{width: '50vw'}">
        <div class="form-group col-lg-12">
            <label for="deal_id">Your Deal URL</label>
            <InputText id="deal_id" type="text"
                       v-bind:class='{"p-invalid": form.errors.deal_id}'
                       v-model="form.deal_id"
            />
            <small v-if="form.errors.deal_id" id="name-help"
                   class="p-error">{{ form.errors.deal_id }}</small>
        </div>
        <template #footer>
            <Button label="Cancel" icon="pi pi-times" @click="closeFillBounty"
                    class="p-button-text" />
            <Button @click="update" label="Submit" icon="pi pi-check" autofocus />
        </template>
    </Dialog>
</template>

<script>
import Dialog from "primevue/dialog";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import Tooltip from "primevue/tooltip";

export default {
    name: "FillBounty",
    remember: "form",
    components: {
        Button,
        Dialog,
        InputText,
        Tooltip
    },
    props: {
        bounty: Object
    },
    directives: {
        "tooltip": Tooltip
    },
    data() {
        return {
            fillBounty: false,
            form: this.$inertia.form({
                _method: "patch",
                deal_id: ""
            })
        };
    },
    methods: {
        openFillBounty() {
            this.fillBounty = true;
        },
        closeFillBounty() {
            this.fillBounty = false;
        },
        update() {
            this.form.patch(route("bounty.update", this.bounty.id), {
                onSuccess: () => {
                    this.form.reset("deal_id");
                    this.closeFillBounty();
                }
            });
        }
    }
};
</script>

<style scoped>

</style>
