<template>
    <Head>
        <title>Brands List</title>
        <meta name="description" content="Brands List">
    </Head>
    <ConfirmPopup></ConfirmPopup>
    <div class="card">
        <Toast position="bottom-right" group="br" />
        <DataTable :paginator="true"
                   :rows="25"
                   dataKey="id"
                   v-model:filters="filters"
                   filterDisplay="menu"
                   :globalFilterFields="['name','description']"
                   :value="brands"
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
            <Column field="name" header="Name" :sortable="true">
                <template #body="slotProps">
                    <Link
                        v-tooltip.top="'Click to Edit'"
                        :href="$route('admin.brand.edit',slotProps.data.id)">
                        {{ slotProps.data.name }}
                    </Link>
                </template>
            </Column>
            <Column field="description" header="Description" :sortable="true">
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
            <Column field="created_at" header="Created" :sortable="true"></Column>
            <Column field="updated_at" header="Updated" :sortable="true"></Column>
            <Column header="Delete">
                <template #body="slotProps">
                    <Button
                        @click="deleteBrand($event,slotProps.data.id)"
                        label="Delete"
                        v-tooltip.top="'Delete Brand'"
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
    brands: Array
});

const clearFilter = () => {
    initFilters();
};

const filters = ref({
    "global": { value: null, matchMode: FilterMatchMode.CONTAINS },
    "name": { operator: FilterOperator.AND, constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }] },
    "description": {
        operator: FilterOperator.AND,
        constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
    }
});

const initFilters = () => {
    filters.value = {
        "global": { value: null, matchMode: FilterMatchMode.CONTAINS },
        "name": {
            operator: FilterOperator.AND,
            constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
        },
        "description": {
            operator: FilterOperator.AND,
            constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }]
        }
    };
};

const confirm = useConfirm();
const toast = useToast();

const deleteBrand = (event, id) => {
    confirm.require({
        target: event.currentTarget,
        message: "Do you want to delete this brand?",
        icon: "pi pi-info-circle",
        acceptClass: "p-button-danger",
        accept: () => {
            Inertia.delete(route("admin.brand.destroy", id));
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
    name: "BrandIndex",
    layout: AdminLayout,
    directives: {
        "tooltip": Tooltip
    }
};
</script>

<style scoped>

</style>
