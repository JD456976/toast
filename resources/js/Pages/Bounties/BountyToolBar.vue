<template>
    <div v-if="loggedin" class="fixed-bottom">
        <Toolbar>
            <template #start>
                <ul class="list-group list-group-horizontal">
                    <li>
                        <Link v-if="bounty.watchlist" style="pointer-events: none" class="mr-10"
                              :href="$route('watchlist.store',bounty.product_id)"
                              method="post"
                        >
                            <Button disabled icon="pi pi-eye-slash" iconPos="right" label="In Watchlist"
                                    class="p-button-raised p-button-success p-button-text" />
                        </Link>
                        <Link v-else class="mr-10"
                              :href="$route('watchlist.store',bounty.product_id)"
                              method="post"
                        >
                            <Button icon="pi pi-eye" iconPos="right" label="Add To Watchlist"
                                    class="p-button-raised p-button-success p-button-text" />
                        </Link>
                    </li>
                    <li>
                        <Link v-if="auth.user.id !== bounty.user_id" class=" mr-10"
                              :href="$route('follow.store',bounty.user_id)"
                              method="post"
                        >
                            <Button icon="pi pi-user-plus" iconPos="right" label="Follow User"
                                    class="p-button-raised p-button-success p-button-text" />
                        </Link>
                    </li>
                    <li>
                        <fill-bounty :bounty="bounty" />
                    </li>
                    <li>
                        <report-bounty-form :bounty="bounty" />
                    </li>
                </ul>
            </template>

            <template #end>
                <ul class="list-group list-group-horizontal">
                    <li>
                        <Link class="mr-10"
                              :href="$route('admin.bounty.edit',bounty.id)"
                        >
                            <Button label="Edit Bounty" icon="pi pi-pencil"
                                    class="p-button-raised p-button p-ripple p-button-warning" />
                        </Link>
                    </li>
                    <li>
                        <Link v-if="bounty.is_featured === true" class="mr-10"
                              :href="$route('admin.bounty.feature',bounty.id)"
                              method="post"
                        >
                            <Button label="Unfeature Bounty" icon="pi pi-star"
                                    class="p-button-raised p-button p-ripple p-button-secondary" />
                        </Link>
                        <Link v-else class="mr-10"
                              :href="$route('admin.bounty.feature',bounty.id)"
                              method="post"
                        >
                            <Button label="Feature Bounty" icon="pi pi-star"
                                    class="p-button-raised p-button p-ripple p-button-info" />
                        </Link>
                    </li>
                    <li>
                        <Link v-if="bounty.is_active === true" class="mr-10"
                              :href="$route('admin.bounty.approve',bounty.id)"
                              method="post"
                        >
                            <Button label="Unapprove Bounty" icon="pi pi-power-off"
                                    class="p-button-raised p-button p-ripple p-button-secondary" />
                        </Link>
                        <Link v-else class="mr-10"
                              :href="$route('admin.bounty.approve',bounty.id)"
                              method="post"
                        >
                            <Button label="Approve Bounty" icon="pi pi-power-off"
                                    class="p-button-raised p-button p-ripple p-button-info" />
                        </Link>
                    </li>
                    <li>
                        <Link v-if="bounty.is_verified === true" class="mr-10"
                              :href="$route('admin.bounty.verify',bounty.id)"
                              method="post"
                        >
                            <Button label="Unverify Bounty" icon="pi pi-check"
                                    class="p-button-raised p-button p-ripple p-button-secondary" />
                        </Link>
                        <Link v-else-if="bounty.is_filled === true" class="mr-10"
                              :href="$route('admin.bounty.verify',bounty.id)"
                              method="post"
                        >
                            <Button label="Verify Bounty" icon="pi pi-check"
                                    class="p-button-raised p-button p-ripple p-button-info" />
                        </Link>
                    </li>
                </ul>
            </template>
        </Toolbar>
    </div>
</template>

<script setup>
import Button from "primevue/button";
import FillBounty from "@/Pages/Bounties/FillBounty";
import ReportBountyForm from "./ReportBountyForm";
import Toolbar from "primevue/toolbar";

const props = defineProps({
    admin: Boolean,
    bounty: Object,
    loggedin: Boolean,
    auth: Object
});
</script>
<script>
export default {
    name: "BountyToolBar"
};
</script>
<style scoped>
ul.list-group li {
    margin-left: 10px;
}

.disabled-link {
    pointer-events: none;
}

</style>
