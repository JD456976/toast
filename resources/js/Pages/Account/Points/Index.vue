<template>
    <Head>
        <title>Your Points</title>
        <meta name="description" content="Your Points">
    </Head>
    <div class="page-content pt-50 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <dash-menu />
                        <div class="col-md-9">
                            <flash-messages />
                            <h3 class="heading-2 mb-10">Your Points</h3>
                            <h6 class="text-body">You have a total of <span
                                class="text-brand">{{ points }} </span> points!
                            </h6>
                            <div class="col-12 pl-75">
                                <DataTable :value="point"
                                           responsiveLayout="scroll"
                                           :paginator="true" :rows="10">
                                    <Column field="pointable_type" header="Type"
                                            :sortable="true"></Column>
                                    <Column field="pointable_id" header="ID"
                                            :sortable="true">
                                        <template #body="slotProps">
                                            link
                                        </template>
                                    </Column>
                                    <Column field="points" header="Points" :sortable="true">
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
import DataTable from "primevue/datatable";
import Column from "primevue/column";
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
        point: Array,
        points: Number
    },
    directives: {
        "tooltip": Tooltip
    }
};
</script>

<style scoped>

</style>
