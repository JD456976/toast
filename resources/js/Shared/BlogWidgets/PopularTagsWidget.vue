<template>
  <Accordion :activeIndex="0" class="mb-3">
    <AccordionTab header="Popular Tags">
      <div
        class="pb-5 overflow-hidden transition-all transition-duration-400 transition-ease-in-out">

        <div class="surface-card border-round select-none">
          <Tag class="mr-2" value="Primary"></Tag>
          <Tag class="mr-2" severity="success" value="Success"></Tag>
          <Tag class="mr-2" severity="info" value="Info"></Tag>
          <Tag class="mr-2" severity="warning" value="Warning"></Tag>
          <Tag severity="danger" value="Danger"></Tag>
        </div>
      </div>
    </AccordionTab>
  </Accordion>
</template>
<script>
import Accordion from "primevue/accordion";
import AccordionTab from "primevue/accordiontab";
import Tag from "primevue/tag";

export default {
  name: "PopularTagsWidget",
  components: { Accordion, AccordionTab, Tag }
};
</script>
<style scoped>
.chip a {
  font-size: 20px;
  padding: 10px;
}

</style>