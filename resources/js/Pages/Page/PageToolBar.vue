<template>
    <div v-if="admin === true" class="fixed-bottom">
        <Toolbar>
            <template #start>
                <Link class="mr-3" :href="$route('admin.page.edit', page.id)">
                    <Button icon="pi pi-pencil" iconPos="right" label="Edit"
                            class="p-button-raised p-button-warning" />
                </Link>
            </template>

            <template #end>
                <Link
                    method="delete"
                    :href="$route('admin.page.destroy', page.id)">
                    <Button label="Delete"
                            class="p-button-danger p-button-raised"
                            icon="pi pi-times"
                            iconPos="right" />
                </Link>
            </template>
        </Toolbar>
    </div>
</template>

<script setup>
import Button from "primevue/button";
import Toolbar from "primevue/toolbar";

const props = defineProps({
    admin: Object,
    page: Object
});
</script>
<script>
export default {
    name: "PageToolBar"
};
</script>

<style scoped>
.chip a {
    font-size: 20px;
    padding: 10px;
}

</style>
