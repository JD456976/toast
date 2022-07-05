<template>
    <Head>
        <title>Your Watchlist</title>
        <meta name="description" content="Your Watchlist">
    </Head>
    <div class="p-4">
        <div class="surface-border border-round surface-card" style="min-height: 20rem">
            <div class="grid">
                <dash-menu class="col-3" :user="user" />
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
                                        <Column field="id" header="Actions">
                                            <template #body="slotProps">
                                                <Link method="delete"
                                                      :href="$route('watchlist.delete',slotProps.data.id)">
                                                    <Button
                                                        label="Delete"
                                                        class="p-button-danger p-button-raised p-button-sm"
                                                        icon="pi pi-times"
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

<script>
import { Head } from "@inertiajs/inertia-vue3";
import FlashMessages from "../../../Shared/FlashMessages.vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Button from "primevue/button";
import Badge from "primevue/badge";
import ContextMenu from "primevue/contextmenu";
import Breadcrumb from "primevue/breadcrumb";
import ToggleButton from "primevue/togglebutton";
import { Link } from "@inertiajs/inertia-vue3";
import Toast from "primevue/toast";
import DashMenu from "@/Shared/DashMenu.vue";
import ConfirmDialog from "primevue/confirmdialog";
import Card from "primevue/card";


export default {
    name: "Index",
    components: {
        Head,
        FlashMessages,
        DataTable,
        Column,
        Button,
        Badge,
        ContextMenu,
        Breadcrumb,
        ToggleButton,
        Link,
        DashMenu,
        Card
    },
    props: {
        items: Array,
        item: Object
    }
};
</script>
