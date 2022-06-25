<template>
    <Head>
        <title>Viewing Page: {{ page.title }}</title>
        <meta name="description" content="Viewing Page">
    </Head>
    <div class="surface-section px-4 py-2 md:px-6 lg:px-8 text-700">
        <Divider />
        <ul class="list-none p-0 m-0 surface-card flex font-medium overflow-y-hidden overflow-x-auto">
            <li class="relative p-3">
                <a href="/" class="cursor-pointer">
                    <i class="pi pi-home text-green-500"></i>
                </a>
            </li>
            <li class="relative p-3">
                <div class="absolute left-0 top-0 z-1"
                     style="border-left: 20px solid var(--surface-card); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
                <Link class="cursor-pointer text-900 pl-4 white-space-nowrap"
                      :href="$route('page.show', page.slug)">
                    {{ page.title }}
                </Link>
                <div class="absolute top-0"
                     style="left: 1px; border-left: 20px solid var(--surface-border); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
            </li>
        </ul>
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

<script>

import { Head, Link } from "@inertiajs/inertia-vue3";
import SiteHeader from "@/Partials/SiteHeader";
import Tag from "primevue/tag";
import Divider from "primevue/divider";

export default {
    name: "Show",
    props: {
        page: Object
    },
    components: {
        SiteHeader,
        Tag,
        Divider,
        Link,
        Head
    }
};
</script>

<style scoped>

</style>
