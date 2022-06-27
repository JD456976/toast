<template>
  <div v-if="loggedin" class="fixed-bottom">
    <Toolbar>
      <template #start>
        <ul class="list-group list-group-horizontal">
          <li>
            <Link class="btn mr-10"
                  :href="$route('watchlist.store',bounty.product_id)"
                  method="post"
            >Add To Watchlist
              <i class="fi-rs-heart"></i>
            </Link>
          </li>
          <li>
            <Link class="btn mr-10" :href="$route('follow.store',bounty.user_id)"
                  method="post"
            >Follow User
              <i class="fi-rs-add"></i>
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
        <div v-if="admin" class="mx-auto">
          <Link class="mr-10"
                :href="$route('admin.bounty.edit',bounty.id)"
          >
            <Button label="Edit Bounty" icon="pi pi-pencil"
                    class="p-button p-ripple p-button-warning" />
          </Link>
          <Link v-if="bounty.is_featured === true" class="mr-10"
                :href="$route('admin.bounty.feature',bounty.id)"
                method="post"
          >
            <Button label="Unfeature Bounty" icon="pi pi-star"
                    class="p-button p-ripple p-button-secondary" />
          </Link>
          <Link v-else class="mr-10"
                :href="$route('admin.bounty.feature',bounty.id)"
                method="post"
          >
            <Button label="Feature Bounty" icon="pi pi-star"
                    class="p-button p-ripple p-button-info" />
          </Link>
          <Link v-if="bounty.is_active === true" class="mr-10"
                :href="$route('admin.bounty.approve',bounty.id)"
                method="post"
          >
            <Button label="Unapprove Bounty" icon="pi pi-power-off"
                    class="p-button p-ripple p-button-secondary" />
          </Link>
          <Link v-else class="mr-10"
                :href="$route('admin.bounty.approve',bounty.id)"
                method="post"
          >
            <Button label="Approve Bounty" icon="pi pi-power-off"
                    class="p-button p-ripple p-button-info" />
          </Link>
          <Link v-if="bounty.is_verified === true" class="mr-10"
                :href="$route('admin.bounty.verify',bounty.id)"
                method="post"
          >
            <Button label="Unverify Bounty" icon="pi pi-check"
                    class="p-button p-ripple p-button-secondary" />
          </Link>
          <Link v-else-if="bounty.is_filled === true" class="mr-10"
                :href="$route('admin.bounty.verify',bounty.id)"
                method="post"
          >
            <Button label="Verify Bounty" icon="pi pi-check"
                    class="p-button p-ripple p-button-info" />
          </Link>
        </div>
      </template>
    </Toolbar>
  </div>
</template>
<script>
import Button from "primevue/button";
import FillBounty from "@/Pages/Bounties/FillBounty";
import ReportBountyForm from "./ReportBountyForm";
import Toolbar from "primevue/toolbar";

export default {
  name: "BountyToolBar",
  components: { Button, FillBounty, ReportBountyForm, Toolbar },
  props: {
    admin: {},
    bounty: {},
    loggedin: {}
  }
};
</script>
<style scoped>
ul.list-group li {
  margin-left: 10px;
}
</style>