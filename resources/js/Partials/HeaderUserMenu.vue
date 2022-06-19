<template>
    <div class="dropdown mr-3">
        <a class="dropdown-toggle" type="button" id="dropdownMenuButton1"
           data-bs-toggle="dropdown" aria-expanded="false">
            Account
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li>
                <Link :href="$route('account.dashboard')">
                    <i class="pi pi-comment mr-2"></i>
                    My Account
                </Link>
            </li>
            <li>
                <Link :href="$route('deal.create')">
                    <i class="pi pi-money-bill mr-2"></i>
                    Post Deal
                </Link>
            </li>
            <li>
                <Link :href="$route('bounty.create')">
                    <i class="pi pi-filter mr-2"></i>
                    Post Bounty
                </Link>
            </li>
            <li>
                <Link :href="$route('logout')" method="post">
                    <i class="pi pi-lock mr-2"></i>
                    Logout
                </Link>
            </li>
        </ul>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    name: "HeaderUserMenu",
    components: {
        Link
    }
};
</script>

<style scoped>
ul.dropdown-menu li {
    padding: 10px;
}
</style>
