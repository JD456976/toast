<template>
    <Head>
        <title>Blog</title>
        <meta name="description" content="Blog">
    </Head>
    <blog-header :tags="tags" />
    <div class="page-content mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <DataView :value="blogs" :layout="layout" :paginator="true" :rows="9"
                              :sortOrder="sortOrder" :sortField="sortField">
                        <template #header>
                            <div class="grid grid-nogutter">
                                <div class="col-6" style="text-align: left">
                                    <Dropdown v-model="sortKey" :options="sortOptions"
                                              optionLabel="label"
                                              placeholder="Sort..."
                                              @change="onSortChange($event)" />
                                </div>
                                <div class="col-6" style="text-align: right">
                                    <DataViewLayoutOptions v-model="layout" />
                                </div>
                            </div>
                        </template>

                        <template #list="slotProps">
                            <div class="col-12">
                                <div class="row">
                                    <div class="mt-3 col-9">
                                        <Badge v-if="slotProps.data.is_featured" value="Featured"
                                               severity="danger"></Badge>
                                    </div>
                                    <div class="float-end col-3 mt-3">
                                        <h6>
                                            Posted: {{ slotProps.data.created_at }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="product-list-item">
                                    <Link :href="$route('blog.show', slotProps.data.slug)">
                                        <Image :src="slotProps.data.media"
                                               :alt=slotProps.data.slug width="250" />
                                    </Link>
                                    <div class="product-list-detail ml-5">
                                        <div class="product-name">
                                            <Link :href="$route('blog.show', slotProps.data.slug)">
                                                <h3>{{ slotProps.data.title }}</h3>
                                            </Link>
                                        </div>
                                        <i class="pi pi-tag product-category-icon"></i><span
                                        class="product-category">{{ slotProps.data.category.title }}</span>
                                        <div>
                                            {{ slotProps.data.summary }}
                                        </div>

                                    </div>
                                    <div class="product-list-action">
                                        <span class="product-price">{{ slotProps.data.views }}</span>
                                    </div>
                                </div>
                                <div class="float-start chip w-50 w-sm-100">
                                    <h6>Tags:</h6>
                                    <Chip class="mr-2" v-for="tag in slotProps.data.tag" :key="id">
                                        <Link
                                            :href="$route('blog.tag', tag)">
                                            {{ tag }}
                                        </Link>
                                    </Chip>
                                </div>
                                <div class="float-end mb-3">
                                    <Link :href="$route('blog.show', slotProps.data.slug)">
                                        <Button icon="pi pi-play" iconPos="right" label="Read More"
                                                class="p-button-raised p-button-success" />
                                    </Link>
                                </div>
                            </div>
                        </template>

                        <template #grid="slotProps">
                            <div class="col-12 md:col-4">
                                <div class="product-grid-item card">
                                    <div class="product-grid-item-top">
                                        <Badge v-if="slotProps.data.is_featured" value="Featured"
                                               severity="danger"></Badge>
                                        <div class="float-end">
                                            <i class="pi pi-tag product-category-icon"></i>
                                            <span
                                                class="product-category">{{ slotProps.data.category.title
                                                }}</span>
                                        </div>

                                    </div>
                                    <div class="product-grid-item-content">
                                        <Link :href="$route('blog.show', slotProps.data.slug)">
                                            <img class="d-block mx-auto"
                                                 src="https://www.primefaces.org/wp-content/uploads/2020/05/placeholder.png"
                                                 :alt="slotProps.data.title" />
                                        </Link>
                                        <div class="product-name">
                                            <Link :href="$route('blog.show', slotProps.data.slug)">
                                                <h6>{{ slotProps.data.title }}</h6>
                                            </Link>
                                        </div>
                                    </div>
                                    <div class="product-grid-item-bottom">
                                        <span class="product-price">${{ slotProps.data.views }}</span>
                                        <div>
                                            <span>Posted: {{ slotProps.data.created_at }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </DataView>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        <search-widget />
                        <categories-widget :cats="cats" />
                        <popular-widget :popular="popular" />
                        <gallery-widget />
                        <tags-widget :tags="tags" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Image from "primevue/image";
import Button from "primevue/button";
import BlogHeader from "@/Partials/BlogHeader";
import SearchWidget from "@/Shared/BlogWidgets/SearchWidget";
import CategoriesWidget from "@/Shared/BlogWidgets/CategoriesWidget";
import PopularWidget from "@/Shared/BlogWidgets/PopularWidget";
import GalleryWidget from "@/Shared/BlogWidgets/GalleryWidget";
import TagsWidget from "@/Shared/BlogWidgets/TagsWidget";
import DataView from "primevue/dataview";
import Dropdown from "primevue/dropdown";
import DataViewLayoutOptions from "primevue/dataviewlayoutoptions";
import Badge from "primevue/badge";
import Chip from "primevue/chip";

export default {
    name: "Index",
    data() {
        return {
            layout: "list",
            sortKey: null,
            sortOrder: null,
            sortField: null,
            sortOptions: [
                { label: "Newest", value: "!created_at" },
                { label: "Oldest", value: "created_at" },
                { label: "Featured", value: "!is_featured" }
            ]
        };
    },
    methods: {
        reset() {
            this.first = 0;
        },
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
        }
    },
    components: {
        TagsWidget,
        GalleryWidget,
        PopularWidget,
        CategoriesWidget,
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
        Chip
    },
    props: {
        blogs: Array,
        tags: Array,
        views: Array,
        cats: Array,
        popular: Array,
        media: Array
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
