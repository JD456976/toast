<template>
    <Head>
        <title>Editing Site Settings</title>
        <meta name="description" content="Edit Site Settings">
    </Head>
    <div class="col-6 col-offset-3 ">
        <div class="card text-bg-light mb-3">
            <div class="card-header">Editing Site Settings</div>
            <div class="card-body">
                <form @submit.prevent="update">
                    <div class="col-12">
                        <label class="form-label" for="name">Hot Views</label>
                        <h6 class="text-muted">Number of views before the "HOT" tag appears on deals</h6>
                        <InputText id="hot_views" type="text"
                                   class="form-control"
                                   v-bind:class='{"p-invalid": form.errors.hot_views}'
                                   v-model="form.hot_views"
                        />
                        <small v-if="form.errors.hot_views" id="name-help"
                               class="p-error">{{ form.errors.hot_views }}</small>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="name">New Days</label>
                        <h6 class="text-muted">Number of days for the "NEW" tag to appear on deals</h6>
                        <InputText id="new_days" type="text"
                                   class="form-control"
                                   v-bind:class='{"p-invalid": form.errors.new_days}'
                                   v-model="form.new_days"
                        />
                        <small v-if="form.errors.new_days" id="name-help"
                               class="p-error">{{ form.errors.new_days }}</small>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="name">Deal Points</label>
                        <h6 class="text-muted">Points awarded for posting a new deal</h6>
                        <InputText id="deal_points" type="text"
                                   class="form-control"
                                   v-bind:class='{"p-invalid": form.errors.deal_points}'
                                   v-model="form.deal_points"
                        />
                        <small v-if="form.errors.deal_points" id="name-help"
                               class="p-error">{{ form.errors.deal_points }}</small>
                    </div>

                    <div class="col-12">
                        <Button type="submit" label="Save Settings" class="p-button-raised p-button-rounded"
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
import Button from "primevue/button";
import InputText from "primevue/inputtext";

const props = defineProps({
    settings: Array
});

const form = useForm({
    hot_views: props.settings.hot_views,
    new_days: props.settings.new_days,
    deal_points: props.settings.deal_points
});

const update = () => {
    form.patch(route("admin.settings.update"));
};
</script>

<script>
import AdminLayout from "@/Shared/AdminLayout";

export default {
    name: "SettingsEdit",
    remember: "form",
    layout: AdminLayout
};
</script>

<style scoped>

</style>
