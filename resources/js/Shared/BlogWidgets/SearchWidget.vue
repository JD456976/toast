<template>
    <div class="sidebar-widget-2 widget_search mb-50">
        <div class="search-form">
            <blog-search />
        </div>
    </div>
</template>

<script>
import InputText from "primevue/inputtext";
import BlogSearch from "@/Shared/BlogSearch";

export default {
    name: "SearchWidget",
    components: {
        InputText,
        BlogSearch
    }
};
</script>

<style scoped>

</style>
