<template>
    <Accordion :activeIndex="0" class="mb-3">
        <AccordionTab header="Popular Categories">
            <div
                class="pb-5 overflow-hidden transition-all transition-duration-400 transition-ease-in-out">

                <div class="surface-card shadow-2 border-round select-none">
                    <ul class="list-none p-2 m-0">
                        <li v-for="item in topCats" :key="id">
                            <Link v-ripple
                                  class="flex align-items-center cursor-pointer p-3 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                  :href="$route('store.show', item.slug)">
                                <span class="font-medium text-700">{{ item.name }}</span>
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </AccordionTab>
    </Accordion>
</template>

<script setup>
import Accordion from "primevue/accordion";
import AccordionTab from "primevue/accordiontab";

const props = defineProps({
    topCats: Array
});

</script>

<script>


export default {
    name: "CategoriesWidget"
};
</script>

<style scoped>
.chip a {
    font-size: 20px;
    padding: 10px;
}

</style>
