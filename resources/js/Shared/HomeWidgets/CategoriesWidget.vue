<template>
  <Accordion :activeIndex="0" class="mb-3">
    <AccordionTab header="Categories">
      <div
        class="pb-5 overflow-hidden transition-all transition-duration-400 transition-ease-in-out">

        <div class="surface-card shadow-2 border-round select-none">
          <ul class="list-none p-2 m-0">
            <li>
              <a v-ripple
                 class="flex align-items-center cursor-pointer p-3 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple">
                <i class="pi pi-home mr-2 text-700"></i>
                <span class="font-medium text-700">Dashboard</span>
              </a>
            </li>
            <li>
              <a v-ripple
                 class="flex align-items-center cursor-pointer p-3 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple">
                <i class="pi pi-bookmark mr-2 text-700"></i>
                <span class="font-medium text-700">Bookmarks</span>
              </a>
            </li>
            <li>
              <a v-ripple
                 class="flex align-items-center cursor-pointer p-3 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple">
                <i class="pi pi-users mr-2 text-700"></i>
                <span class="font-medium text-700">Team</span>
              </a>
            </li>
            <li>
              <a v-ripple
                 class="flex align-items-center cursor-pointer p-3 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple">
                <i class="pi pi-comments mr-2 text-700"></i>
                <span class="font-medium text-700">Messages</span>
              </a>
            </li>
            <li>
              <a v-ripple
                 class="flex align-items-center cursor-pointer p-3 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple">
                <i class="pi pi-calendar mr-2 text-700"></i>
                <span class="font-medium text-700">Calendar</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </AccordionTab>
  </Accordion>
</template>
<script>
import Accordion from "primevue/accordion";
import AccordionTab from "primevue/accordiontab";

export default {
  name: "CategoriesWidget",
  components: { Accordion, AccordionTab }
};
</script>
<style scoped>
.chip a {
  font-size: 20px;
  padding: 10px;
}

</style>