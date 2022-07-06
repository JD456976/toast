<template>
    <Head>
        <title>Your Points</title>
        <meta name="description" content="Your Points">
    </Head>
    <div class="p-4">
        <div class="surface-border border-round surface-card" style="min-height: 20rem">
            <div class="grid">
                <dash-menu class="col-3" :auth="auth" />
                <div class="col-4 px-5 flex flex-column flex-auto">
                    <div>
                        <Card style="margin-bottom: 2em">
                            <template #title>
                                Your Points
                                <h6 class="text-body">You have a total of <span
                                    class="text-brand">{{ point.length }} </span> points
                                </h6>
                            </template>
                            <template #content>
                                <div class="col-12">
                                    <DataTable :value="point"
                                               responsiveLayout="scroll"
                                               :paginator="true" :rows="10">
                                        <Column field="pointable_type" header="Type"
                                                :sortable="true">
                                            <template #body="slotProps">
                                                <h6 v-if="slotProps.data.pointable_type === 'Bounty'">
                                                    Bounty
                                                </h6>
                                                <h6 v-else>
                                                    Deal
                                                </h6>
                                            </template>
                                        </Column>
                                        <Column field="pointable_type" header="ID"
                                                :sortable="true">
                                            <template #body="slotProps">
                                                <Link v-if="slotProps.data.pointable_type === 'Bounty'"
                                                      :href="$route('bounty.show', slotProps.data.bounty.slug)">
                                                    {{ slotProps.data.bounty.item_name }}
                                                </Link>
                                                <Link v-else :href="$route('deal.show', slotProps.data.deal.slug)">
                                                    {{ slotProps.data.deal.title }}
                                                </Link>
                                            </template>
                                        </Column>
                                        <Column field="points" header="Points" :sortable="true">
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
import FlashMessages from "@/Shared/FlashMessages";
import DashMenu from "@/Shared/DashMenu";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
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
        point: Array,
        points: Number,
        auth: Object

    },
    directives: {
        "tooltip": Tooltip
    }
};
</script>

<style scoped>

</style>
