<template>
  <Accordion :activeIndex="0" class="mb-3">
    <AccordionTab header="Search">
      <div
        class="pb-5 overflow-hidden transition-all transition-duration-400 transition-ease-in-out">
        <blog-search />
      </div>
    </AccordionTab>
  </Accordion>
</template>
<script>
import Accordion from "primevue/accordion";
import AccordionTab from "primevue/accordiontab";
import BlogSearch from "@/Shared/BlogSearch";

export default {
  name: "SearchWidget",
  components: { Accordion, AccordionTab, BlogSearch }
};
</script>
<style scoped>
.chip a {
  font-size: 20px;
  padding: 10px;
}

</style>