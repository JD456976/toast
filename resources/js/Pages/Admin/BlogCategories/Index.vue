<template>
    <Head>
        <title>Blog Categories List</title>
        <meta name="description" content="Blog Categories List">
    </Head>
    <div class="card">

        <DataTable :paginator="true"
                   :rows="25"
                   dataKey="id"
                   v-model:filters="filters"
                   filterDisplay="menu"
                   :globalFilterFields="['title']"
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
                        :href="$route('admin.blog-category.edit',slotProps.data.id)">
                        {{ slotProps.data.id }}
                    </Link>
                </template>
            </Column>
            <Column field="title" header="Title" :sortable="true">
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
                    <Link
                        v-tooltip.top="'Delete Category'"
                        method="delete"
                        :href="$route('admin.blog-category.destroy',slotProps.data.id)">
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
import AdminLayout from "@/Shared/AdminLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import Badge from "primevue/badge";
import FlashMessages from "@/Shared/FlashMessages.vue";
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
                "title": {
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
