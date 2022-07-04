<template>
    <Head>
        <title>Viewing Page: {{ page.title }}</title>
        <meta name="description" content="Viewing Page">
    </Head>
    <div class="surface-section px-4 py-2 md:px-6 lg:px-8 text-700">
        <Divider />
        <PageBreadCrumbs :page="page" />
        <Divider />
        <div class="flex flex-wrap mt-50">
            <div class="w-full lg:w-12 pr-0 lg:pr-5">
                <div class="mb-5">
                    <Tag value="New" class="mr-2"></Tag>
                    <Tag value="Technology" severity="success" class="mr-2"></Tag>
                    <Tag value="Education" severity="warning"></Tag>
                </div>
                <div class="font-normal text-4xl mt-3 mb-3 text-900">
                    {{ page.title }}
                </div>
                <div class="text-600 mb-5">Posted: {{ page.created_at }}</div>
                <p class="line-height-3 mt-0 mb-5">
                    {{ page.content }}
                </p>
            </div>
        </div>
        <Divider />
    </div>
</template>

<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import Tag from "primevue/tag";
import Divider from "primevue/divider";
import PageBreadCrumbs from "@/Pages/Page/PageBreadCrumbs";

const props = defineProps({
    page: Object
});
</script>

<script>

export default {
    name: "Show"
};
</script>

<style scoped>

</style>
