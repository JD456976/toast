<template>
    <Head>
        <title>Welcome</title>
        <meta name="description" content="Welcome">
    </Head>
    <div class="page-content pt-20 pb-150">
        <div class="container">
            <main class="main">
                <div class="container mb-30">
                    <div class="row">
                        <flash-messages />
                        <div class="col-lg-4-5">
                            <section class="product-tabs section-padding position-relative">
                                <div class="section-title style-2">
                                    <Breadcrumb :home="home" :model="items" />
                                </div>
                                <Divider />
                                <Card>
                                    <template #content>
                                        <DataView :value="deals" :layout="layout" :paginator="true"
                                                  paginatorPosition="both"
                                                  :rows="rows"
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
                                                    <div class="product-list-item">
                                                        <Link :href="$route('deal.show', slotProps.data.slug)">
                                                            <img class="align-self-center"
                                                                 :src="slotProps.data.media"
                                                                 :alt="slotProps.data.title" />
                                                        </Link>
                                                        <div class="product-list-detail">
                                                            <div class="product-name">
                                                                <Link :href="$route('deal.show', slotProps.data.slug)">
                                                                    <h6>{{ slotProps.data.title }}</h6>
                                                                </Link>
                                                            </div>
                                                            <Rating v-model="slotProps.data.initial" :readonly="true"
                                                                    :cancel="false"></Rating>
                                                            <i class="pi pi-tag product-category-icon"></i><span
                                                            class="product-category">{{ slotProps.data.store.name
                                                            }}</span>
                                                        </div>
                                                        <div class="product-list-action">
                                                                <span class="product-price">${{ slotProps.data.price
                                                                    }}</span>
                                                            <Badge v-if="slotProps.data.is_featured" value="Featured"
                                                                   severity="danger"><i
                                                                class="pi pi-star"></i>Featured<i
                                                                class="pi pi-star"></i>
                                                            </Badge>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>

                                            <template #grid="slotProps">
                                                <div class="col-12 md:col-4">
                                                    <div class="product-grid-item card">
                                                        <div class="product-grid-item-top">
                                                            <Badge v-if="slotProps.data.is_featured" value="Featured"
                                                                   severity="danger"><i
                                                                class="pi pi-star pi-spin"></i><span
                                                                class="mx-1">Featured</span><i
                                                                class="pi pi-star pi-spin"></i></Badge>
                                                            <div class="float-end">
                                                                <i class="pi pi-tag product-category-icon"></i>
                                                                <span
                                                                    class="product-category">{{ slotProps.data.store.name
                                                                    }}</span>
                                                            </div>

                                                        </div>
                                                        <div class="product-grid-item-content">
                                                            <Link :href="$route('deal.show', slotProps.data.slug)">
                                                                <img class="d-block mx-auto"
                                                                     :src="slotProps.data.media"
                                                                     :alt="slotProps.data.title" />
                                                            </Link>
                                                            <div class="product-name">
                                                                <Link :href="$route('deal.show', slotProps.data.slug)">
                                                                    <h6>{{ slotProps.data.title }}</h6>
                                                                </Link>
                                                            </div>
                                                            <div class="mx-auto" style="width: 125px;">
                                                                <Rating v-model="slotProps.data.initial"
                                                                        :readonly="true"
                                                                        :cancel="false">

                                                                </Rating>
                                                            </div>
                                                        </div>
                                                        <div class="product-grid-item-bottom">
                                                            <span class="product-price">${{ slotProps.data.price
                                                                }}</span>
                                                            <span><del>${{ slotProps.data.discount }}</del></span>
                                                            <div>
                                                            <span>
                                                                <h6>Posted: {{ slotProps.data.created_at }}</h6>
                                                            </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </DataView>
                                    </template>
                                </Card>
                            </section>
                        </div>
                        <div class="col-lg-1-5 primary-sidebar sticky-sidebar pt-30">
                            <categories />

                            <new />
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Breadcrumb from "primevue/breadcrumb";
import SiteHeader from "@/Partials/SiteHeader";
import SiteFooter from "@/Partials/SiteFooter";
import Categories from "@/Shared/HomeWidgets/Categories";
import Filter from "@/Shared/HomeWidgets/Filter";
import New from "@/Shared/HomeWidgets/New";
import Rating from "primevue/rating";
import DataView from "primevue/dataview";
import Dropdown from "primevue/dropdown";
import DataViewLayoutOptions from "primevue/dataviewlayoutoptions";
import Button from "primevue/button";
import Badge from "primevue/badge";
import Card from "primevue/card";
import Panel from "primevue/panel";
import Divider from "primevue/divider";
import Carousel from "primevue/carousel";
import Paginator from "primevue/paginator";
import FlashMessages from "@/Shared/FlashMessages";

export default {
    name: "Index",
    data() {
        return {
            home: {
                label: "Home",
                icon: "pi pi-home",
                url: "/"
            },
            items: [
                {
                    label: "Deals",
                    url: route("deal.index")
                }
            ],
            layout: "grid",
            rows: 10,
            sortKey: null,
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
    components: {
        New,
        Filter,
        Categories,
        SiteFooter,
        SiteHeader,
        Link,
        Head,
        Breadcrumb,
        Rating,
        DataView,
        Dropdown,
        DataViewLayoutOptions,
        Button,
        Badge,
        Card,
        Panel,
        Divider,
        FlashMessages
    },
    props: {
        featured: Array,
        deals: Array,
        headerMenu: Array,
        footerMenu: Array,
        auth: Object,
        admin: Boolean,
        loggedin: Boolean,
        unseen: Number,
        points: Number,
        watchlistCount: Number,
        initial: Number,
        media: Array,
        brands: Array
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
