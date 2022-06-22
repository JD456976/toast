<template>
    <header class="header-area header-style-2 header-height-2 sticky-top">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <li>
                                    <Link :href="$route('deal.index')">
                                        Deals
                                    </Link>
                                </li>
                                <li>
                                    <Link :href="$route('bounty.index')">
                                        Bounties
                                    </Link>
                                </li>
                                <li>
                                    <Link :href="$route('blog.index')">
                                        Blog
                                    </Link>
                                </li>
                                <li>
                                    <Link :href="$route('contact.show')">
                                        Contact
                                    </Link>
                                </li>
                                <li v-for="item in headerMenu">
                                    <Link :href="$route('page.show', item.slug)">
                                        {{ item.title }}
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block"
                                 style="overflow: hidden; position: relative; height: 14px;">
                                <ul style="position: absolute; margin: 0px; padding: 0px; top: 0px;">


                                    <li style="margin: 0px; padding: 0px; height: 14px;">100% Secure delivery without
                                        contacting the courier
                                    </li>
                                    <li style="margin: 0px; padding: 0px; height: 14px;">Supper Value Deals - Save more
                                        with coupons
                                    </li>
                                    <li style="margin: 0px; padding: 0px; height: 14px;">Trendy 25silver jewelry, save
                                        up 35% off today
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <header-user-menu />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block mb-20">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="/"><img src="assets/frontend/imgs/theme/logo.svg" alt="logo" /></a>
                    </div>
                    <div class="header-right">
                        <main-search />
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div>
                                    <Button v-if="admin && loggedin" type="button"
                                            label="Admin"
                                            class="p-button-text p-button-success" badge="8"
                                            badgeClass="p-badge-danger">
                                        <Link :href="$route('admin.dashboard')">
                                            <i class="pi pi-lock"></i>
                                            <span class="ml-10">Admin</span>
                                        </Link>
                                    </Button>
                                    <Button v-if="loggedin !== true"
                                            label="Login"
                                            class="p-button-text p-button-success" badge="8"
                                            badgeClass="p-badge-danger">
                                        <Link :href="$route('login')">
                                            <i class="pi pi-unlock"></i>
                                            <span class="ml-10">Login</span>
                                        </Link>
                                    </Button>
                                    <Button v-if="loggedin !== true"
                                            label="Register"
                                            class="p-button-text p-button-success" badge="8"
                                            badgeClass="p-badge-danger">
                                        <Link :href="$route('register')">
                                            <i class="pi pi-key"></i>
                                            <span class="ml-10">Register</span>
                                        </Link>
                                    </Button>
                                    <Button v-if="loggedin" label="Chat"
                                            class="p-button-text p-button-success">
                                        <Link :href="$route('chat')">
                                            <i class="pi pi-whatsapp"></i>
                                            <span class="ml-10">Chat</span>
                                            <Badge :value=unseen severity="danger"></Badge>
                                        </Link>
                                    </Button>
                                    <Button v-if="loggedin" label="Points"
                                            class="p-button-text p-button-success">
                                        <Link :href="$route('account.points')">
                                            <i class="pi pi-star"></i>
                                            <span class="ml-10">Points</span>
                                            <Badge :value=points severity="danger"></Badge>
                                        </Link>
                                    </Button>
                                    <Button v-if="loggedin" label="Watchlist"
                                            class="p-button-text p-button-success"
                                            badgeClass="p-badge-danger">
                                        <Link :href="$route('account.watchlist')">
                                            <i class="pi pi-eye"></i>
                                            <span class="ml-10">Watchlist</span>
                                            <Badge :value=watchlistCount severity="danger"></Badge>
                                        </Link>
                                    </Button>
                                    <Button v-if="loggedin" label="Notifications"
                                            class="p-button-text p-button-success"
                                            badgeClass="p-badge-danger">
                                        <Link :href="$route('account.notifications')">
                                            <i class="pi pi-envelope"></i>
                                            <span class="ml-10">Notifications</span>
                                            <Badge :value=unread severity="danger"></Badge>
                                        </Link>
                                    </Button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.html"><img src="assets/frontend/imgs/theme/logo.svg" alt="logo" /></a>
                    </div>

                </div>
            </div>
        </div>
    </header>
</template>

<script>
import Button from "primevue/button";
import { Link } from "@inertiajs/inertia-vue3";
import Badge from "primevue/badge";
import MainSearch from "@/Shared/MainSearch";
import HeaderUserMenu from "@/Partials/HeaderUserMenu";


export default {
    name: "SiteHeader",
    components: {
        HeaderUserMenu,
        MainSearch,
        Link,
        Button,
        Badge
    },
    props: {
        user: Object,
        admin: Boolean,
        loggedin: Boolean,
        headerMenu: Array,
        unseen: Number,
        points: Number,
        watchlistCount: Number,
        unread: Number
    }
};
</script>

<style scoped>
header.header-area {
    background-color: white;
}

</style>
