<template>
  <ul class="list-none p-0 m-0 flex font-medium overflow-y-hidden overflow-x-auto border-round">
    <li class="relative p-3 bg-green-500">
      <Link class="cursor-pointer"
            :href="$route('deal.index')">
        <i class="pi pi-home text-white"></i>
      </Link>
    </li>
    <li class="relative p-3 bg-green-500">
      <div class="absolute left-0 top-0 z-1"
           style="border-left: 20px solid var(--green-500); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
      <Link class="cursor-pointer text-white pl-4 white-space-nowrap"
            :href="$route('deal.index')">
        Deals
      </Link>
      <div class="absolute top-0"
           style="left: 1px; border-left: 20px solid var(--green-100); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
    </li>
    <li class="relative p-3 bg-green-700">
      <div class="absolute left-0 top-0 z-1"
           style="border-left: 20px solid var(--green-500); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
      <Link class="cursor-pointer text-green-100 font-bold pl-4 white-space-nowrap"
            :href="$route('deal.show', deal.slug)">
        {{ deal.title }}
      </Link>
      <div class="absolute top-0"
           style="left: 1px; border-left: 20px solid var(--green-100); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
    </li>
  </ul>
</template>

<script setup>
const props = defineProps({
    deal: Object
})
</script>

<script>
export default {
  name: "DealBreadCrumbs",
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
