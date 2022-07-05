<template>
    <Head>
        <title>Your Deals</title>
        <meta name="description" content="Your posted deals">
    </Head>
    <div class="p-4">
        <div class="surface-border border-round surface-card" style="min-height: 20rem">
            <div class="grid">
                <dash-menu class="col-3" :user="user" />
                <div class="col-4 px-5 flex flex-column flex-auto">
                    <div>
                        <Card style="margin-bottom: 2em">
                            <template #title>
                                Your Posted Deals
                                <h6 class="text-body">There are <span
                                    class="text-brand">{{ deals.length }} </span> deals in your list
                                </h6>
                            </template>
                            <template #content>
                                <div class="col-12">
                                    <DataTable :value="deals"
                                               responsiveLayout="scroll"
                                               :paginator="true" :rows="10">
                                        <Column field="product.name" header="Product"
                                                :sortable="true"></Column>
                                        <Column field="title" header="Title"
                                                :sortable="true">
                                            <template #body="slotProps">
                                                <Link class="nav-link" :href="$route('deal.show',slotProps.data.slug)">
                                                    {{ slotProps.data.title }}
                                                </Link>
                                            </template>
                                        </Column>
                                        <Column field="is_active" header="Status" :sortable="true">
                                            <template #body="slotProps">
                                                <Badge v-if="slotProps.data.is_active"
                                                       value="Active" severity="success"
                                                       class="mr-2"></Badge>
                                                <Badge v-else value="Inactive"
                                                       severity="danger" class="mr-2"></Badge>
                                            </template>
                                        </Column>
                                        <Column field="created_at" header="Added On" :sortable="true"></Column>
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

import { Head, Link } from "@inertiajs/inertia-vue3";
import FlashMessages from "@/Shared/FlashMessages.vue";
import DashMenu from "@/Shared/DashMenu.vue";
import Column from "primevue/column";
import DataTable from "primevue/datatable";
import Badge from "primevue/badge";
import Tooltip from "primevue/tooltip";
import Card from "primevue/card";


export default {
    name: "Index",
    components: {
        Head,
        FlashMessages,
        DashMenu,
        DataTable,
        Column,
        Badge,
        Tooltip,
        Link,
        Card
    },
    props: {
        deals: Array
    },
    directives: {
        "tooltip": Tooltip
    }
};
</script>
