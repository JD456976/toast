<template>
    <div v-if="admin === true" class="fixed-bottom">
        <Toolbar>
            <template #start>
                <Link class="mr-3" :href="$route('admin.blog.edit', blog.id)">
                    <Button icon="pi pi-pencil" iconPos="right" label="Edit"
                            class="p-button-raised p-button-warning" />
                </Link>
                <Link class="mr-3" v-if="blog.is_featured === false"
                      :href="$route('admin.blog.feature', blog.id)">
                    <Button icon="pi pi-star" iconPos="right" label="Feature"
                            class="p-button-raised p-button-info" />
                </Link>
                <Link class="mr-3" v-else
                      :href="$route('admin.blog.feature', blog.id)">
                    <Button icon="pi pi-star" iconPos="right" label="Unfeature"
                            class="p-button-raised p-button-secondary" />
                </Link>
                <Link class="mr-3" v-if="blog.is_active === false"
                      :href="$route('admin.blog.activate', blog.id)">
                    <Button icon="pi pi-power-off" iconPos="right"
                            label="Activate"
                            class="p-button-raised p-button-info" />
                </Link>
                <Link class="mr-3" v-else
                      :href="$route('admin.blog.activate', blog.id)">
                    <Button icon="pi pi-power-off" iconPos="right"
                            label="Deactivate"
                            class="p-button-raised p-button-secondary" />
                </Link>
            </template>

            <template #end>
                <Link
                    method="delete"
                    :href="$route('admin.blog.destroy', blog.id)">
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
    blog: Object
});
</script>
<script>


export default {
    name: "BlogToolBar"
};
</script>
<style scoped>
.chip a {
    font-size: 20px;
    padding: 10px;
}

</style>
