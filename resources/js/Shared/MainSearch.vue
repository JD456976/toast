<template>
    <div class="search-style-1">
        <ais-instant-search
            index-name="deals"
            :search-client="searchClient"
        >
            <ais-search-box show-loading-indicator placeholder="Search...">
                <template v-slot:submit-icon>🔎</template>
                <template v-slot:reset-icon>🚫</template>
            </ais-search-box>
            <ais-state-results class="position-absolute" style="z-index:99">
                <template v-slot="{ results: { hits, query } }">
                    <ais-hits v-show="query.length > 0">
                        <div class="mt-10 ml-10" v-if="hits.length <= 0">
                            <h6 class="text-center">No results have been found for {{ query }}.</h6>
                        </div>
                        <template v-slot:item="{ item }">
                            <Link class="nav-link" :href="$route('deal.show', item.slug)">
                                <h6><i class="pi pi-external-link mr-2"></i>
                                    {{ item.title }}</h6>
                            </Link>
                        </template>

                    </ais-hits>
                    <ais-pagination v-show="query.length > 0" />
                </template>


            </ais-state-results>
            <ais-configure
                :hits-per-page.camel="5"
            />


        </ais-instant-search>
    </div>
</template>

<script>

import algoliasearch from "algoliasearch";
import "instantsearch.css/themes/reset.css";
import "instantsearch.css/themes/satellite.css";
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

<style lang="scss" scoped>

</style>
