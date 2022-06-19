<template>
    <site-header
        :user="auth.user"
        :admin="admin"
        :loggedin="loggedin"
        :headerMenu="headerMenu"
        :unseen="unseen"
        :points="points"
        :watchlistCount="watchlistCount"
    />
    <main class="main pages">
        <Transition name="fade" mode="out-in" appear>
            <div :key="$page.url">
                <slot />
            </div>
        </Transition>
    </main>
    <site-footer />
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Breadcrumbs from "@/Partials/Breadcrumbs";
import SiteHeader from "@/Partials/SiteHeader";
import SiteFooter from "@/Partials/SiteFooter";
import Tooltip from "primevue/tooltip";


export default {
    name: "MainLayout",
    components: {
        SiteFooter,
        SiteHeader,
        Link,
        Head,
        Breadcrumbs
    },
    props: {
        featured: Array,
        deals: Array,
        headerMenu: Array,
        footerMenu: Array,
        auth: Object,
        admin: Boolean,
        loggedin: Boolean,
        unseen: Number,
        points: Number,
        watchlistCount: Number
    },
    directives: {
        "tooltip": Tooltip
    }
};
</script>

<style scoped>
.fade-enter, .fade-leave-to {
    transition: translateX(3em);
    opacity: 0;
}

.fade-enter-active, .fade-leave-active {
    transition: all .3s ease;
}
</style>
