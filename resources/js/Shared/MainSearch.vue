<template>
    <div class="search-style-2">
        <ais-instant-search
            index-name="deals"
            :search-client="searchClient"
        >
            <ais-search-box placeholder="Search..."></ais-search-box>


        </ais-instant-search>
    </div>
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
