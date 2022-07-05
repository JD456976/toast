<template>
    <Head>
        <title>Users List</title>
        <meta name="description" content="Users List">
    </Head>
    <div class="card">

        <DataTable :paginator="true"
                   :rows="25"
                   dataKey="id"
                   v-model:filters="filters"
                   filterDisplay="menu"
                   :globalFilterFields="['name','email']"
                   :value="users"
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
                        :href="$route('admin.user.edit',slotProps.data.id)">
                        {{ slotProps.data.id }}
                    </Link>
                </template>
            </Column>
            <Column field="name" header="Name" :sortable="true">
                <template #body="slotProps">
                    <Link
                        :href="$route('user.show',slotProps.data.slug)">
                        {{ slotProps.data.name }}
                    </Link>
                </template>
            </Column>
            <Column field="email" header="Email" :sortable="true"></Column>
            <Column field="status" header="Status" :sortable="true">
                <template #body="slotProps">
                    <Badge v-if="slotProps.data.status"
                           value="Active" severity="success"
                    ></Badge>
                    <Badge v-else value="Inactive"
                           severity="danger"></Badge>
                </template>
            </Column>
            <Column field="created_at" header="Joined" :sortable="true"></Column>
        </DataTable>
    </div>
</template>

<script>
import Column from "primevue/column";
import DataTable from "primevue/datatable";
import AdminLayout from "@/Shared/AdminLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import Badge from "primevue/badge";
import Tooltip from "primevue/tooltip";
import FlashMessages from "@/Shared/FlashMessages.vue";

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
        FlashMessages
    },
    props: {
        users: Array
    },
    data() {
        return {
            filters: null
        };
    },
    directives: {
        "tooltip": Tooltip
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
                "email": {
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
