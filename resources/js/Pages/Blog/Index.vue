<template>
    <Head>
        <title>Blog</title>
        <meta name="description" content="Blog">
    </Head>
    <div class="page-content mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <DataView :value="filteredBlogs" :layout="layout" :paginator="true" :rows="rows"
                              paginatorPosition="both"
                              :sortOrder="sortOrder" :sortField="sortField">
                        <template #header>
                            <div class="grid grid-nogutter">
                                <div class="col-9" style="text-align: left">
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
                                    <Dropdown v-model="selectedCat" class="ml-5"
                                              :options="cats" optionLabel="title"
                                              :filter="true" placeholder="Select a Category"
                                              :showClear="true">
                                        <template #value="slotProps">
                                            <div class="country-item country-item-value"
                                                 v-if="slotProps.value">
                                                <div>{{ slotProps.value.title }}</div>
                                            </div>
                                            <span v-else>
                                                    {{ slotProps.placeholder }}
                                                </span>
                                        </template>
                                        <template #option="slotProps">
                                            <div class="country-item">
                                                <div>{{ slotProps.option.title }}</div>
                                            </div>
                                        </template>
                                    </Dropdown>
                                </div>
                                <div class="col-3" style="text-align: right">
                                    <DataViewLayoutOptions v-model="layout" />
                                </div>
                            </div>
                        </template>

                        <template #empty>
                            <div class="text-center text-2xl p-5">
                                No records found.
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

                    <PopularPostsWidget :popular="popular" />

                    <PopularTagsWidget :tags="tags" />
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Button from "primevue/button";
import BlogHeader from "@/Partials/BlogHeader";
import SearchWidget from "@/Shared/BlogWidgets/SearchWidget";
import DataView from "primevue/dataview";
import Dropdown from "primevue/dropdown";
import DataViewLayoutOptions from "primevue/dataviewlayoutoptions";
import Badge from "primevue/badge";
import Avatar from "primevue/avatar";
import PopularTagsWidget from "@/Shared/BlogWidgets/PopularTagsWidget";
import PopularPostsWidget from "@/Shared/BlogWidgets/PopularPostsWidget";

export default {
    name: "Index",
    data() {
        return {
            selectedCat: null,
            rows: 10,
            layout: "list",
            sortKey: null,
            selectedTag: null,
            sortOrder: null,
            sortField: null,
            sortOptions: [
                { label: "Newest", value: "!created_at" },
                { label: "Oldest", value: "created_at" },
                { label: "Featured", value: "!is_featured" }
            ],
            perPage: [
                { label: 10, value: 10 },
                { label: 20, value: 20 },
                { label: 30, value: 30 },
                { label: 40, value: 40 },
                { label: 50, value: 50 }
            ]
        };
    },
    methods: {
        onSortChange(event) {
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
        },
        onPageChange(event) {
            this.rows = event.value.value;
        }
    },
    components: {
        BlogHeader,
        Head,
        Image,
        Link,
        SearchWidget,
        DataView,
        Dropdown,
        DataViewLayoutOptions,
        Button,
        Badge,
        Avatar,
        PopularTagsWidget,
        PopularPostsWidget
    },
    props: {
        blogs: Array,
        tags: Array,
        views: Array,
        cats: Array,
        popular: Array,
        media: Array
    },
    computed: {
        filteredBlogs() {
            if (this.selectedCat) {
                let tempBlogs = this.blogs;

                tempBlogs = tempBlogs.filter((item) => {
                    return item.category.id === this.selectedCat.id;
                });
                return tempBlogs;
            }
            return this.blogs;
        }
    }
};
</script>

<style lang="scss" scoped>
.card {
    background: #ffffff;
    padding: 2rem;
    box-shadow: 0 2px 1px -1px rgba(0, 0, 0, .2), 0 1px 1px 0 rgba(0, 0, 0, .14), 0 1px 3px 0 rgba(0, 0, 0, .12);
    border-radius: 4px;
    margin-bottom: 2rem;
}

.p-dropdown {
    width: 14rem;
    font-weight: normal;
}

.product-name {
    font-size: 1.5rem;
    font-weight: 700;
}

.product-description {
    margin: 0 0 1rem 0;
}

.product-category-icon {
    vertical-align: middle;
    margin-right: .5rem;
}

.product-category {
    font-weight: 600;
    vertical-align: middle;
}

::v-deep(.product-list-item) {
    display: flex;
    align-items: center;
    padding: 1rem;
    width: 100%;

    img {
        width: 50px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        margin-right: 2rem;
    }

    .product-list-detail {
        flex: 1 1 0;
    }

    .p-rating {
        margin: 0 0 .5rem 0;
    }

    .product-price {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: .5rem;
        align-self: flex-end;
    }

    .product-list-action {
        display: flex;
        flex-direction: column;
    }

    .p-button {
        margin-bottom: .5rem;
    }
}

::v-deep(.product-grid-item) {
    margin: .5rem;
    border: 1px solid var(--surface-border);

    .product-grid-item-top,
    .product-grid-item-bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    img {
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        margin: 2rem 0;
    }

    .product-grid-item-content {
        text-align: center;
    }

    .product-price {
        font-size: 1.5rem;
        font-weight: 600;
    }
}

@media screen and (max-width: 576px) {
    .product-list-item {
        flex-direction: column;
        align-items: center;

        img {
            margin: 2rem 0;
        }

        .product-list-detail {
            text-align: center;
        }

        .product-price {
            align-self: center;
        }

        .product-list-action {
            display: flex;
            flex-direction: column;
        }

        .product-list-action {
            margin-top: 2rem;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
    }
}
</style>
