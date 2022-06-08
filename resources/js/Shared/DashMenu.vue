<template>
    <div class="col-md-3">
        <div class="dashboard-menu">
            <ul class="nav flex-column" role="tablist">
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('account')"
                          :class="isUrl('') ? 'active' : ''">
                        <i class="pi pi-home mr-2 w-4 h-4"></i>
                        Dashboard
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('account.deals')"
                          :class="isUrl('account/deals') ? 'active' : ''">
                        <i class="pi pi-money-bill mr-2 w-4 h-4"></i>
                        Your Deals
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('account.bounties')"
                          :class="isUrl('account/bounties') ? 'active' : ''">
                        <i class="pi pi-filter-fill mr-2 w-4 h-4"></i>
                        Your Bounties
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('account.notifications')"
                          :class="isUrl('account/notifications') ? 'active' : ''">
                        <i class="pi pi-comment mr-2 w-4 h-4"></i>
                        Notifications
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('account.following')"
                          :class="isUrl('account/following') ? 'active' : ''">
                        <i class="pi pi-user-plus mr-2 w-4 h-4"></i>
                        Following Lists
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('account.warnings')"
                          :class="isUrl('account/warnings') ? 'active' : ''">
                        <i class="pi pi-exclamation-triangle mr-2 w-4 h-4 "></i>
                        Warnings
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('account.details')"
                          :class="isUrl('account/details') ? 'active' : ''">
                        <i class="pi pi-th-large mr-2 w-4 h-4"></i>
                        Account Details
                    </Link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
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
    }
};
</script>
