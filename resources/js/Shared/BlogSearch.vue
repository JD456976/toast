<template>
    <ais-instant-search
        index-name="blogs"
        :search-client="searchClient"
    >
        <ais-search-box placeholder="Search..."></ais-search-box>

        <ais-state-results class="position-absolute" style="z-index:99">
            <template v-slot="{ state: { query } }">
                <ais-hits v-show="query.length > 0">
                    <template v-slot:item="{ item }">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <Link class="nav-link" :href="$route('blog.show', item.slug)">
                                    <h6><i class="pi pi-external-link mr-2"></i>
                                        {{ item.title }}</h6>
                                </Link>
                            </li>
                        </ul>
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
