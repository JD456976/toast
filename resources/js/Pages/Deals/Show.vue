<template>
    <Head>
        <title>Viewing Deal: {{ deal.title }}</title>
        <meta name="description" content="Viewing Deal" />
    </Head>
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <DealToolBar :admin="admin" :deal="deal" :loggedin="loggedin" />
                <div class="product-detail accordion-detail mt-30">
                <Divider />
                    <ul class="list-none p-0 m-0 flex font-medium overflow-y-hidden overflow-x-auto border-round shadow-2">
                        <li class="relative p-3 bg-green-500">
                            <Link class="cursor-pointer"
                                  :href="$route('deal.index')">
                                <i class="pi pi-home text-white"></i>
                            </Link>
                        </li>
                        <li class="relative p-3 bg-green-500">
                            <div class="absolute left-0 top-0 z-1" style="border-left: 20px solid var(--green-500); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
                            <Link class="cursor-pointer text-white pl-4 white-space-nowrap"
                                  :href="$route('deal.index')">
                                Deals
                            </Link>
                            <div class="absolute top-0" style="left: 1px; border-left: 20px solid var(--green-100); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
                        </li>
                        <li class="relative p-3 bg-green-700">
                            <div class="absolute left-0 top-0 z-1" style="border-left: 20px solid var(--green-500); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
                            <Link class="cursor-pointer text-green-100 font-bold pl-4 white-space-nowrap"
                                  :href="$route('deal.show', deal.slug)">
                                {{ deal.title }}
                            </Link>
                            <div class="absolute top-0" style="left: 1px; border-left: 20px solid var(--green-100); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
                        </li>
                    </ul>
                    <Divider />
                    <div class="row mb-50 mt-30">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">

                            <h5 v-if="media.length <=0">No Images Currently</h5>
                            <div v-else class="detail-gallery shadow-lg">
                                <Galleria :showIndicators="true" :value="media"
                                          :numVisible="5"
                                          containerStyle="max-width: 640px">
                                    <template #item="slotProps">
                                        <img :src="slotProps.item.original_url" :alt="slotProps.item.alt"
                                             style="width: 100%" />
                                    </template>
                                    <template #thumbnail="slotProps">
                                        <img :src="slotProps.item.original_url" :alt="slotProps.item.alt" />
                                    </template>
                                </Galleria>
                                <span class="zoom-icon"><i class="pi pi-search"></i></span>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <flash-messages />
                            <div class="detail-info pr-30 pl-30">
                                <span class="stock-status">
                                    <Badge v-if="deal.is_featured"
                                           value="Featured"
                                           severity="danger"><i
                                        class="pi pi-star pi-spin"></i><span class="mx-1">Featured</span><i
                                        class="pi pi-star pi-spin"></i>
                                    </Badge>
                                </span>
                                <div class="row justify-content-end">
                                    <h2 class="title-detail">{{ deal.title }}</h2>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <span class="current-price text-brand">${{ deal.discount }}</span>
                                            <span>
                                                    <span class="save-price font-md color3 ml-15">26% Off</span>
                                                    <span
                                                        class="old-price font-md ml-15">${{ deal.price }}</span>
                                                </span>
                                        </div>
                                    </div>
                                    <div class="short-desc mb-30">
                                        <p class="font-lg">{{ deal.description }}</p>
                                    </div>
                                    <div>
                                        <div class="row flex mb-30">
                                            <h5 class=" mb-2">Rate this Deal:</h5>
                                            <rate-deal :deal="deal" :initial="initial" />
                                        </div>
                                    </div>
                                    <div class="grid grid-nogutter border-top-1 surface-border pt-2">
                                        <div class="col-12 md:col-6 p-3">
                                            <div class="text-500 font-medium mb-2">Posted By</div>
                                            <div class="text-900">
                                                <Link
                                                      :href="$route('user.show', deal.user.slug)">
                                                    {{ deal.user.name }}
                                                </Link>
                                            </div>
                                        </div>
                                        <div class="col-12 md:col-6 p-3">
                                            <div class="text-500 font-medium mb-2">Posted On</div>
                                            <div class="text-900">{{ deal.created_at }}</div>
                                        </div>
                                        <div class="col-12 md:col-6 p-3">
                                            <div class="text-500 font-medium mb-2">Brand</div>
                                            <div class="text-900">{{ deal.brand.name }}</div>
                                        </div>
                                        <div class="col-12 md:col-6 p-3">
                                            <div class="text-500 font-medium mb-2">Viewed</div>
                                            <div class="text-900">{{ views }} times</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="product-info">
                            <Panel header="Deal Info & Comments">
                                <TabView>
                                    <TabPanel header="Comments">
                                        <div class="comments-area">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="comment-list">
                                                        <h5 v-if="comments.length <= 0">No Comments To Display</h5>
                                                        <Card>
                                                            <template #content>
                                                                <DataView :layout="layout" :value="comments" :paginator="true" :rows="rows"
                                                                          :sortOrder="sortOrder" :sortField="sortField">
                                                                    <template #header>
                                                                        <div class="grid grid-nogutter">
                                                                            <div class="col-6" style="text-align: left">
                                                                                <Dropdown v-model="sortKey"
                                                                                          :options="sortOptions"
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
                                                                        </div>
                                                                    </template>

                                                                    <template #list="slotProps">
                                                                        <div class="col-12">
                                                                            <div class="p-2">
                                                                                <div
                                                                                    class="border-1 surface-border border-round p-3">
                                                                                    <div
                                                                                        class="flex align-items-center mb-3">
                                                                                        <Avatar class="mr-2"
                                                                                                image="https://i.pravatar.cc/300"
                                                                                                shape="circle"></Avatar>
                                                                                        <Link
                                                                                            :href="$route('user.show', slotProps.data.user.slug)">
                                                                                                    <span
                                                                                                        class="text-900 font-medium mr-3"> {{ slotProps.data.user.name
                                                                                                        }}</span>
                                                                                        </Link>
                                                                                        <span
                                                                                            class="text-sm font-medium text-500">
                                                                                                    {{ slotProps.data.created_at
                                                                                            }}
                                                                                                </span>
                                                                                        <span class="ml-auto">
                                                                                                  <ReportDealCommentForm
                                                                                                      :deal="deal"
                                                                                                      :comment="slotProps.data"
                                                                                                  />
                                                                                                </span>
                                                                                    </div>
                                                                                    <p class="m-0 p-0 line-height-3 text-600">
                                                                                        {{ slotProps.data.comment
                                                                                        }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </template>
                                                                </DataView>
                                                            </template>
                                                        </Card>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <deal-comment-form :deal="deal" />
                                    </TabPanel>
                                    <TabPanel header="Description">
                                        <div class="">
                                            <p>Uninhibited carnally hired played in whimpered dear gorilla koala
                                                depending and much yikes off far quetzal goodness and from for grimaced
                                                goodness unaccountably and meadowlark near unblushingly crucial scallop
                                                tightly neurotic hungrily some and dear furiously this apart.</p>
                                            <p>Spluttered narrowly yikes left moth in yikes bowed this that grizzly much
                                                hello on spoon-fed that alas rethought much decently richly and wow
                                                against the frequent fluidly at formidable acceptably flapped besides
                                                and much circa far over the bucolically hey precarious goldfinch
                                                mastodon goodness gnashed a jellyfish and one however because.</p>
                                            <ul class="product-more-infor mt-30">
                                                <li><span>Type Of Packing</span> Bottle</li>
                                                <li><span>Color</span> Green, Pink, Powder Blue, Purple</li>
                                                <li><span>Quantity Per Case</span> 100ml</li>
                                                <li><span>Ethyl Alcohol</span> 70%</li>
                                                <li><span>Piece In One</span> Carton</li>
                                            </ul>
                                            <hr class="wp-block-separator is-style-dots" />
                                            <p>Laconic overheard dear woodchuck wow this outrageously taut beaver hey
                                                hello far meadowlark imitatively egregiously hugged that yikes minimally
                                                unanimous pouted flirtatiously as beaver beheld above forward energetic
                                                across this jeepers beneficently cockily less a the raucously that magic
                                                upheld far so the this where crud then below after jeez enchanting
                                                drunkenly more much wow callously irrespective limpet.</p>
                                            <h4 class="mt-30">Packaging & Delivery</h4>
                                            <hr class="wp-block-separator is-style-wide" />
                                            <p>Less lion goodness that euphemistically robin expeditiously bluebird
                                                smugly scratched far while thus cackled sheepishly rigid after due one
                                                assenting regarding censorious while occasional or this more crane went
                                                more as this less much amid overhung anathematic because much held one
                                                exuberantly sheep goodness so where rat wry well concomitantly.</p>
                                            <p>Scallop or far crud plain remarkably far by thus far iguana lewd
                                                precociously and and less rattlesnake contrary caustic wow this near
                                                alas and next and pled the yikes articulate about as less cackled
                                                dalmatian in much less well jeering for the thanks blindly sentimental
                                                whimpered less across objectively fanciful grimaced wildly some wow and
                                                rose jeepers outgrew lugubrious luridly irrationally attractively
                                                dachshund.</p>
                                            <h4 class="mt-30">Suggested Use</h4>
                                            <ul class="product-more-infor mt-30">
                                                <li>Refrigeration not necessary.</li>
                                                <li>Stir before serving</li>
                                            </ul>
                                            <h4 class="mt-30">Other Ingredients</h4>
                                            <ul class="product-more-infor mt-30">
                                                <li>Organic raw pecans, organic raw cashews.</li>
                                                <li>This butter was produced using a LTG (Low Temperature Grinding)
                                                    process
                                                </li>
                                                <li>Made in machinery that processes tree nuts but does not process
                                                    peanuts, gluten, dairy or soy
                                                </li>
                                            </ul>
                                            <h4 class="mt-30">Warnings</h4>
                                            <ul class="product-more-infor mt-30">
                                                <li>Oil separation occurs naturally. May contain pieces of shell.</li>
                                            </ul>
                                        </div>
                                    </TabPanel>
                                    <TabPanel header="Audits">
                                        <ul class="list-none p-0 m-0">
                                            <li v-for="item in audits" :key="id" class="flex flex-column md:flex-row md:align-items-center md:justify-content-between mb-4">
                                                <div class="mr-8 md:mr-8">
                                                    <span class="inline-block text-900 font-medium mr-2 mb-1 md:mb-0">{{ item.user.name }}</span>
                                                    <span class="text-600 mr-2">Changed</span>
                                                    <span class="inline-block text-900 font-medium mr-2 mb-1 md:mb-0">{{ item.key }}</span>
                                                    <span class="text-600 mr-2">from</span>
                                                    <span class="inline-block text-900 font-medium mr-2 mb-1 md:mb-0"> {{ item.old_value }}</span>
                                                    <span class="text-600 mr-2">to</span>
                                                    <span class="inline-block text-900 font-medium mr-2 mb-1 md:mb-0"> {{ item.new_value }}</span>
                                                    <span class="text-600 mr-2">on </span>
                                                    <span class="inline-block text-900 font-medium mr-2 mb-1 md:mb-0"> {{ item.created_at }}</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </TabPanel>
                                    <TabPanel v-if="admin" header="Reports">
                                        <h5 class="mt-10 mb-20" v-if="reports.length <= 0">No
                                            Reports to Display</h5>
                                        <DataTable v-else showGridlines stripedRows :scrollable="true"
                                                   scrollDirection="both" :value="reports"
                                                   responsiveLayout="scroll">
                                            <Column field="id" header="ID"></Column>
                                            <Column field="user.name" header="Reported By"></Column>
                                            <Column field="reason" header="Reason"></Column>
                                            <Column field="comment" header="Comment"></Column>
                                            <Column field="created_at" header="Created On"></Column>
                                            <Column header="Resolve">
                                                <template #body="slotProps">
                                                    <Link class="nav-link"
                                                          method="patch"
                                                          :href="$route('admin.report.update',slotProps.data.id)">
                                                        <Button class="p-button-raised p-button-sm" label="Resolve"
                                                                icon="pi pi-check"
                                                                iconPos="right" />
                                                    </Link>

                                                </template>
                                            </Column>
                                        </DataTable>
                                    </TabPanel>
                                </TabView>
                            </Panel>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import DealCommentForm from "./DealCommentForm";
import FlashMessages from "../../Shared/FlashMessages";
import ReportDealForm from "./ReportDealForm";
import RateDeal from "./RateDeal";
import Sidebar from "primevue/sidebar";
import Button from "primevue/button";
import Tooltip from "primevue/tooltip";
import Panel from "primevue/panel";
import TabPanel from "primevue/tabpanel";
import TabView from "primevue/tabview";
import Badge from "primevue/badge";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Galleria from "primevue/galleria";
import Ripple from "primevue/ripple";
import Toolbar from "primevue/toolbar";
import Card from "primevue/card";
import Dropdown from "primevue/dropdown";
import DataView from 'primevue/dataview';
import Divider from "primevue/divider";
import ReportDealCommentForm from "@/Pages/Deals/ReportDealCommentForm";
import Avatar from "primevue/avatar";
import DealToolBar from "@/Pages/Deals/DealToolBar";

export default {
    data() {
        return {
            layout: "list",
            rows: 10,
            sortKey: null,
            sortOrder: null,
            sortField: null,
            sortOptions: [
                { label: "Newest", value: "!created_at" },
                { label: "Oldest", value: "created_at" },
            ],
            perPage: [
                { label: 10, value: 10 },
                { label: 20, value: 20 },
                { label: 30, value: 30 },
                { label: 40, value: 40 },
                { label: 50, value: 50 }
            ],
            visibleRight: false,
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
    directives: {
        "tooltip": Tooltip,
        "ripple": Ripple
    },
    name: "Show",
    props: {
        deal: Object,
        initial: Number,
        media: Object,
        audits: Array,
        reports: Array,
        comments: Array,
        views: String,
        loggedin: Boolean,
        admin: Boolean
    },
    components: {
        DealToolBar,
        Head,
        DealCommentForm,
        ReportDealCommentForm,
        FlashMessages,
        RateDeal,
        Button,
        Panel,
        TabView,
        TabPanel,
        Badge,
        DataTable,
        Column,
        Link,
        Galleria,
        Card,
        DataView,
        Dropdown,
        Divider,
        Avatar
    }
};

</script>

<style scoped>
ul.list-group li {
    margin-left: 10px;
}


.card {
    background: #ffffff;
    padding: 2rem;
    box-shadow: 0 2px 1px -1px rgba(0,0,0,.2), 0 1px 1px 0 rgba(0,0,0,.14), 0 1px 3px 0 rgba(0,0,0,.12);
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
