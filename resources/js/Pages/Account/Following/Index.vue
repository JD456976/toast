<template>
    <Head>
        <title>Your Follow Lists</title>
        <meta name="description" content="Your Follow Lists">
    </Head>
    <div class="page-content pt-50 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <dash-menu />
                        <div class="col-md-9">
                            <flash-messages />
                            <h3 class="heading-2 mb-10">Your Follow Lists</h3>
                            <div class="card">
                                <TabView ref="tabview1">
                                    <TabPanel header="Following">
                                        <DataTable :value="following"
                                                   responsiveLayout="scroll"
                                                   :paginator="true" :rows="10">
                                            <Column field="follow.name" header="Name"
                                                    :sortable="true">
                                                <template #body="slotProps">
                                                    <Link class="nav-link"
                                                          :href="$route('user.show',slotProps.data.follow.slug)">
                                                        {{ slotProps.data.follow.name }}
                                                    </Link>
                                                </template>
                                            </Column>
                                            <Column field="created_at" header="Added On" :sortable="true"></Column>
                                        </DataTable>
                                    </TabPanel>
                                    <TabPanel header="Following You">
                                        <DataTable :value="followers"
                                                   responsiveLayout="scroll"
                                                   :paginator="true" :rows="10">
                                            <Column field="user.name" header="Name"
                                                    :sortable="true">
                                                <template #body="slotProps">
                                                    <Link class="nav-link"
                                                          :href="$route('user.show',slotProps.data.user.slug)">
                                                        {{ slotProps.data.user.name }}
                                                    </Link>
                                                </template>
                                            </Column>
                                            <Column field="created_at" header="Added On" :sortable="true"></Column>
                                        </DataTable>
                                    </TabPanel>
                                </TabView>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import { Head } from "@inertiajs/inertia-vue3";
import DashMenu from "@/Shared/DashMenu";
import FlashMessages from "@/Shared/FlashMessages";
import TabPanel from "primevue/tabpanel";
import TabView from "primevue/tabview";
import Column from "primevue/column";
import DataTable from "primevue/datatable";
import dayjs from "dayjs";


export default {
    name: "Index",
    components: {
        Head,
        DashMenu,
        FlashMessages,
        TabView,
        TabPanel,
        DataTable,
        Column
    },
    props: {
        followers: Array,
        following: Array,
        user: Object
    },
    methods: {
        formatDate(dateString) {
            const date = dayjs(dateString);
            // Then specify how you want your dates to be formatted
            return date.format("dddd MMMM D, YYYY");
        }
    }
};
</script>
