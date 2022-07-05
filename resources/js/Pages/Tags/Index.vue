<template>
    <Head>
        <title>Blogs Tagged With: {{ tag }}</title>
        <meta name="description" :content="'Blogs Tagged With ' + tag">
    </Head>
    <Divider />
    <TagBreadCrumbs :tag="tag" />
    <Divider />
    <div class="page-content mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <DataView :value="blogs" :layout="layout" :paginator="true" :rows="rows" paginatorPosition="both"
                              :sortOrder="sortOrder" :sortField="sortField">
                        <template #header>
                            <div class="grid grid-nogutter">
                                <div class="col-6" style="text-align: left">
                                    <Dropdown v-model="sortKey" :options="sortOptions"
                                              optionLabel="label"
                                              placeholder="Sort..."
                                              @change="onSortChange($event)" />
                                    <Dropdown :options="perPage"
                                              class="ml-5"
                                              optionLabel="label"
                                              placeholder="Per Page..."
                                              @change="onPageChange($event)"
                                    />
                                </div>
                                <div class="col-6" style="text-align: right">
                                    <DataViewLayoutOptions v-model="layout" />
                                </div>
                            </div>
                        </template>

                        <template #list="slotProps">
                            <div class="col-12">
                                <div class="row">
                                    <div
                                        class="flex shadow-2 surface-card border-round mr-0 xl:mr-4 mb-6 xl:mb-0 flex-column md:flex-row">
                                        <Link :href="$route('blog.show', slotProps.data.slug)">
                                            <img src="http://via.placeholder.com/640x360" alt="Image">
                                        </Link>
                                        <div class="p-4">
                                            <div class="flex justify-content-between mb-3">
                                                <span
                                                    class="text-orange-500 font-medum">{{ slotProps.data.category.title
                                                    }}</span>
                                                <Badge v-if="slotProps.data.is_featured" value="Featured"
                                                       severity="danger"></Badge>
                                                <span class="text-500 font-medium text-xs">
                                                    <i class="pi pi-calendar mr-1 text-xs"></i>{{ slotProps.data.created_at
                                                    }} | Viewed: {{ slotProps.data.views }} times</span>
                                            </div>
                                            <div class="font-medium text-900 mb-3 line-height-3 ">
                                                <Link :href="$route('blog.show', slotProps.data.slug)">
                                                    {{ slotProps.data.title }}
                                                </Link>
                                            </div>
                                            <div class="line-height-3 text-700 text-sm mb-3">
                                                {{ slotProps.data.summary }}
                                            </div>
                                            <div class="flex align-items-center">
                                                <Link :href="$route('user.show', slotProps.data.user.slug)">
                                                    <Avatar image="https://i.pravatar.cc/300"
                                                            shape="circle"></Avatar>
                                                </Link>

                                                <span
                                                    class="font-bold text-sm block ml-2 text-blue-600">
                                                    <Link :href="$route('user.show', slotProps.data.user.slug)">
                                                        {{ slotProps.data.user.name }}
                                                    </Link>
                                                </span>
                                                <Link class="ml-auto" :href="$route('blog.show', slotProps.data.slug)">
                                                    <Button icon="pi pi-play" iconPos="right" label="Read More"
                                                            class="p-button-raised p-button-success p-button-sm" />
                                                </Link>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template #grid="slotProps">
                            <div class="col-12 lg:col-4 p-3">
                                <div class="shadow-2 border-round h-full surface-card">
                                    <Link :href="$route('blog.show', slotProps.data.slug)">
                                        <img src="http://via.placeholder.com/640x360" :alt="slotProps.data.title"
                                             class="block w-full border-round-top">
                                    </Link>
                                    <div class="p-4">
                                        <span class="block font-medium text-blue-600 mb-3">
                                            {{ slotProps.data.category.title }}
                                        </span>

                                        <div class="text-xl text-900 font-medium mb-3 line-height-3 ">
                                            <Link :href="$route('blog.show', slotProps.data.slug)">
                                                {{ slotProps.data.title }}
                                            </Link>
                                            <Badge class="ml-20" v-if="slotProps.data.is_featured" value="Featured"
                                                   severity="danger"></Badge>
                                        </div>
                                        <div class="text-sm line-height-3 mb-3 text-700">
                                            {{ slotProps.data.summary }}
                                        </div>
                                        <div class="flex">
                                            <Avatar image="https://i.pravatar.cc/300"
                                                    shape="circle"></Avatar>
                                            <div class="ml-2">
                                                <div class="text-xs font-bold text-900 mb-1">
                                                    <Link :href="$route('user.show', slotProps.data.slug)">
                                                        {{ slotProps.data.user.name }}
                                                    </Link>
                                                </div>
                                                <div class="text-xs flex align-items-center text-700">
                                                    <i class="pi pi-calendar mr-1 text-xs"></i>
                                                    <span>{{ slotProps.data.created_at }}</span>
                                                    <i class="pi pi-eyer mr-1 ml-2 text-xs"></i>
                                                    <span>Viewed: {{ slotProps.data.views }} times</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-10 text-center">
                                            <Link class="ml-auto" :href="$route('blog.show', slotProps.data.slug)">
                                                <Button icon="pi pi-play" iconPos="right" label="Read More"
                                                        class="p-button-raised p-button-success p-button-sm" />
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </DataView>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <SearchWidget />

                    <CategoriesWidget :cats="cats" />

                    <PopularPostsWidget :popular="popular" />

                    <PopularTagsWidget :tags="tags" />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

import { Head, Link } from "@inertiajs/inertia-vue3";
import Button from "primevue/button";
import SearchWidget from "@/Shared/BlogWidgets/SearchWidget.vue";
import CategoriesWidget from "@/Shared/BlogWidgets/CategoriesWidget.vue";
import DataView from "primevue/dataview";
import Dropdown from "primevue/dropdown";
import DataViewLayoutOptions from "primevue/dataviewlayoutoptions";
import Badge from "primevue/badge";
import Avatar from "primevue/avatar";
import PopularTagsWidget from "@/Shared/BlogWidgets/PopularTagsWidget.vue";
import PopularPostsWidget from "@/Shared/BlogWidgets/PopularPostsWidget.vue";
import { ref } from "vue";
import TagBreadCrumbs from "@/Pages/Tags/TagBreadCrumbs.vue";
import Divider from "primevue/divider";

const props = defineProps({
    blogs: Array,
    tag: Object,
    tags: Array,
    views: Array,
    cats: Array,
    popular: Array,
    media: Array
});

const rows = ref(10);
const layout = ref("list");
const sortKey = ref();
const sortOrder = ref();
const sortField = ref();
const sortOptions = ref([
    { label: "Newest", value: "!created_at" },
    { label: "Oldest", value: "created_at" },
    { label: "Featured", value: "!is_featured" }
]);
const perPage = ref([
    { label: 10, value: 10 },
    { label: 20, value: 20 },
    { label: 30, value: 30 },
    { label: 40, value: 40 },
    { label: 50, value: 50 }
]);

function onSortChange(event) {
    const value = event.value.value;
    const sortValue = event.value;

    if (value.indexOf("!") === 0) {
        this.sortOrder = -1;
        this.sortField = value.substring(1, value.length);
        this.sortKey = sortValue;
    } else {
        this.sortOrder = 1;
        this.sortField = value;
        this.sortKey = sortValue;
    }
}

function onPageChange(event) {
    this.rows = event.value.value;
}

</script>

<script>
export default {
    name: "Index"
};
</script>

<style scoped>

</style>
