<template>
    <Head>
        <title>Viewing Notification</title>
        <meta name="description" content="Viewing Notification">
    </Head>
    <div class="p-4">
        <div class="surface-border border-round surface-card" style="min-height: 20rem">
            <div class="grid">
                <dash-menu class="col-3" :auth="auth" />
                <div class="col-4 px-5 flex flex-column flex-auto">
                    <div>
                        <Card style="margin-bottom: 2em">
                            <template #title>
                                {{ notification.title }}
                                <div class="class float-end">
                                    <Link
                                        method="delete"
                                        :href="$route('notification.delete',notification.id)">
                                        <Button
                                            v-if="!!notification.read_at"
                                            label="Delete"
                                            v-tooltip.top="'Delete Notification'"
                                            class="p-button-danger p-button-raised p-button-sm"
                                            icon="pi pi-trash"
                                            iconPos="right"
                                        />
                                    </Link>
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
                                        v-else-if="notification.type.includes(['BountyComment'])"
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

const props = defineProps({
    notification: Object,
    auth: Object
});

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
