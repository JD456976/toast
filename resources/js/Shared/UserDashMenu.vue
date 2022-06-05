<template>
    <div class="col-md-3">
        <div class="dashboard-menu">
            <ul class="nav flex-column" role="tablist">
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('user.info',this.user.id)"
                          :class="isUrl('') ? 'active' : ''">
                        <icon name="Info" class="mr-2 w-4 h-4" />
                        {{ user.name }} Info
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('user.deals',this.user.id)"
                          :class="isUrl('account/deals') ? 'active' : ''">
                        <icon name="deals" class="mr-2 w-4 h-4" />
                        {{ user.name }} Deals
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="$route('user.bounties',this.user.id)"
                          :class="isUrl('account/bounties') ? 'active' : ''">
                        <icon name="bounties" class="mr-2 w-4 h-4" />
                        {{ user.name }} Bounties
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
    name: "UserDashMenu",
    props: {
        user: Object
    },
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

<style scoped>

</style>
