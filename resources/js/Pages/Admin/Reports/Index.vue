<template>
    <Head>
        <title>Reports List</title>
        <meta name="description" content="Reports List">
    </Head>
    <div class="card">
        <DataTable :paginator="true"
                   :rows="25"
                   dataKey="id"
                   v-model:filters="filters"
                   filterDisplay="menu"
                   :globalFilterFields="['user.name', 'reason', 'type']"
                   :value="reports"
                   responsiveLayout="scroll">
            <template #header>
                <div class="flex justify-content-between">
                    <Button type="button" icon="pi pi-filter-slash" label="Clear" class="p-button-outlined"
                            @click="clearFilter()" />
                    <span class="p-input-icon-left">
                            <i class="pi pi-search" />
                            <InputText v-model="filters['global'].value" placeholder="Keyword Search" />
                        </span>
                </div>
            </template>
            <Column field="id" header="ID" :sortable="true"></Column>
            <Column field="user" header="Reporting User" :sortable="true">
                <template #body="slotProps">
                    <Link
                        :href="$route('user.show',slotProps.data.user.slug)">
                        {{ slotProps.data.user.name }}
                    </Link>
                </template>
            </Column>
            <Column field="type" header="Type" :sortable="true">
                <template #body="slotProps">
                    <span v-if="slotProps.data.type.includes('Deal')">
                        Deal
                    </span>
                    <span v-if="slotProps.data.type.includes('Bounty')">
                        Bounty
                    </span>
                    <span v-if="slotProps.data.type.includes('Comment')">
                        Comment
                    </span>
                </template>
            </Column>
            <Column field="type" header="Link" :sortable="true">
                <template #body="slotProps">
                    <Link
                        v-if="slotProps.data.type.includes('Deal')"
                        class=""
                        :href="$route('deal.show', slotProps.data.deal.slug)"
                    >
                        <Button label="View Deal"
                                class="p-button-raised" />
                    </Link>
                    <Link
                        v-else-if="slotProps.data.type.includes('Bounty')"
                        class=""
                        :href="$route('bounty.show', slotProps.data.bounty.slug)"
                    >
                        <Button label="View Bounty"
                                class="p-button-raised" />
                    </Link>
                    <Link
                        v-else-if="slotProps.data.type.includes('Comment')"
                        class=""
                        :href="$route('bounty.show', slotProps.data.bounty.slug)"
                    >
                        <Button label="View Bounty (fix)"
                                class="p-button-raised" />
                    </Link>
                </template>
            </Column>
            <Column field="reason" header="Reason" :sortable="true"></Column>
            <Column field="is_resolved" header="Status" :sortable="true">
                <template #body="slotProps">
                    <Badge v-if="slotProps.data.is_resolved"
                           value="Resolved" severity="success"
                    ></Badge>
                    <Badge v-else value="Unresolved"
                           severity="danger"></Badge>
                </template>
            </Column>
            <Column field="created_at" header="Created" :sortable="true"></Column>
        </DataTable>
    </div>
</template>

<script>
import Column from "primevue/column";
import DataTable from "primevue/datatable";
import AdminLayout from "@/Shared/AdminLayout";
import { Head } from "@inertiajs/inertia-vue3";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import Badge from "primevue/badge";

export default {
    name: "Index",
    layout: AdminLayout,
    components: {
        DataTable,
        Column,
        Head,
        Button,
        InputText,
        Badge
    },
    props: {
        reports: Array,
        user: Object
    },
    data() {
        return {
            filters: null
        };
    },
    created() {
        this.initFilters();
    },
    methods: {
        clearFilter() {
            this.initFilters();
        },
        initFilters() {
            this.filters = {
                "global": { value: null, matchMode: FilterMatchMode.CONTAINS },
                "user.name": {
                    operator: FilterOperator.AND,
                    constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
                },
                "reason": {
                    operator: FilterOperator.AND,
                    constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
                },
                "type": {
                    operator: FilterOperator.AND,
                    constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
                }
            };
        }
    }
};
</script>

<style scoped>

</style>
