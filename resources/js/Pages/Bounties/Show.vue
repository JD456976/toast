<template>
    <Head>
        <title>Viewing Bounty: {{ bounty.item_name }}</title>
        <meta name="description" content="Viewing Bounty" />
    </Head>
    <BountyToolBar :auth="auth" :admin="admin" :bounty="bounty" :loggedin="loggedin" />
    <BountyBreadCrumbs :bounty="bounty" />
    <Divider />
    <div class="surface-section px-4 py-8 md:px-6 lg:px-8">
        <div class="grid mb-7">
            <div class="col-12 lg:col-6">
                <div class="flex">
                    <div v-if="media.length <=0" class="flex align-items-center text-xl font-medium text-900 mb-4">No
                        Images Currently
                    </div>
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
                </div>
            </div>
            <div class="col-12 lg:col-6 py-3 lg:pl-6">
                <Badge class="mb-3" v-if="bounty.is_featured"
                       value="Featured"
                       severity="danger">
                    <span class="mx-1">Featured</span>
                </Badge>
                <div class="flex align-items-center text-xl font-medium text-900 mb-4">{{ bounty.item_name }}</div>
                <div class="flex align-items-center justify-content-between mb-5">
                    <span class="text-900 font-medium text-3xl block">Award: {{ bounty.award }}</span>
                    <div class="flex align-items-center">
                        <span v-tooltip.top="'Rate This Bounty'" class="mr-3">
                           <rate-bounty :bounty="bounty" :initial="initial" />
                        </span>
                    </div>
                </div>

                <div class="grid grid-nogutter border-top-1 surface-border pt-2">
                    <div class="col-12 md:col-6 p-3">
                        <div @mouseenter="openUserInfo"
                             class="text-500 font-medium mb-1 flex items-center">Posted By
                            <Avatar class="ml-2 lg:mr-0"
                                    style="width: 28px; height: 28px"
                                    :image="bounty.user.avatar"
                                    shape="circle">
                            </Avatar>
                            <Dialog @mouseleave="closeUserInfo" :header="bounty.user.name + '\'s Quick Stats'"
                                    v-model:visible="displayUserInfo"
                                    :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '40vw'}">
                                <div class="grid grid-cols-2 gap-4 mt-2">
                                    <div>Joined: {{ bounty.user.created_at }}</div>
                                    <div>99</div>
                                </div>
                                <div class="grid grid-cols-3 gap-4 mt-2">
                                    <div>Deals Posted: {{ bounty.user.deals.length }}</div>
                                    <div>Bounties Posted: {{ bounty.user.bounties.length }}</div>
                                    <div>Comments Posted: {{ bounty.user.comments.length }}</div>
                                </div>
                                <template #footer>
                                </template>
                            </Dialog>

                        </div>
                        <div class="text-900">
                            <Link
                                :href="$route('user.show', bounty.user.slug)">
                                {{ bounty.user.name }}
                            </Link>
                        </div>
                    </div>
                    <div class="col-12 md:col-6 p-3">
                        <div class="text-500 font-medium mb-2">Posted On</div>
                        <div class="text-900">{{ bounty.created_at }}</div>
                    </div>
                    <div class="col-12 md:col-6 p-3">
                        <div class="text-500 font-medium mb-2">Brand</div>
                        <div class="text-900">{{ bounty.brand.name }}</div>
                    </div>
                    <div class="col-12 md:col-6 p-3">
                        <div class="text-500 font-medium mb-2">Viewed</div>
                        <div class="text-900">{{ views }} times</div>
                    </div>
                </div>
            </div>
        </div>

        <TabView>
            <TabPanel header="Comments">
                <div class="">
                    <div class="">
                        <div class="col-lg-12">
                            <div class="">
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

                                            <template #empty>
                                                <div class="text-center text-2xl p-5">
                                                    No comments found :(
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
                                                                        :image="auth.user.avatar"
                                                                        shape="circle"></Avatar>
                                                                <Link
                                                                    :href="$route('user.show', slotProps.data.user.slug)">
                                                                        <span
                                                                            class="text-900 font-medium mr-3"> {{ slotProps.data.user.name
                                                                            }}
                                                                        </span>
                                                                </Link>
                                                                <span
                                                                    class="text-sm font-medium text-500">
                                                                    {{ slotProps.data.created_at }}
                                                                </span>
                                                                <span class="ml-auto">
                                                                  <ReportBountyCommentForm
                                                                      :bounty="bounty"
                                                                      :comment="slotProps.data"
                                                                  />
                                                                </span>
                                                            </div>
                                                            <p class="m-0 p-0 line-height-3 text-600">
                                                                {{ slotProps.data.comment }}
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
                <bounty-comment-form :bounty="bounty" />
            </TabPanel>
            <TabPanel header="Description">
                <div class="">
                    {{ bounty.description }}
                </div>
            </TabPanel>
            <TabPanel header="Audits">
                <div v-if="audits.length <= 0" class="flex align-items-center text-xl font-medium text-900 mb-4">No
                    Audits To Display
                </div>
                <ul class="list-none p-0 m-0">
                    <li v-for="item in audits" :key="id"
                        class="flex flex-column md:flex-row md:align-items-center md:justify-content-between mb-4">
                        <div class="mr-8 md:mr-8">
                            <span class="inline-block text-900 font-medium mr-2 mb-1 md:mb-0">{{ item.user.name
                                }}</span>
                            <span class="text-600 mr-2">Changed</span>
                            <span class="inline-block text-900 font-medium mr-2 mb-1 md:mb-0">{{ item.key }}</span>
                            <span class="text-600 mr-2">from</span>
                            <span class="inline-block text-900 font-medium mr-2 mb-1 md:mb-0"> {{ item.old_value
                                }}</span>
                            <span class="text-600 mr-2">to</span>
                            <span class="inline-block text-900 font-medium mr-2 mb-1 md:mb-0"> {{ item.new_value
                                }}</span>
                            <span class="text-600 mr-2">on </span>
                            <span class="inline-block text-900 font-medium mr-2 mb-1 md:mb-0"> {{ item.created_at
                                }}</span>
                        </div>
                    </li>
                </ul>
            </TabPanel>
            <TabPanel v-if="admin" header="Reports">
                <div v-if="reports.length <= 0" class="flex align-items-center text-xl font-medium text-900 mb-4">No
                    Reports To Display
                </div>
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
    </div>
</template>

<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import BountyCommentForm from "./BountyCommentForm";
import Button from "primevue/button";
import TabPanel from "primevue/tabpanel";
import TabView from "primevue/tabview";
import Badge from "primevue/badge";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Galleria from "primevue/galleria";
import RateBounty from "@/Pages/Bounties/RateBounty";
import Card from "primevue/card";
import DataView from "primevue/dataview";
import Dropdown from "primevue/dropdown";
import Avatar from "primevue/avatar";
import BountyToolBar from "@/Pages/Bounties/BountyToolBar";
import BountyBreadCrumbs from "@/Pages/Bounties/BountyBreadCrumbs";
import ReportBountyCommentForm from "@/Pages/Bounties/ReportBountyForm";
import Dialog from "primevue/dialog";
import { ref } from "vue";


const props = defineProps({
    bounty: Object,
    initial: Number,
    media: Object,
    audits: Array,
    reports: Array,
    comments: Array,
    views: String,
    loggedin: Boolean,
    admin: Boolean,
    auth: Object
});

const layout = ref("list");
const rows = ref(10);
const sortKey = ref();
const sortOrder = ref();
const sortField = ref();
const sortOptions = ref([
    { label: "Newest", value: "!created_at" },
    { label: "Oldest", value: "created_at" }
]);
const perPage = ref([
    { label: 10, value: 10 },
    { label: 20, value: 20 },
    { label: 30, value: 30 },
    { label: 40, value: 40 },
    { label: 50, value: 50 }
]);
const visibleRight = ref(false);

const openUserInfo = () => {
    displayUserInfo.value = true;
};

const closeUserInfo = () => {
    displayUserInfo.value = false;
};

let displayUserInfo = ref(false);

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
import Tooltip from "primevue/tooltip";
import Ripple from "primevue/ripple";

export default {
    directives: {
        "tooltip": Tooltip,
        "ripple": Ripple
    },
    name: "BountyShow"
};
</script>

<style scoped>
ul.list-group li {
    margin-left: 10px;
}
</style>
