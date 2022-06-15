<template>
    <div class="search-style-2">
        <ais-instant-search
            index-name="deals"
            :search-client="searchClient"
        >
            <ais-search-box placeholder="Search..."></ais-search-box>
            <ais-panel>
                <ais-state-results>
                    <template v-slot="{ state: { query } }">
                        <ais-hits v-show="query.length > 0">
                            <template v-slot:item="{ item }">
                                <h6>
                                    {{ item.title }}
                                </h6>
                            </template>
                        </ais-hits>
                    </template>
                </ais-state-results>
            </ais-panel>
        </ais-instant-search>
    </div>
</template>

<script>

import algoliasearch from "algoliasearch";
import Dialog from "primevue/dialog";
import Button from "primevue/button";
import OverlayPanel from "primevue/overlaypanel";


export default {
    name: "MainSearch",
    components: {
        Dialog,
        Button,
        OverlayPanel
    },
    data() {
        return {
            searchClient: algoliasearch(
                "L81D7WAI02",
                "c7d85ae9e98c64874da4594d8602adc0"
            )
        };
    }

};
</script>

<style scoped>

</style>
