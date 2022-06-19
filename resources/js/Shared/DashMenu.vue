<template>
    <div class="col-md-3">
        <div class="dashboard-menu">
            <ul class="nav flex-column" role="tablist">
                <li class="nav-item">
                    <Link class="nav-link text-center" :href="$route('account.dashboard')"
                          :class="isUrl('account/dashboard') ? 'active' : ''">
                        <i class="pi pi-home mr-2"></i>
                        Dashboard
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-center" :href="$route('account.deals')"
                          :class="isUrl('account/deals') ? 'active' : ''">
                        <i class="pi pi-money-bill mr-2"></i>
                        Your Deals
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-center" :href="$route('account.bounties')"
                          :class="isUrl('account/bounties') ? 'active' : ''">
                        <i class="pi pi-filter-fill mr-2"></i>
                        Your Bounties
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-center" :href="$route('account.points')"
                          :class="isUrl('account/points') ? 'active' : ''">
                        <i class="pi pi-star mr-2"></i>
                        Your Points
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-center" :href="$route('account.watchlist')"
                          :class="isUrl('account/watchlist') ? 'active' : ''">
                        <i class="pi pi-eye mr-2"></i>
                        Your Watchlist
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-center" :href="$route('account.notifications')"
                          :class="isUrl('account/notifications') ? 'active' : ''">
                        <i class="pi pi-comment mr-2"></i>
                        Notifications
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-center" :href="$route('account.following')"
                          :class="isUrl('account/following') ? 'active' : ''">
                        <i class="pi pi-user-plus mr-2"></i>
                        Following Lists
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-center" :href="$route('account.warnings')"
                          :class="isUrl('account/warnings') ? 'active' : ''">
                        <i class="pi pi-exclamation-triangle mr-2 "></i>
                        Warnings
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-center" :href="$route('account.details')"
                          :class="isUrl('account/details') ? 'active' : ''">
                        <i class="pi pi-th-large mr-2"></i>
                        Account Details
                    </Link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import { Link, usePage } from "@inertiajs/inertia-vue3";
import BadgeDirective from "primevue/badgedirective";
import { computed } from "vue";

export default {
    setup() {
        const user = computed(() => usePage().props.value.auth.user);
        return {
            user
        };
    },
    name: "DashMenu",
    components: {
        Link
    },
    methods: {
        isUrl(...urls) {
            let currentUrl = this.$page.url.substr(1);
            if (urls[0] === "") {
                return currentUrl === "";
            }
            return urls.filter((url) => currentUrl.startsWith(url)).length;
        }
    },
    directives: {
        "badge": BadgeDirective
    }
};
</script>
