<template>
    <Head>
        <title>Your Watchlist</title>
        <meta name="description" content="Your Watchlist">
    </Head>
    <ConfirmPopup></ConfirmPopup>
    <div class="p-4">
        <div class="surface-border border-round surface-card" style="min-height: 20rem">
            <Toast position="bottom-right" group="br" />
            <div class="grid">
                <dash-menu class="col-3" :auth="auth" />
                <div class="col-4 px-5 flex flex-column flex-auto">
                    <div>
                        <Card style="margin-bottom: 2em">
                            <template #title>
                                Your Watchlist
                                <h6 class="text-body">There are <span
                                    class="text-brand">{{ items.length }} </span> items in your watchlist
                                </h6>
                            </template>
                            <template #content>
                                <div class="col-12">
                                    <DataTable
                                        :value="items"
                                        responsiveLayout="scroll"
                                        :paginator="true" :rows="10"
                                    >
                                        <Column field="product.name" header="Product" :sortable="true"></Column>
                                        <Column field="is_active" header="Status" :sortable="true">
                                            <template #body="slotProps">
                                                <Link v-if="slotProps.data.is_active"
                                                      method="post"
                                                      :href="$route('watchlist.deactivate',slotProps.data.id)">
                                                    <Button
                                                        label="Deactivate"
                                                        class="p-button-danger p-button-raised p-button-sm"
                                                        icon="pi pi-times"
                                                        iconPos="right"
                                                    />
                                                </Link>
                                                <Link v-else method="post"
                                                      :href="$route('watchlist.activate',slotProps.data.id)">
                                                    <Button
                                                        label="Activate"
                                                        class="p-button-success p-button-raised p-button-sm"
                                                        icon="pi pi-check"
                                                        iconPos="right"
                                                    />
                                                </Link>
                                            </template>
                                        </Column>
                                        <Column field="created_at" header="Added On" :sortable="true"></Column>
                                        <Column field="id" header="Delete">
                                            <template #body="slotProps">
                                                <Button
                                                    @click="deleteWatchlist($event,slotProps.data.id)"
                                                    label="Delete"
                                                    v-tooltip.top="'Delete Item'"
                                                    class="p-button-danger p-button-raised p-button-sm"
                                                    icon="pi pi-trash"
                                                    iconPos="right"
                                                />
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

import { Head } from "@inertiajs/inertia-vue3";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Button from "primevue/button";
import { Link } from "@inertiajs/inertia-vue3";
import DashMenu from "@/Shared/DashMenu";
import Card from "primevue/card";
import { Inertia } from "@inertiajs/inertia";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";
import ConfirmPopup from "primevue/confirmpopup";
import Toast from "primevue/toast";

const props = defineProps({
    items: Array,
    item: Object,
    auth: Object
});

const confirm = useConfirm();
const toast = useToast();

const deleteWatchlist = (event, id) => {
    confirm.require({
        target: event.currentTarget,
        message: "Do you want to delete this item?",
        icon: "pi pi-info-circle",
        acceptClass: "p-button-danger",
        accept: () => {
            Inertia.delete(route("watchlist.delete", id));
        },
        reject: () => {
            toast.add({
                severity: "info",
                summary: "Canceled",
                detail: "Nothing was deleted",
                group: "br",
                life: 3000
            });
        }
    });
};
</script>

<script>


export default {
    name: "WatchlistIndex"
};
</script>
