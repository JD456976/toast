<template>
  <div v-if="loggedin" class="fixed-bottom">
    <Toolbar>
      <template #start>
        <ul class="list-group list-group-horizontal">
          <li>
            <Link class="btn mr-10"
                  :href="$route('watchlist.store',deal.product_id)"
                  method="post"
            >Add To Watchlist
              <i class="fi-rs-heart"></i>
            </Link>
          </li>
          <li>
            <Link class="btn mr-10" :href="$route('follow.store',deal.user_id)"
                  method="post"
            >Follow User
              <i class="fi-rs-add"></i>
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
            <Button label="Edit Deal" icon="pi pi-pencil" class="p-button p-ripple p-button-warning" />
          </Link>
          <Link v-if="deal.is_featured === true" class="mr-10"
                :href="$route('admin.deal.feature',deal.id)"
                method="post"
          >
            <Button label="Unfeature Deal" icon="pi pi-star" class="p-button p-ripple p-button-secondary" />
          </Link>
          <Link v-else class="mr-10"
                :href="$route('admin.deal.feature',deal.id)"
                method="post"
          >
            <Button label="Feature Deal" icon="pi pi-star" class="p-button p-ripple p-button-info" />
          </Link>
          <Link v-if="deal.is_active === true" class="mr-10"
                :href="$route('admin.deal.approve',deal.id)"
                method="post"
          >
            <Button label="Unapprove Deal" icon="pi pi-power-off" class="p-button p-ripple p-button-secondary" />
          </Link>
          <Link v-else class="mr-10"
                :href="$route('admin.deal.approve',deal.id)"
                method="post"
          >
            <Button label="Approve Deal" icon="pi pi-power-off" class="p-button p-ripple p-button-info" />
          </Link>
          <Link v-if="deal.is_frontpage === true" class="mr-10"
                :href="$route('admin.deal.frontpage',deal.id)"
                method="post"
          >
            <Button label="Unfrontpage Deal" icon="pi pi-home" class="p-button p-ripple p-button-secondary" />
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
<script>
import Button from "primevue/button";
import ReportDealForm from "./ReportDealForm";
import Toolbar from "primevue/toolbar";

export default {
  name: "DealToolBar",
  components: { Button, ReportDealForm, Toolbar },
  props: {
    admin: Boolean,
    deal: Object,
    loggedin: Boolean
  }
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

</style>
