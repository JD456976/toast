<template>
    <Head>
        <title>Your Warnings</title>
        <meta name="description" content="Your Warnings">
    </Head>
    <div class="p-4">
        <div class="surface-border border-round surface-card" style="min-height: 20rem">
            <div class="grid">
                <dash-menu class="col-3" :auth="auth" />
                <div class="col-4 px-5 flex flex-column flex-auto">
                    <div>
                        <Card style="margin-bottom: 2em">
                            <template #title>
                                Your Warnings
                                <h6 class="text-body">There are <span
                                    class="text-brand">{{ warnings.length }} </span> warnings
                                </h6>
                            </template>
                            <template #content>
                                <div class="col-12">
                                    <DataTable :value="warnings"
                                               responsiveLayout="scroll"
                                               :paginator="true" :rows="10">
                                        <Column field="id" header="ID">
                                            <template #body="slotProps">
                                                <Link
                                                    v-tooltip.top="'View Warning'"
                                                    method="get"
                                                    :href="$route('account.warnings.show',slotProps.data.id)">
                                                    <Button icon="pi pi-external-link" label="Show"
                                                            class="p-button-raised p-button-sm">
                                                    </Button>
                                                </Link>
                                            </template>
                                        </Column>
                                        <Column field="staff" header="Warned By"
                                                :sortable="true">
                                            <template #body="slotProps">
                                                <Link class="nav-link"
                                                      :href="$route('user.show',slotProps.data.staff.slug)">
                                                    {{ slotProps.data.staff.name }}
                                                </Link>
                                            </template>
                                        </Column>
                                        <Column field="reason" header="Reason"
                                                :sortable="true">
                                        </Column>
                                        <Column field="created_at" header="Added On" :sortable="true"></Column>
                                        <Column field="expires" header="Expires" :sortable="true"></Column>
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
import Button from "primevue/button";
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
        Button,
        Card
    },
    directives: {
        "tooltip": Tooltip
    },
    props: {
        warnings: Array,
        auth: Object
    }
};
</script>

<style scoped>

</style>
