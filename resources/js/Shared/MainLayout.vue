<template>
    <site-header
        :user="auth.user"
        :admin="admin"
        :loggedin="loggedin"
        :headerMenu="headerMenu"
        :points="points"
        :watchlistCount="watchlistCount"
        :unread="unread"
    />

    <div class="p-4">
        <div class="surface-border border-round surface-card" style="min-height: 20rem">
            <Transition name="fade" mode="out-in" appear>
                <div :key="$page.url">
                    <flash-messages />
                    <ScrollTop />
                    <slot />
                </div>
            </Transition>
        </div>
        <site-footer />
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Breadcrumbs from "@/Partials/Breadcrumbs";
import SiteHeader from "@/Partials/SiteHeader";
import SiteFooter from "@/Partials/SiteFooter";
import Tooltip from "primevue/tooltip";
import ScrollTop from "primevue/scrolltop";
import FlashMessages from "@/Shared/FlashMessages";


export default {
    name: "MainLayout",
    components: {
        SiteFooter,
        SiteHeader,
        Link,
        Head,
        Breadcrumbs,
        ScrollTop,
        FlashMessages
    },
    props: {
        featured: Array,
        deals: Array,
        headerMenu: Array,
        footerMenu: Array,
        auth: Object,
        admin: Boolean,
        loggedin: Boolean,
        points: Number,
        watchlistCount: Number,
        unread: Number
    },
    directives: {
        "tooltip": Tooltip
    }
};
</script>

<style lang="scss" scoped>

@import "~primeflex/primeflex.css";

.fade-enter, .fade-leave-to {
    transition: translateX(3em);
    opacity: 0;
}

.fade-enter-active, .fade-leave-active {
    transition: all .3s ease;
}


::v-deep(.custom-scrolltop) {
    width: 2rem;
    height: 2rem;
    border-radius: 4px;
    background-color: var(--primary-color);

    &:hover {
        background-color: var(--primary-color);
    }

    .p-scrolltop-icon {
        font-size: 1rem;
        color: var(--primary-color-text);
    }
}

</style>
