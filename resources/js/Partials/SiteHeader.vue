<template>
    <header class="header-area header-style-2 header-height-2 sticky-top">
        <div class="surface-overlay shadow-2 flex relative lg:static justify-content-between" style="min-height: 42px">
            <a v-ripple class="cursor-pointer inline-flex align-items-center px-3 lg:hidden text-700 p-ripple"
               v-styleclass="{ selector: '@next', enterClass: 'hidden', leaveToClass: 'hidden', hideOnOutsideClick: true }">
                <i class="pi pi-bars text-2xl"></i>
            </a>
            <div
                class="hidden lg:flex absolute lg:static w-full surface-overlay left-0 top-100 z-1 shadow-2 lg:shadow-none">
                <ul class="flex list-none p-0 m-0 flex-column lg:flex-row">
                    <li class="h-full">
                        <Link
                            :class="route().current('deal.index') ? 'border-green-500' : ''"
                            class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 lg:border-left-none lg:border-bottom-2 transition-colors transition-duration-150 py-3 lg:py-0 px-3 p-ripple"
                            v-ripple :href="$route('deal.index')">
                            <span class="pi pi-money-bill mr-2"></span>
                            <span class="font-medium">Deals</span>
                        </Link>
                    </li>
                    <li class="h-full">
                        <Link
                            :class="route().current('bounty.index') ? 'border-green-500' : ''"
                            class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 py-3 lg:py-0 px-3 p-ripple"
                            v-ripple :href="$route('bounty.index')">
                            <span class="pi pi-filter-fill mr-2"></span>
                            <span class="font-medium">Bounties</span>
                        </Link>
                    </li>
                    <li class="h-full">
                        <Link
                            :class="route().current('blog.index') ? 'border-green-500' : ''"
                            class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 py-3 lg:py-0 px-3 p-ripple"
                            v-ripple :href="$route('blog.index')">
                            <span class="pi pi-book mr-2"></span>
                            <span class="font-medium">Blog</span>
                        </Link>
                    </li>
                    <li class="h-full">
                        <Link v-for="item in headerMenu" :key=id
                              :class="route().current('page.show') ? 'border-green-500' : ''"
                              class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 py-3 lg:py-0 px-3 p-ripple"
                              v-ripple :href="$route('page.show',item.slug)">
                            <span class="pi pi-bookmark mr-2"></span>
                            <span class="font-medium">{{ item.title }}</span>
                        </Link>
                    </li>
                </ul>
            </div>

            <a v-ripple class="cursor-pointer inline-flex align-items-center px-3 lg:hidden text-700 p-ripple"
               v-styleclass="{ selector: '@next', enterClass: 'hidden', leaveToClass: 'hidden', hideOnOutsideClick: true }">
                <i class="pi pi-ellipsis-v text-xl"></i>
            </a>
            <div
                class="surface-overlay flex relative lg:static justify-content-between"
                style="min-height: 42px">
                <a v-ripple
                   class="cursor-pointer inline-flex align-items-center px-3 lg:hidden text-700 p-ripple"
                   v-styleclass="{ selector: '@next', enterClass: 'hidden', leaveToClass: 'hidden', hideOnOutsideClick: true }">
                    <i class="pi pi-bars text-2xl"></i>
                </a>
                <div
                    class="hidden lg:flex absolute lg:static w-full surface-overlay left-0 top-100 z-1 shadow-2 lg:shadow-none">
                </div>

                <a v-ripple
                   class="cursor-pointer inline-flex align-items-center px-3 lg:hidden text-700 p-ripple"
                   v-styleclass="{ selector: '@next', enterClass: 'hidden', leaveToClass: 'hidden', hideOnOutsideClick: true }">
                    <i class="pi pi-ellipsis-v text-xl"></i>
                </a>
            </div>
            <div v-if="loggedin"
                 class="hidden lg:flex lg:justify-content-end absolute lg:static w-full surface-overlay left-0 top-100 z-1 shadow-2 lg:shadow-none">
                <ul class="flex list-none p-0 m-0 flex-column lg:flex-row">
                    <li class="h-full">
                        <Link
                            v-tooltip.bottom="'Ohhhh snap!!'"
                            class="cursor-pointer h-full inline-flex align-items-center text-600 py-3 lg:py-0 px-3 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 p-ripple"
                            v-if="admin" v-ripple :href="$route('admin.dashboard')">
                            <span class="pi pi-lock mr-2"></span>
                            <span class="font-medium">Admin</span>
                        </Link>
                    </li>
                    <li class="h-full">
                        <Link
                            class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 py-3 lg:py-0 px-3 p-ripple"
                            v-if="loggedin !== true" v-ripple :href="$route('login')">
                            <span class="pi pi-lock mr-2"></span>
                            <span class="font-medium">Login</span>
                        </Link>
                    </li>
                    <li class="h-full">
                        <Link
                            class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 py-3 lg:py-0 px-3 p-ripple"
                            v-if="loggedin !== true" v-ripple :href="$route('register')">
                            <span class="pi pi-lock mr-2"></span>
                            <span class="font-medium">Register</span>
                        </Link>
                    </li>
                    <li class="h-full">
                        <Link
                            v-tooltip.bottom="'Chat With Us'"
                            class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 py-3 lg:py-0 px-3 p-ripple"
                            v-if="loggedin" v-ripple href="/">
                            <span class="pi pi-discord mr-2"></span>
                            <span class="font-medium mr-2">Chat</span>
                        </Link>
                    </li>
                    <li class="h-full">
                        <Link
                            v-tooltip.bottom="'Your Points'"
                            :class="route().current('account.points') ? 'border-green-500' : ''"
                            class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 py-3 lg:py-0 px-3 p-ripple"
                            v-if="loggedin" v-ripple :href="$route('account.points')">
                            <span class="pi pi-star mr-2"></span>
                            <Badge :value=points severity="danger"></Badge>
                        </Link>
                    </li>
                    <li class="h-full">
                        <Link
                            v-tooltip.bottom="'Your Watchlist'"
                            :class="route().current('account.watchlist') ? 'border-green-500' : ''"
                            class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 py-3 lg:py-0 px-3 p-ripple"
                            v-if="loggedin" v-ripple :href="$route('account.watchlist')">
                            <span class="pi pi-eye mr-2"></span>
                            <Badge :value=watchlistCount
                                   severity="danger"></Badge>
                        </Link>
                    </li>
                    <li class="h-full">
                        <Link
                            v-tooltip.bottom="'Your Notifications'"
                            :class="route().current('account.notifications') ? 'border-green-500' : ''"
                            class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 py-3 lg:py-0 px-3 p-ripple"
                            v-if="loggedin" v-ripple
                            :href="$route('account.notifications')">
                            <span class="pi pi-inbox mr-2"></span>
                            <Badge :value=unread severity="danger"></Badge>
                        </Link>
                    </li>
                    <li class="h-full relative">
                        <a v-ripple
                           class="cursor-pointer h-full inline-flex align-items-center text-600 py-3 lg:py-0 px-3 border-left-2 lg:border-left-none lg:border-bottom-2 border-transparent hover:border-500 transition-colors transition-duration-150 p-ripple"
                           v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'scalein', leaveToClass: 'hidden', leaveActiveClass: 'fadeout', hideOnOutsideClick: true }">
                            <Avatar class="mr-2 lg:mr-0"
                                    style="width: 28px; height: 28px"
                                    image="https://i.pravatar.cc/300"
                                    shape="circle"></Avatar>
                            <span class="mx-2 font-medium text-900">{{ user.name }}</span>
                            <i class="pi pi-angle-down"></i>
                        </a>
                        <div
                            class="hidden static lg:absolute w-full surface-overlay left-0 top-100 z-1 shadow-none lg:shadow-2 origin-top border-round pl-3 lg:pl-0">
                            <ul class="list-none p-0 m-0">
                                <li>
                                    <Link
                                        class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 border-transparent hover:border-500 transition-colors transition-duration-150 p-3 p-ripple"
                                        v-ripple :href="$route('account.dashboard')">
                                        <span class="pi pi-user mr-2"></span>
                                        <span class="font-medium">Profile</span>
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 border-transparent hover:border-500 transition-colors transition-duration-150 p-3 p-ripple"
                                        v-ripple :href="$route('deal.create')">
                                        <span class="pi pi-money-bill mr-2"></span>
                                        <span class="font-medium">Post Deal</span>
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 border-transparent hover:border-500 transition-colors transition-duration-150 p-3 p-ripple"
                                        v-ripple :href="$route('bounty.create')">
                                        <span class="pi pi-filter-fill mr-2"></span>
                                        <span class="font-medium">Post Bounty</span>
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        class="cursor-pointer h-full inline-flex align-items-center text-600 border-left-2 border-transparent hover:border-500 transition-colors transition-duration-150 p-3 p-ripple"
                                        v-ripple method="post" :href="$route('logout')">
                                        <span class="pi pi-lock mr-2"></span>
                                        <span class="font-medium">Logout</span>
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block mb-20">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <Link :href="$route('deal.index')">
                            <img src="/assets/frontend/imgs/theme/logo.svg" alt="logo" />
                        </Link>
                    </div>
                    <div class="header-right">
                        <main-search />
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div>

                                </div>
                            </div>
                        </div>
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
import Tooltip from "primevue/tooltip";
import Ripple from "primevue/ripple";
import StyleClass from "primevue/styleclass";
import Avatar from "primevue/avatar";
import InputText from "primevue/inputtext";


export default {
    name: "SiteHeader",
    components: {
        HeaderUserMenu,
        MainSearch,
        Link,
        Button,
        Badge,
        Avatar,
        InputText
    },
    directives: {
        "tooltip": Tooltip,
        "ripple": Ripple,
        "styleclass": StyleClass
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
