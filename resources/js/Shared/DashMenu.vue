<template>
    <div class="col-md-3">
        <div class="dashboard-menu">
            <ul class="nav flex-column" role="tablist">
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('account')"
                          :class="isUrl('') ? 'active' : ''">
                        <icon name="dashboard" class="mr-2 w-4 h-4" />
                        Dashboard
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('account.deals')"
                          :class="isUrl('account/deals') ? 'active' : ''">
                        <icon name="deals" class="mr-2 w-4 h-4" />
                        Your Deals
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('account.bounties')"
                          :class="isUrl('account/bounties') ? 'active' : ''">
                        <icon name="bounties" class="mr-2 w-4 h-4" />
                        Your Bounties
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('account.notifications')"
                          :class="isUrl('account/notifications') ? 'active' : ''">
                        <icon name="notifications" class="mr-2 w-4 h-4" />
                        Notifications
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('account.following')"
                          :class="isUrl('account/following') ? 'active' : ''">
                        <icon name="following" class="mr-2 w-4 h-4" />
                        Following Lists
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('account.details')"
                          :class="isUrl('account/details') ? 'active' : ''">
                        <icon name="details" class="mr-2 w-4 h-4" />
                        Account Details
                    </Link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Icon from "./Icon";

export default {
    name: "DashMenu",
    components: {
        Link,
        Icon
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
