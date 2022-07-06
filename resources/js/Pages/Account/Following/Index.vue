<template>
    <Head>
        <title>Your Follow Lists</title>
        <meta name="description" content="Your Follow Lists">
    </Head>
    <div class="p-4">
        <div class="surface-border border-round surface-card" style="min-height: 20rem">
            <div class="grid">
                <dash-menu class="col-3" :auth="auth" />
                <div class="col-4 px-5 flex flex-column flex-auto">
                    <div>
                        <Card style="margin-bottom: 2em">
                            <template #title>
                                Your Follow Lists
                            </template>
                            <template #content>
                                <div class="col-12">
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
                            </template>
                        </Card>
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
import Card from "primevue/card";


export default {
    name: "Index",
    components: {
        Head,
        DashMenu,
        FlashMessages,
        TabView,
        TabPanel,
        DataTable,
        Column,
        Card
    },
    props: {
        followers: Array,
        following: Array,
        auth: Object,
        user: Object

    }
};
</script>
