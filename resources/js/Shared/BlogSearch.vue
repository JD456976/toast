<template>
    <ais-instant-search
        index-name="blogs"
        :search-client="searchClient"
    >
        <ais-search-box placeholder="Search..."></ais-search-box>

        <ais-hits>
            <template v-slot="{ items }">
                <ul>
                    <li v-for="item in items" :key="item.objectID">
                        <h6>{{ item.title }}</h6>
                    </li>
                </ul>
            </template>
        </ais-hits>


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
