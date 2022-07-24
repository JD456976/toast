<template>
    <Head>
        <title>Welcome</title>
        <meta name="description" content="Welcome">
    </Head>
    <Divider />
    <DealBreadCrumbs />
    <Divider />
    <div class="grid">
        <div class="col-lg-4-5">
            <section class="product-tabs section-padding position-relative">
                <Card>
                    <template #content>
                        <DataView :value="filteredDeals" :layout="layout" :paginator="true"
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
                                    <Accordion class="accordion-custom mt-1">
                                        <AccordionTab>
                                            <template #header>
                                                <i class="pi pi-filter mr-2"></i>
                                                <span>Advanced Filters</span>
                                            </template>
                                            <div>
                                                <Dropdown v-model="selectedStore"
                                                          :options="stores" optionLabel="name"
                                                          :filter="true" placeholder="Select a Store"
                                                          :showClear="true">
                                                    <template #value="slotProps">
                                                        <div class="country-item country-item-value"
                                                             v-if="slotProps.value">
                                                            <div>{{ slotProps.value.name }}</div>
                                                        </div>
                                                        <span v-else>
                                                    {{ slotProps.placeholder }}
                                                </span>
                                                    </template>
                                                    <template #option="slotProps">
                                                        <div class="country-item">
                                                            <div>{{ slotProps.option.name }}</div>
                                                        </div>
                                                    </template>
                                                </Dropdown>
                                                <Dropdown v-model="selectedBrand" class="ml-4"
                                                          :options="brands" optionLabel="name"
                                                          :filter="true" placeholder="Select a Brand"
                                                          :showClear="true">
                                                    <template #value="slotProps">
                                                        <div class="country-item country-item-value"
                                                             v-if="slotProps.value">
                                                            <div>{{ slotProps.value.name }}</div>
                                                        </div>
                                                        <span v-else>
                                                    {{ slotProps.placeholder }}
                                                </span>
                                                    </template>
                                                    <template #option="slotProps">
                                                        <div class="country-item">
                                                            <div>{{ slotProps.option.name }}</div>
                                                        </div>
                                                    </template>
                                                </Dropdown>
                                                <Dropdown v-model="selectedProduct" class="ml-4"
                                                          :options="products" optionLabel="name"
                                                          :filter="true" placeholder="Select a Product"
                                                          :showClear="true">
                                                    <template #value="slotProps">
                                                        <div class="country-item country-item-value"
                                                             v-if="slotProps.value">
                                                            <div>{{ slotProps.value.name }}</div>
                                                        </div>
                                                        <span v-else>
                                                    {{ slotProps.placeholder }}
                                                </span>
                                                    </template>
                                                    <template #option="slotProps">
                                                        <div class="country-item">
                                                            <div>{{ slotProps.option.name }}</div>
                                                        </div>
                                                    </template>
                                                </Dropdown>

                                                <Link :href="$route('deal.clear.new')">
                                                    <Button label="Clear New Tags"
                                                            class="p-button-raised p-button-success" />
                                                </Link>

                                            </div>
                                        </AccordionTab>
                                    </Accordion>
                                </div>
                            </template>

                            <template #empty>
                                <div class="text-center text-2xl p-5">
                                    No records found.
                                </div>
                            </template>

                            <template #list="slotProps">
                                <div class="col-12">
                                    <div
                                        v-bind:class='{"border-dashed border-2 border-orange-600": slotProps.data.reported && admin}'
                                        class="p-3 border-bottom-1 surface-border flex align-items-start sm:align-items-center mb-20">
                                        <Link :href="$route('deal.show', slotProps.data.slug)">
                                            <img class="w-3rem sm:w-8rem flex-shrink-0 mr-3 shadow-2"
                                                 :src="slotProps.data.media"
                                                 :alt="slotProps.data.title" />
                                        </Link>
                                        <div class="flex flex-column">
                                            <Link :href="$route('deal.show', slotProps.data.slug)">
                                                <span
                                                    class="text-900 font-medium text-xl mb-2">{{ slotProps.data.title }}
                                                </span>
                                            </Link>
                                            <span
                                                class="text-600 font-medium mb-3">{{ slotProps.data.store.name }}
                                            </span>
                                            <span
                                                class="text-500 font-medium">Posted: {{ slotProps.data.created_at }}
                                            </span>
                                            <span>
                                                 <Rating v-model="slotProps.data.initial"
                                                         :readonly="true"
                                                         :cancel="false">
                                                 </Rating>
                                            </span>
                                        </div>
                                        <div class="flex flex-column ml-auto">
                                             <span
                                                 class="text-900 font-medium text-2xl ml-auto">${{ slotProps.data.discount
                                                 }}
                                             </span>
                                            <span
                                                class="text-900 font-medium text-sm line-through ml-3">${{ slotProps.data.price
                                                }}
                                            </span>
                                            <div>
                                                <Badge class="mt-3"
                                                       v-if="slotProps.data.is_featured"
                                                       value="Featured"
                                                       severity="danger">Featured
                                                </Badge>
                                                <div class="text-center">
                                                    <Link style="pointer-events: none"
                                                          v-if="slotProps.data.watchlist.length !== 0"
                                                          v-tooltip="'Already watching this'"
                                                          :href="$route('watchlist.store',slotProps.data.product.id)"
                                                          method="post"
                                                    >
                                                        <Button disabled
                                                                icon="pi pi-heart" style="color:red"
                                                                class="p-button-text p-button-secondary">

                                                        </Button>
                                                    </Link>
                                                    <Link v-else
                                                          :href="$route('watchlist.store',slotProps.data.product.id)"
                                                          method="post"
                                                    >
                                                        <Button
                                                            icon="pi pi-heart"
                                                            class="p-button-text p-button-secondary">

                                                        </Button>
                                                    </Link>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <template #grid="slotProps">
                                <div
                                    v-bind:class='{"border-dashed border-2 border-orange-600": slotProps.data.reported && admin}'
                                    class="col-12 md:col-6 xl:col-3 p-3">
                                    <div v-if="slotProps.data.views >= settings.hot_views" class="relative">
                                        <Badge value="HOT" severity="warning" class="absolute"
                                               style="top: 1.5rem; left: 1rem;">

                                        </Badge>
                                    </div>
                                    <div class="relative">
                                        <Link style="pointer-events: none"
                                              v-if="slotProps.data.watchlist.length !== 0"
                                              v-tooltip="'Already watching this'"
                                              :href="$route('watchlist.store',slotProps.data.product.id)"
                                              method="post"
                                        >
                                            <button type="text" v-ripple
                                                    class="p-link w-3rem h-3rem surface-0 hover:surface-200 border-circle shadow-2 inline-flex align-items-center justify-content-center absolute transition-colors transition-duration-300 p-ripple"
                                                    style="top: 1rem; right: 1rem;">
                                                <i class="pi pi-heart text-2xl text-red-600"></i>
                                            </button>
                                        </Link>
                                        <Link v-else
                                              :href="$route('watchlist.store',slotProps.data.product.id)"
                                              method="post"
                                        >
                                            <button type="text" v-ripple
                                                    class="p-link w-3rem h-3rem surface-0 hover:surface-200 border-circle shadow-2 inline-flex align-items-center justify-content-center absolute transition-colors transition-duration-300 p-ripple"
                                                    style="top: 1rem; right: 1rem">
                                                <i class="pi pi-heart text-2xl text-500"></i>
                                            </button>
                                        </Link>
                                    </div>
                                    <div class="surface-card shadow-2 border-rounded p-4">
                                        <div class="d-flex justify-content-center mb-2">
                                            <Badge class="mr-1"
                                                   v-if="!viewed.includes(slotProps.data.id)"
                                                   value="NEW!"
                                                   severity="success">
                                            </Badge>
                                            <Badge v-if="slotProps.data.is_featured"
                                                   value="Featured"
                                                   severity="danger">
                                            </Badge>
                                        </div>
                                        <div
                                            class="flex flex-column align-items-center border-bottom-1 surface-border pb-3">
                                            <Link :href="$route('deal.show', slotProps.data.slug)">
                                                <img class="mb-3"
                                                     :src="slotProps.data.media"
                                                     :alt="slotProps.data.title" />
                                            </Link>
                                            <Link :href="$route('deal.show', slotProps.data.slug)">
                                                <span
                                                    class="text-900 font-medium mb-2">{{ slotProps.data.title }}
                                                </span>
                                            </Link>
                                            <span
                                                class="text-600 font-medium mb-3">{{ slotProps.data.store.name }}
                                            </span>
                                            <div class="d-flex justify-content-center mb-2">
                                                <span
                                                    class="text-2xl text-800 block font-semibold mr-3">${{ slotProps.data.discount
                                                    }}
                                                </span>
                                                <span
                                                    class="text-sm text-600 block line-through">${{ slotProps.data.price
                                                    }}
                                                </span>
                                            </div>
                                            <Rating v-model="slotProps.data.initial"
                                                    :readonly="true"
                                                    :cancel="false">
                                            </Rating>
                                        </div>
                                        <div
                                            class="flex flex-column pt-3 align-items-center">
                                                <span class="text-xs">
                                                    Posted: {{ slotProps.data.created_at
                                                    }} |  Views: {{ slotProps.data.views }}
                                                </span>
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

            <PopularDealsWidget :top="top" />
        </div>
    </div>
