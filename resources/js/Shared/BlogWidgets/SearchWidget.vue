<template>
    <div class="sidebar-widget-2 widget_search mb-50">
        <div class="search-form">
            <form action="#">
                <span class="p-input-icon-left">
                    <i class="pi pi-search" />
                    <InputText class="p-inputtext-lg" type="text" v-model="value3" placeholder="Search" />
                </span>
            </form>
        </div>
    </div>
</template>

<script>
import InputText from "primevue/inputtext";

export default {
    name: "SearchWidget",
    components: {
        InputText
    }
};
</script>

<style scoped>

</style>
