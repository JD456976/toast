<template>
    <Head>
        <title>Store Category List</title>
        <meta name="description" content="Store Category List">
    </Head>
    <div class="card">

        <DataTable :paginator="true"
                   :rows="25"
                   dataKey="id"
                   v-model:filters="filters"
                   filterDisplay="menu"
                   :globalFilterFields="['name','description','store.name']"
                   :value="cats"
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
            <Column field="id" header="ID">
                <template #body="slotProps">
                    <Link
                        v-tooltip.top="'Click to Edit'"
                        :href="$route('admin.store-category.edit',slotProps.data.id)">
                        {{ slotProps.data.id }}
                    </Link>
                </template>
            </Column>
            <Column field="store.name" header="Store" :sortable="true">
            </Column>
            <Column field="name" header="Name" :sortable="true">
            </Column>
            <Column field="description" header="Description" :sortable="true">
            </Column>
            <Column field="created_at" header="Created" :sortable="true"></Column>
            <Column field="updated_at" header="Updated" :sortable="true"></Column>
            <Column header="Delete">
                <template #body="slotProps">
                    <Link
                        v-tooltip.top="'Delete Category'"
                        method="delete"
                        :href="$route('admin.store-category.destroy',slotProps.data.id)">
                        <Button label="Delete" class="p-button-raised p-button-danger p-button-sm">

                        </Button>
                    </Link>
                </template>
            </Column>
        </DataTable>
    </div>
</template>

<script>
import Column from "primevue/column";
import DataTable from "primevue/datatable";
import AdminLayout from "@/Shared/AdminLayout";
import { Head, Link } from "@inertiajs/inertia-vue3";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import Badge from "primevue/badge";
import FlashMessages from "@/Shared/FlashMessages";
import Tooltip from "primevue/tooltip";

export default {
    name: "Index",
    layout: AdminLayout,
    components: {
        DataTable,
        Column,
        Head,
        Button,
        InputText,
        Badge,
        FlashMessages,
        Tooltip,
        Link
    },
    props: {
        cats: Array
    },
    directives: {
        "tooltip": Tooltip
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
                "name": {
                    operator: FilterOperator.AND,
                    constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
                },
                "description": {
                    operator: FilterOperator.AND,
                    constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
                },
                "store.name": {
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
