<template>
    <Head>
        <title>Your Bounties</title>
        <meta name="description" content="Your posted bounties">
    </Head>
    <div class="page-content pt-50 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <dash-menu />
                        <div class="col-md-9">

                            <h3 class="heading-2 mb-10">Your Posted Bounties</h3>
                            <h6 class="text-body">There are <span
                                class="text-brand">{{ bounties.length }} </span> bounties in your list
                            </h6>
                            <div class="col-12 pl-75">
                                <DataTable :value="bounties"
                                           responsiveLayout="scroll"
                                           :paginator="true" :rows="10">
                                    <Column field="item_name" header="Item Name"
                                            :sortable="true">
                                        <template #body="slotProps">
                                            <Link class="nav-link" :href="$route('bounty.show',slotProps.data.slug)">
                                                {{ slotProps.data.item_name }}
                                            </Link>
                                        </template>
                                    </Column>
                                    <Column field="award" header="Award"
                                            :sortable="true">
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
                                    <Column field="is_active" header="Filled" :sortable="true">
                                        <template #body="slotProps">
                                            <Badge v-if="slotProps.data.is_filled"
                                                   value="Filled" severity="success"
                                                   class="mr-2"></Badge>
                                            <Badge v-else value="Unfilled"
                                                   severity="danger" class="mr-2"></Badge>
                                        </template>
                                    </Column>
                                    <Column field="created_at" header="Added On" :sortable="true"></Column>
                                </DataTable>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import { Head, Link } from "@inertiajs/inertia-vue3";
import FlashMessages from "@/Shared/FlashMessages";
import DashMenu from "@/Shared/DashMenu";
import Column from "primevue/column";
import DataTable from "primevue/datatable";
import Badge from "primevue/badge";
import Tooltip from "primevue/tooltip";


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
        Link
    },
    props: {
        bounties: Array
    },
    directives: {
        "tooltip": Tooltip
    }
};
</script>
