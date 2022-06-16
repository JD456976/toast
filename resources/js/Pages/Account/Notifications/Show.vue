<template>
    <Head>
        <title>Viewing Notification</title>
        <meta name="description" content="Viewing Notification">
    </Head>
    <div class="page-content pt-50 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <dash-menu />
                        <div class="col-md-9">
                            <Card style="margin-bottom: 2em">
                                <template #title>
                                    {{ notification.type }}
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
                                    <p>
                                        {{ notification.content }}
                                    </p>
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
    </div>
</template>

<script>
import DashMenu from "@/Shared/DashMenu";
import Card from "primevue/card";
import Button from "primevue/button";
import { Link } from "@inertiajs/inertia-vue3";
import Tooltip from "primevue/tooltip";

export default {
    name: "Show",
    props: {
        notification: Object
    },
    components: {
        DashMenu,
        Card,
        Link,
        Button,
        Tooltip
    },
    directives: {
        "tooltip": Tooltip
    }
};
</script>

<style scoped>

</style>
