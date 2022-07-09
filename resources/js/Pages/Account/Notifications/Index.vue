<template>
    <Head>
        <title>Your Notifications</title>
        <meta name="description" content="Your notifications">
    </Head>
    <Toast />
    <ConfirmDialog></ConfirmDialog>
    <ConfirmDialog group="positionDialog"></ConfirmDialog>
    <div class="p-4">
        <div class="surface-border border-round surface-card" style="min-height: 20rem">
            <div class="grid">
                <dash-menu class="col-3" :auth="auth" />
                <div class="col-4 px-5 flex flex-column flex-auto">
                    <div>
                        <Card style="margin-bottom: 2em">
                            <template #title>
                                Your Notification
                                <h6 class="text-body">There are <span
                                    class="text-brand">{{ notifications.length }} </span> unread notifications
                                </h6>
                            </template>
                            <template #content>
                                <div class="col-12">
                                    <DataTable :value="notifications"
                                               responsiveLayout="scroll"
                                               :paginator="true" :rows="10">
                                        <Column field="title" header="Title"
                                                :sortable="true"></Column>
                                        <Column field="created_at" header="Created At" :sortable="true"></Column>
                                        <Column field="read_at" header="Read At" :sortable="true"></Column>
                                        <Column header="Actions">
                                            <template #body="slotProps">
                                                <Link
                                                    :href="$route('notification.show',slotProps.data.id)">
                                                    <Button
                                                        label="View"
                                                        v-tooltip.top="'View Notification'"
                                                        class="p-button-success p-button-raised p-button-sm"
                                                        icon="pi pi-eye"
                                                        iconPos="right"
                                                    />
                                                </Link>
                                            </template>
                                        </Column>
                                        <Column header="Actions">
                                            <template #body="slotProps">
                                                <Link
                                                    method="delete"
                                                    :href="$route('notification.delete',slotProps.data.id)">
                                                    <Button
                                                        v-if="!!slotProps.data.read_at"
                                                        label="Delete"
                                                        v-tooltip.top="'Delete Notification'"
                                                        class="p-button-danger p-button-raised p-button-sm"
                                                        icon="pi pi-trash"
                                                        iconPos="right"
                                                    />
                                                </Link>
                                            </template>
                                        </Column>
                                    </DataTable>
                                </div>
                            </template>
                        </Card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import DashMenu from "@/Shared/DashMenu";
import Column from "primevue/column";
import DataTable from "primevue/datatable";
import Toast from "primevue/toast";
import ConfirmDialog from "primevue/confirmdialog";

import Button from "primevue/button";
import Card from "primevue/card";

const props = defineProps({
    notifications: Array,
    auth: Object
});

</script>

<script>

import Tooltip from "primevue/tooltip";


export default {
    name: "NotificationIndex",
    directives: {
        "tooltip": Tooltip
    }
};
</script>
