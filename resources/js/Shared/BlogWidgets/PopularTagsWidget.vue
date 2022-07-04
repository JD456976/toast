<template>
    <Accordion :activeIndex="0" class="mb-3">
        <AccordionTab header="Popular Tags">
            <div
                class="pb-5 overflow-hidden transition-all transition-duration-400 transition-ease-in-out">
                <div class="surface-card border-round select-none">
                    <Link v-for="tag in tags" :key="id" class="mr-2"
                          :href="$route('tag.show', tag)">
                        <Tag :value="tag" severity="success"
                             class="mr-2">
                        </Tag>
                    </Link>
                </div>
            </div>
        </AccordionTab>
    </Accordion>
</template>

<script setup>
import Accordion from "primevue/accordion";
import AccordionTab from "primevue/accordiontab";
import Tag from "primevue/tag";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    tags: Array
});

</script>

<script>
export default {
    name: "PopularTagsWidget"
};
</script>
<style scoped>
.chip a {
    font-size: 20px;
    padding: 10px;
}

</style>
