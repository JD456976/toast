<template>
    <div class="col-md-3">
        <div class="dashboard-menu">
            <ul class="nav flex-column" role="tablist">
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('user.info',this.user.id)"
                          :class="isUrl('') ? 'active' : ''">
                        <i class="pi pi-info-circle mr-2 w-4 h-4"></i>
                        {{ user.name }} Info
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('user.deals',this.user.id)"
                          :class="isUrl('account/deals') ? 'active' : ''">
                        <i class="pi pi-money-bill mr-2 w-4 h-4"></i>
                        {{ user.name }} Deals
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('user.bounties',this.user.id)"
                          :class="isUrl('account/bounties') ? 'active' : ''">
                        <i class="pi pi-filter-fill mr-2 w-4 h-4"></i>
                        {{ user.name }} Bounties
                    </Link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    name: "UserDashMenu",
    props: {
        user: Object
    },
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

<style scoped>

</style>