</template>


<script>

import { Head, Link } from "@inertiajs/inertia-vue3";
import Rating from "primevue/rating";
import DataView from "primevue/dataview";
import Dropdown from "primevue/dropdown";
import DataViewLayoutOptions from "primevue/dataviewlayoutoptions";
import Button from "primevue/button";
import Badge from "primevue/badge";
import Card from "primevue/card";
import Divider from "primevue/divider";
import Tooltip from "primevue/tooltip";
import DealBreadCrumbs from "@/Pages/Deals/DealsBreadCrumbs.vue";
import PopularDealsWidget from "@/Shared/HomeWidgets/PopularDealsWidget.vue";
import Ripple from "primevue/ripple";
import Accordion from "primevue/accordion";
import AccordionTab from "primevue/accordiontab";


export default {
    name: "Index",
    data() {
        return {
            filteredDeals: null,
            selectedStore: null,
            selectedProduct: null,
            selectedBrand: null,
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
        "tooltip": Tooltip,
        "ripple": Ripple
    },
    components: {
        DealBreadCrumbs,
        Link,
        Head,
        Rating,
        DataView,
        Dropdown,
        DataViewLayoutOptions,
        Button,
        Badge,
        Card,
        Divider,
        PopularDealsWidget,
        Accordion,
        AccordionTab
    },
    props: {
        deals: Array,
        media: Array,
        top: Array,
        topCats: Array,
        stores: Array,
        brands: Array,
        products: Array,
        user: Object,
        admin: Object,
        settings: Object,
        viewed: Array
    },
    computed: {
        filteredDeals() {
            if (this.selectedStore) {
                let tempDeals = this.deals;

                tempDeals = tempDeals.filter((item) => {
                    return item.store.id === this.selectedStore.id;
                });
                return tempDeals;
            } else if (this.selectedProduct) {
                let tempDeals = this.deals;

                tempDeals = tempDeals.filter((item) => {
                    return item.product.id === this.selectedProduct.id;
                });
                return tempDeals;
            } else if (this.selectedBrand) {
                let tempDeals = this.deals;

                tempDeals = tempDeals.filter((item) => {
                    return item.brand.id === this.selectedBrand.id;
                });
                return tempDeals;
            }
            return this.deals;
        }
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
        onStoreChange(event) {
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
i.pi-heart {
    color: red;
}

.disabled-link {
    pointer-events: none;
}

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
