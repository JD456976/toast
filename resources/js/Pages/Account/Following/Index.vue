<template>
    <Head>
        <title>Your Follow Lists</title>
        <meta name="description" content="Your Follow Lists">
    </Head>
    <ConfirmPopup></ConfirmPopup>
    <div class="p-4">
        <div class="surface-border border-round surface-card" style="min-height: 20rem">
            <Toast position="bottom-right" group="br" />
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
                                                <Column field="is_active" header="Status" :sortable="true">
                                                    <template #body="slotProps">
                                                        <Link v-if="slotProps.data.is_active"
                                                              method="post"
                                                              :href="$route('follow.deactivate',slotProps.data.id)">
                                                            <Button
                                                                label="Deactivate"
                                                                class="p-button-danger p-button-raised p-button-sm"
                                                                icon="pi pi-times"
                                                                iconPos="right"
                                                            />
                                                        </Link>
                                                        <Link v-else method="post"
                                                              :href="$route('follow.activate',slotProps.data.id)">
                                                            <Button
                                                                label="Activate"
                                                                class="p-button-success p-button-raised p-button-sm"
                                                                icon="pi pi-check"
                                                                iconPos="right"
                                                            />
                                                        </Link>
                                                    </template>
                                                </Column>
                                                <Column header="Delete">
                                                    <template #body="slotProps">
                                                        <Button
                                                            @click="deleteFollower($event,slotProps.data.id)"
                                                            label="Delete"
                                                            v-tooltip.top="'Delete Follow'"
                                                            class="p-button-danger p-button-raised p-button-sm"
                                                            icon="pi pi-trash"
                                                            iconPos="right"
                                                        />
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

<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import DashMenu from "@/Shared/DashMenu";
import Button from "primevue/button";
import TabPanel from "primevue/tabpanel";
import TabView from "primevue/tabview";
import Column from "primevue/column";
import DataTable from "primevue/datatable";
import Card from "primevue/card";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";
import { Inertia } from "@inertiajs/inertia";
import Toast from "primevue/toast";
import ConfirmPopup from "primevue/confirmpopup";

const props = defineProps({
    followers: Array,
    following: Array,
    auth: Object,
    user: Object
});

const confirm = useConfirm();
const toast = useToast();

const deleteFollower = (event, id) => {
    confirm.require({
        target: event.currentTarget,
        message: "Do you want to remove this user?",
        icon: "pi pi-info-circle",
        acceptClass: "p-button-danger",
        accept: () => {
            Inertia.delete(route("follow.delete", id));
        },
        reject: () => {
            toast.add({
                severity: "info",
                summary: "Canceled",
                detail: "Nothing was deleted",
                group: "br",
                life: 3000
            });
        }
    });
};
</script>

<script>


import Tooltip from "primevue/tooltip";

export default {
    name: "FollowingIndex",
    directives: {
        "tooltip": Tooltip
    }
};
</script>
