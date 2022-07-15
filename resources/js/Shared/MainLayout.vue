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
                    <ShowAnnouncement :announcement="announcement" />
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
import SiteHeader from "@/Partials/SiteHeader.vue";
import SiteFooter from "@/Partials/SiteFooter.vue";
import Tooltip from "primevue/tooltip";
import ScrollTop from "primevue/scrolltop";
import FlashMessages from "@/Shared/FlashMessages.vue";
import ShowAnnouncement from "@/Pages/Announcement/Show.vue";


export default {
    name: "MainLayout",
    components: {
        ShowAnnouncement,
        SiteFooter,
        SiteHeader,
        Link,
        Head,
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
        unread: Number,
        user: Object,
        announcement: Array
    },
    directives: {
        "tooltip": Tooltip
    }
};
</script>

<style lang="scss" scoped>


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
