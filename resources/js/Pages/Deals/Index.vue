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
                                <Divider />
                                <div class="style-2">
                                    <ul class="list-none p-0 m-0 flex font-medium overflow-y-hidden overflow-x-auto border-round shadow-2">
                                        <li class="relative p-3 bg-green-500">
                                            <Link class="cursor-pointer"
                                                  :href="$route('deal.index')">
                                                <i class="pi pi-home text-white"></i>
                                            </Link>
                                        </li>
                                        <li class="relative p-3 bg-green-700">
                                            <div class="absolute left-0 top-0 z-1"
                                                 style="border-left: 20px solid var(--green-500); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
                                            <Link
                                                class="cursor-pointer text-green-100 font-bold pl-4 white-space-nowrap"
                                                :href="$route('deal.index')">
                                                Deals
                                            </Link>
                                            <div class="absolute top-0"
                                                 style="left: 1px; border-left: 20px solid var(--green-100); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
                                        </li>
                                    </ul>
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
                                                    <div
                                                        class="p-3 border-bottom-1 surface-border flex align-items-start sm:align-items-center">
                                                        <Link :href="$route('deal.show', slotProps.data.slug)">
                                                            <img class="w-3rem sm:w-8rem flex-shrink-0 mr-3 shadow-2"
                                                                 :src="slotProps.data.media"
                                                                 :alt="slotProps.data.title" />
                                                        </Link>
                                                        <div class="flex flex-column">
                                                            <Link :href="$route('deal.show', slotProps.data.slug)">
                                                                <span
                                                                    class="text-900 font-medium text-xl mb-2">{{ slotProps.data.title
                                                                    }}</span>
                                                            </Link>
                                                            <span
                                                                class="text-600 font-medium mb-3">{{ slotProps.data.store.name
                                                                }}</span>
                                                            <span
                                                                class="text-500 font-medium">Posted: {{ slotProps.data.created_at
                                                                }}</span>
                                                            <span>
                                                                 <Rating v-model="slotProps.data.initial"
                                                                         :readonly="true"
                                                                         :cancel="false"></Rating>
                                                            </span>
                                                        </div>
                                                        <div class="flex flex-column ml-auto">
                                                             <span
                                                                 class="text-900 font-medium text-2xl ml-auto">${{ slotProps.data.discount
                                                                 }}</span>
                                                            <span
                                                                class="text-900 font-medium text-sm line-through ml-3">${{ slotProps.data.price
                                                                }}</span>
                                                            <div>
                                                                <Badge class="mt-3"
                                                                       v-if="slotProps.data.is_featured"
                                                                       value="Featured"
                                                                       severity="danger">Featured
                                                                </Badge>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </template>

                                            <template #grid="slotProps">
                                                <div class="col-12 md:col-6 xl:col-3 p-3">
                                                    <div class="surface-card shadow-2 border-rounded p-4">
                                                        <div class="d-flex justify-content-center mb-2">
                                                            <Badge v-if="slotProps.data.is_featured" value="Featured"
                                                                   severity="danger"></Badge>
                                                        </div>
                                                        <div
                                                            class="flex flex-column align-items-center border-bottom-1 surface-border pb-3">
                                                            <Link :href="$route('deal.show', slotProps.data.slug)">
                                                                <img class="mb-3 w-9"
                                                                     :src="slotProps.data.media"
                                                                     :alt="slotProps.data.title" />
                                                            </Link>
                                                            <span
                                                                class="text-lg text-900 font-medium mb-2">{{ slotProps.data.title
                                                                }}</span>
                                                            <span
                                                                class="text-600 font-medium mb-3">{{ slotProps.data.store.name
                                                                }}</span>
                                                            <div class="d-flex justify-content-center mb-2">
                                                                <span
                                                                    class="text-2xl text-800 block font-semibold mr-3">${{ slotProps.data.discount
                                                                    }}</span>
                                                                <span
                                                                    class="text-sm text-600 block line-through">${{ slotProps.data.price
                                                                    }}</span>
                                                            </div>
                                                            <Rating v-model="slotProps.data.initial"
                                                                    :readonly="true"
                                                                    :cancel="false">

                                                            </Rating>
                                                        </div>
                                                        <div
                                                            class="flex pt-3 justify-content-between align-items-center">
                                                            <span class="text-sm">Posted: {{ slotProps.data.created_at
                                                                }}</span>
                                                            <Link v-if="slotProps.data.watchlist.length !== 0"
                                                                  v-tooltip="'Already watching this'"
                                                                  :href="$route('watchlist.store',slotProps.data.product.id)"
                                                                  method="post"
                                                            >
                                                                <Button disabled
                                                                        icon="pi pi-heart" style="color:red"
                                                                        class="p-button-text p-button-secondary"></Button>
                                                            </Link>
                                                            <Link v-else
                                                                  :href="$route('watchlist.store',slotProps.data.product.id)"
                                                                  method="post"
                                                            >
                                                                <Button
                                                                    icon="pi pi-heart"
                                                                    class="p-button-text p-button-secondary"></Button>
                                                            </Link>
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
import FlashMessages from "@/Shared/FlashMessages";
import Tooltip from "primevue/tooltip";
import Ripple from "primevue/ripple";
import StyleClass from "primevue/styleclass";

export default {
    name: "Index",
    data() {
        return {
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
    directives: {
        "tooltip": Tooltip
    },
    components: {
        New,
        Filter,
        Categories,
        SiteFooter,
        SiteHeader,
        Link,
        Head,
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
        deals: Array,
        media: Array
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
