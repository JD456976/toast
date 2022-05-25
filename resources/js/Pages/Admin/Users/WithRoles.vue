<template>
    <Head>
        <title>Users With Roles</title>
        <meta name="description" content="Users With Roles">
    </Head>
    <div class="card">
        <DataTable :paginator="true"
                   :rows="25"
                   dataKey="id"
                   v-model:filters="filters"
                   filterDisplay="menu"
                   :globalFilterFields="['name','email']"
                   :value="admins"
                   responsiveLayout="scroll">
            <template #header>
                <h5>Admins</h5>
                <div class="flex justify-content-between">
                    <Button type="button" icon="pi pi-filter-slash" label="Clear" class="p-button-outlined"
                            @click="clearFilter()" />
                    <span class="p-input-icon-left">
                            <i class="pi pi-search" />
                            <InputText v-model="filters['global'].value" placeholder="Keyword Search" />
                        </span>
                </div>
            </template>
            <Column field="name" header="Name" :sortable="true">
                <template #body="slotProps">
                    <Link
                        :href="$route('user.show',slotProps.data.slug)">
                        {{ slotProps.data.name }}
                    </Link>
                </template>
            </Column>
            <Column field="email" header="Email" :sortable="true"></Column>
            <Column field="active_status" header="Status" :sortable="true">
                <template #body="slotProps">
                    <Badge v-if="slotProps.data.active_status"
                           value="Active" severity="success"
                    ></Badge>
                    <Badge v-else value="Inactive"
                           severity="danger"></Badge>
                </template>
            </Column>
            <Column field="created_at" header="Joined" :sortable="true">
            </Column>
        </DataTable>
    </div>
    <div class="card mt-5">
        <DataTable :paginator="true"
                   :rows="25"
                   dataKey="id"
                   v-model:filters="filters1"
                   filterDisplay="menu"
                   :globalFilterFields="['name']"
                   :value="moderators"
                   responsiveLayout="scroll">
            <template #header>
                <h5>Moderators</h5>
                <div class="flex justify-content-between">
                    <Button type="button" icon="pi pi-filter-slash" label="Clear" class="p-button-outlined"
                            @click="clearFilter1()" />
                    <span class="p-input-icon-left">
                            <i class="pi pi-search" />
                            <InputText v-model="filters1['global'].value" placeholder="Keyword Search" />
                        </span>
                </div>
            </template>
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
            <Column field="created_at" header="Joined" :sortable="true">
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
        Link
    },
    props: {
        admins: Array,
        moderators: Array
    },
    data() {
        return {
            filters: null,
            filters1: null
        };
    },
    created() {
        this.initFilters();
        this.initFilters1();
    },
    methods: {
        clearFilter() {
            this.initFilters();
        },
        clearFilter1() {
            this.initFilters1();
        },
        initFilters() {
            this.filters = {
                "global": { value: null, matchMode: FilterMatchMode.CONTAINS },
                "name": {
                    operator: FilterOperator.AND,
                    constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
                }
            };
        },
        initFilters1() {
            this.filters1 = {
                "global": { value: null, matchMode: FilterMatchMode.CONTAINS },
                "name": {
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
