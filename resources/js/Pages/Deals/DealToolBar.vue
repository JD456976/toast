<template>
  <div v-if="loggedin" class="fixed-bottom">
    <Toolbar>
      <template #start>
        <ul class="list-group list-group-horizontal">
          <li>
            <Link v-tooltip="'Already watching this'" v-if="deal.watchlist" style="pointer-events: none" class="mr-10"
                  :href="$route('watchlist.store',deal.product_id)"
                  method="post"
            >
                <Button disabled icon="pi pi-eye-slash" iconPos="right" label="In Watchlist" class="p-button-raised p-button-success p-button-text" />
            </Link>
              <Link v-else class="mr-10"
                    :href="$route('watchlist.store',deal.product_id)"
                    method="post"
              >
                  <Button icon="pi pi-eye" iconPos="right" label="Add To Watchlist" class="p-button-raised p-button-success p-button-text" />
              </Link>
          </li>
          <li>
            <Link v-if="auth.user.id !== deal.user_id"  class=" mr-10" :href="$route('follow.store',deal.user_id)"
                  method="post"
            >
                <Button  icon="pi pi-user-plus" iconPos="right" label="Follow User" class="p-button-raised p-button-success p-button-text" />
            </Link>
          </li>
          <li>
            <report-deal-form :deal="deal" />
          </li>
        </ul>
      </template>

      <template #end>
        <div v-if="admin" class="mx-auto">
          <Link class="mr-10"
                :href="$route('admin.deal.edit',deal.id)"
          >
            <Button label="Edit Deal" icon="pi pi-pencil" class="p-button-raised p-button p-ripple p-button-warning" />
          </Link>
          <Link v-if="deal.is_featured === true" class="mr-10"
                :href="$route('admin.deal.feature',deal.id)"
                method="post"
          >
            <Button label="Unfeature Deal" icon="pi pi-star" class="p-button-raised p-button p-ripple p-button-secondary" />
          </Link>
          <Link v-else class="mr-10"
                :href="$route('admin.deal.feature',deal.id)"
                method="post"
          >
            <Button label="Feature Deal" icon="pi pi-star" class="p-button-raised p-button p-ripple p-button-info" />
          </Link>
          <Link v-if="deal.is_active === true" class="mr-10"
                :href="$route('admin.deal.approve',deal.id)"
                method="post"
          >
            <Button label="Unapprove Deal" icon="pi pi-power-off" class="p-button-raised p-button p-ripple p-button-secondary" />
          </Link>
          <Link v-else class="mr-10"
                :href="$route('admin.deal.approve',deal.id)"
                method="post"
          >
            <Button label="Approve Deal" icon="pi pi-power-off" class="p-button-raised p-button p-ripple p-button-info" />
          </Link>
          <Link v-if="deal.is_frontpage === true" class="mr-10"
                :href="$route('admin.deal.frontpage',deal.id)"
                method="post"
          >
            <Button label="Unfrontpage Deal" icon="pi pi-home" class="p-button-raised p-button p-ripple p-button-secondary" />
          </Link>
          <Link v-else class="mr-10"
                :href="$route('admin.deal.frontpage',deal.id)"
                method="post"
          >
            <Button label="Frontage Deal" icon="pi pi-home" class="p-button p-ripple p-button-info" />
          </Link>
        </div>
      </template>
    </Toolbar>
  </div>
</template>

<script setup>
import Button from "primevue/button";
import ReportDealForm from "./ReportDealForm";
import Toolbar from "primevue/toolbar";

const props = defineProps({
    admin: Boolean,
    deal: Object,
    loggedin: Boolean,
    auth: Object
})
</script>

<script>
import Tooltip from "primevue/tooltip";
import Ripple from "primevue/ripple";

export default {
  name: "DealToolBar",
    directives: {
        "tooltip": Tooltip,
        "ripple": Ripple
    },
};
</script>

<style scoped>
ul.list-group li {
  margin-left: 10px;
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

.p-button {
  margin-bottom: .5rem;
}

}

::v-deep(.product-grid-item) {
  margin: .5rem;
  border: 1px solid var(--surface-border);

img {
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
  margin: 2rem 0;
}

}

@media screen and (max-width: 576px) {

  img {
    margin: 2rem 0;
  }

}

.disabled-link {
    pointer-events: none;
}

</style>
