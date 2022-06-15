<template>
    <ais-instant-search
        index-name="blogs"
        :search-client="searchClient"
    >
        <ais-search-box placeholder="Search..."></ais-search-box>

        <ais-state-results>
            <template v-slot="{ state: { query } }">
                <ais-hits v-show="query.length > 0">
                    <template v-slot:item="{ item }">
                        {{ item.title }}
                    </template>
                </ais-hits>
            </template>
        </ais-state-results>

    </ais-instant-search>

</template>

<script>

import algoliasearch from "algoliasearch";

export default {
    name: "MainSearch",
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
