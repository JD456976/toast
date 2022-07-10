<template>
    <Head>
        <title>Viewing Notification</title>
        <meta name="description" content="Viewing Notification">
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
                                {{ notification.title }}
                                <div class="class float-end">
                                    <Button
                                        @click="deleteNotification($event,notification.id)"
                                        v-if="!!notification.read_at"
                                        label="Delete"
                                        v-tooltip.top="'Delete Notification'"
                                        class="p-button-danger p-button-raised p-button-sm"
                                        icon="pi pi-trash"
                                        iconPos="right"
                                    />
                                </div>
                            </template>
                            <template #content>
                                <div>
                                    <p>
                                        {{ notification.content }}
                                    </p>
                                </div>
                                <div class="mt-20">
                                    <Link
                                        v-if="notification.type.includes('DealComment')"
                                        class=""
                                        :href="$route('deal.show', notification.slug)"
                                    >
                                        <Button icon="pi pi-money-bill" iconPos="left" label="View Deal"
                                                class="p-button-raised" />
                                    </Link>
                                    <Link
                                        v-else-if="notification.type.includes('BountyComment')"
                                        class=""
                                        :href="$route('bounty.show', notification.slug)"
                                    >
                                        <Button icon="pi pi-filter" iconPos="left" label="View Bounty"
                                                class="p-button-raised" />
                                    </Link>
                                    <Link
                                        v-else-if="notification.type.includes('BountyFilled')"
                                        class=""
                                        :href="$route('bounty.show', notification.slug)"
                                    >
                                        <Button icon="pi pi-filter" iconPos="left" label="View Bounty"
                                                class="p-button-raised" />
                                    </Link>
                                    <Link
                                        v-else-if="notification.type.includes('BountyVerified')"
                                        class=""
                                        :href="$route('bounty.show', notification.slug)"
                                    >
                                        <Button icon="pi pi-filter" iconPos="left" label="View Bounty"
                                                class="p-button-raised" />
                                    </Link>
                                </div>
                            </template>
                            <template #footer>
                                <span>Created: {{ notification.created_at }}</span>
                            </template>
                        </Card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import DashMenu from "@/Shared/DashMenu";
import Card from "primevue/card";
import Button from "primevue/button";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";
import ConfirmPopup from "primevue/confirmpopup";
import Toast from "primevue/toast";

const props = defineProps({
    notification: Object,
    auth: Object
});

const confirm = useConfirm();
const toast = useToast();

const deleteNotification = (event, id) => {
    confirm.require({
        target: event.currentTarget,
        message: "Do you want to delete this notification?",
        icon: "pi pi-info-circle",
        acceptClass: "p-button-danger",
        accept: () => {
            Inertia.delete(route("notification.delete", id));
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
    name: "NotificationShow",
    directives: {
        "tooltip": Tooltip
    }
};
</script>

<style scoped>

</style>
