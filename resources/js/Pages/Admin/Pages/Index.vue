<template>
    <Head>
        <title>Page List</title>
        <meta name="description" content="Page List">
    </Head>
    <ConfirmPopup></ConfirmPopup>
    <div class="card">
        <Toast position="bottom-right" group="br" />
        <DataTable :paginator="true"
                   :rows="25"
                   dataKey="id"
                   v-model:filters="filters"
                   filterDisplay="menu"
                   :globalFilterFields="['title']"
                   :value="pages"
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
            <Column field="title" header="Title" :sortable="true">
                <template #body="slotProps">
                    <Link
                        v-tooltip.top="'Click to Edit'"
                        :href="$route('admin.page.edit',slotProps.data.id)">
                        {{ slotProps.data.title }}
                    </Link>
                </template>
            </Column>
            <Column field="is_active" header="Active" :sortable="true">
                <template #body="slotProps">
                    <Badge v-if="slotProps.data.is_active"
                           value="Yes" severity="success"
                    ></Badge>
                    <Badge v-else value="No"
                           severity="danger"></Badge>
                </template>
            </Column>
            <Column field="footer_menu" header="Footer Menu" :sortable="true">
                <template #body="slotProps">
                    <Badge v-if="slotProps.data.footer_menu"
                           value="Yes" severity="success"
                    ></Badge>
                    <Badge v-else value="No"
                           severity="danger"></Badge>
                </template>
            </Column>
            <Column field="header_menu" header="Header Menu" :sortable="true">
                <template #body="slotProps">
                    <Badge v-if="slotProps.data.header_menu"
                           value="Yes" severity="success"
                    ></Badge>
                    <Badge v-else value="No"
                           severity="danger"></Badge>
                </template>
            </Column>
            <Column field="created_at" header="Created" :sortable="true"></Column>
            <Column field="updated_at" header="Updated" :sortable="true"></Column>
            <Column header="Delete">
                <template #body="slotProps">
                    <Button
                        @click="deletePage($event,slotProps.data.id)"
                        label="Delete"
                        v-tooltip.top="'Delete Page'"
                        class="p-button-danger p-button-raised p-button-sm"
                        icon="pi pi-trash"
                        iconPos="right"
                    />
                </template>
            </Column>
        </DataTable>
    </div>
</template>

<script setup>
import Column from "primevue/column";
import DataTable from "primevue/datatable";
import { Head } from "@inertiajs/inertia-vue3";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import Badge from "primevue/badge";
import { ref } from "vue";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";
import { Inertia } from "@inertiajs/inertia";
import Toast from "primevue/toast";
import ConfirmPopup from "primevue/confirmpopup";

const props = defineProps({
    pages: Array
});

const clearFilter = () => {
    initFilters();
};

const filters = ref({
    "global": { value: null, matchMode: FilterMatchMode.CONTAINS },
    "title": {
        operator: FilterOperator.AND,
        constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
    }
});

const initFilters = () => {
    filters.value = {
        "global": { value: null, matchMode: FilterMatchMode.CONTAINS },
        "title": {
            operator: FilterOperator.AND,
            constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
        }
    };
};

const confirm = useConfirm();
const toast = useToast();

const deletePage = (event, id) => {
    confirm.require({
        target: event.currentTarget,
        message: "Do you want to delete this page?",
        icon: "pi pi-info-circle",
        acceptClass: "p-button-danger",
        accept: () => {
            Inertia.delete(route("admin.page.destroy", id));
        },
        reject: () => {
            toast.add({
                severity: "info",
                summary: "Canceled",
                detail: "Nothing was deleted",
                group: "br",
                life: 3000
            });
        }
    });
};
</script>

<script>

import AdminLayout from "@/Shared/AdminLayout";
import Tooltip from "primevue/tooltip";

export default {
    name: "PageIndex",
    layout: AdminLayout,
    props: {
        pages: Array
    },
    directives: {
        "tooltip": Tooltip
    }
};
</script>

<style scoped>

</style>
