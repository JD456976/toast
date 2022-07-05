<template>
    <Head>
        <title>Warnings List</title>
        <meta name="description" content="Warnings List">
    </Head>
    <div class="card">

        <DataTable :paginator="true"
                   :rows="25"
                   dataKey="id"
                   v-model:filters="filters"
                   filterDisplay="menu"
                   :globalFilterFields="['user.name','staff.name','reason']"
                   :value="warns"
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
                        v-tooltip.top="'View Warning'"
                        method="get"
                        :href="$route('admin.warn.edit',slotProps.data.id)">
                        <Button icon="pi pi-external-link" label="Show"
                                class="p-button-raised p-button-info p-button-sm">
                        </Button>
                    </Link>
                </template>
            </Column>
            <Column field="user" header="User" :sortable="true">
                <template #body="slotProps">
                    <Link
                        :href="$route('user.show',slotProps.data.user.slug)">
                        {{ slotProps.data.user.name }}
                    </Link>
                </template>
            </Column>
            <Column field="staff" header="Staff" :sortable="true">
                <template #body="slotProps">
                    <Link class="nav-link"
                          :href="$route('user.show',slotProps.data.staff.slug)">
                        {{ slotProps.data.staff.name }}
                    </Link>
                </template>
            </Column>
            <Column field="reason" header="Reason" :sortable="true">
            </Column>
            <Column field="created_at" header="Created" :sortable="true"></Column>
            <Column field="expires" header="Expires" :sortable="true"></Column>
            <Column field="Delete">
                <Link
                    v-tooltip.top="'Delete Warning'"
                    method="delete"
                    :href="$route('admin.warn.destroy',slotProps.data.id)">
                    <Button label="Delete" class="p-button-raised p-button-danger p-button-sm">
                    </Button>
                </Link>
            </Column>
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
import Dialog from "primevue/dialog";

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
        Tooltip,
        FlashMessages,
        Dialog
    },
    props: {
        warns: Array,
        user: Object,
        staff: Object
    },
    directives: {
        "tooltip": Tooltip
    },
    data() {
        return {
            filters: null,
            displayModal: false
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
                "staff.name": {
                    operator: FilterOperator.AND,
                    constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
                },
                "reason": {
                    operator: FilterOperator.AND,
                    constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
                }
            };
        },
        openModal() {
            this.displayModal = true;
        },
        closeModal() {
            this.displayModal = false;
        }
    }
};
</script>

<style scoped>

</style>
