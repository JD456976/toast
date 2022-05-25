<template>
    <Head>
        <title>Deals List</title>
        <meta name="description" content="Deals List">
    </Head>
    <div class="card">
        <flash-messages />
        <DataTable :paginator="true"
                   :rows="25"
                   dataKey="id"
                   v-model:filters="filters"
                   filterDisplay="menu"
                   :globalFilterFields="[
                   'product.name',
                   'brand.name',
                   'store.name',
                   'user.name',
                   'approver.name',
                   'title',
                   'description',
                   'link'
                   ]"
                   :value="deals"
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
                        :href="$route('admin.deal.edit',slotProps.data.id)">
                        {{ slotProps.data.id }}
                    </Link>
                </template>
            </Column>
            <Column field="product" header="Product" :sortable="true">
                <template #body="slotProps">
                    {{ slotProps.data.product.name }}
                </template>
            </Column>
            <Column field="store" header="Store" :sortable="true">
                <template #body="slotProps">
                    {{ slotProps.data.store.name }}
                </template>
            </Column>
            <Column field="brand" header="Brand" :sortable="true">
                <template #body="slotProps">
                    {{ slotProps.data.brand.name }}
                </template>
            </Column>
            <Column field="user" header="User" :sortable="true">
                <template #body="slotProps">
                    <Link
                        :href="$route('user.show',slotProps.data.slug)">
                        {{ slotProps.data.user.name }}
                    </Link>
                </template>
            </Column>
            <Column field="approver" header="Approver" :sortable="true">
                <template #body="slotProps">
                    <Link
                        :href="$route('user.show',slotProps.data.slug)">
                        {{ slotProps.data.approver.name }}
                    </Link>
                </template>
            </Column>
            <Column field="title" header="Title" :sortable="true">
            </Column>
            <Column field="description" header="Description" :sortable="true">
            </Column>
            <Column field="discount" header="Discount" :sortable="true">
            </Column>
            <Column field="price" header="Price" :sortable="true">
            </Column>
            <Column field="price_extras" header="Price Extras" :sortable="true">
            </Column>
            <Column field="link" header="Link" :sortable="true">
            </Column>
            <Column field="is_featured" header="Featured" :sortable="true">
                <template #body="slotProps">
                    <Badge v-if="slotProps.data.is_featured"
                           value="Featured" severity="success"
                    ></Badge>
                    <Badge v-else value="Unfeatured"
                           severity="danger"></Badge>
                </template>
            </Column>
            <Column field="is_active" header="Active" :sortable="true">
                <template #body="slotProps">
                    <Badge v-if="slotProps.data.is_active"
                           value="Active" severity="success"
                    ></Badge>
                    <Badge v-else value="Inactive"
                           severity="danger"></Badge>
                </template>
            </Column>
            <Column field="is_frontpage" header="Frontpage" :sortable="true">
                <template #body="slotProps">
                    <Badge v-if="slotProps.data.is_frontpage"
                           value="Frontpage" severity="success"
                    ></Badge>
                    <Badge v-else value="Regular"
                           severity="danger"></Badge>
                </template>
            </Column>
            <Column field="created_at" header="Created" :sortable="true"></Column>
            <Column field="updated_at" header="Updated" :sortable="true"></Column>
            <Column header="Delete">
                <template #body="slotProps">
                    <Link
                        v-tooltip.top="'Delete Deal'"
                        method="delete"
                        :href="$route('admin.deal.destroy',slotProps.data.id)">
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
import { Head } from "@inertiajs/inertia-vue3";
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
        Tooltip
    },
    props: {
        deals: Array
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
                "brand.name": {
                    operator: FilterOperator.AND,
                    constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
                },
                "store.name": {
                    operator: FilterOperator.AND,
                    constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
                },
                "product.name": {
                    operator: FilterOperator.AND,
                    constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
                },
                "user.name": {
                    operator: FilterOperator.AND,
                    constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
                },
                "approver.name": {
                    operator: FilterOperator.AND,
                    constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
                },
                "title": {
                    operator: FilterOperator.AND,
                    constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
                },
                "link": {
                    operator: FilterOperator.AND,
                    constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
                },
                "description": {
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
