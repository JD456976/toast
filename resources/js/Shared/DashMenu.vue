<template>
    <div class="col-md-3">
        <div class="surface-card border-round shadow-2 select-none">
            <ul class="list-none p-2 m-0">
                <li>
                    <a v-ripple class="flex p-2 align-items-center cursor-pointer p-ripple"
                       v-styleclass="{ selector: '#pb_profile_submenu', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                <span class="mr-3 inline-flex">
                     <img src="https://i.pravatar.cc/300" width="42" height="42" />
                </span>
                        <div>
                            <span class="font-medium text-900 mb-2">{{ user.name }}</span>
                        </div>
                        <i class="pi pi-chevron-down text-700 ml-auto"></i>
                    </a>
                    <div class="border-top-1 surface-border my-3" style="height:1px"></div>
                    <ul id="pb_profile_submenu" class="list-none p-0 m-0 overflow-hidden">
                        <li class="mb-2">
                            <Link
                                :class="route().current('account.dashboard') ? 'border-green-500' : ''"
                                class="flex p-2 align-items-start hover:bg-green-100 border-transparent border-1 hover:border-100 border-round cursor-pointer transition-colors transition-duration-150 p-ripple"
                                v-ripple :href="$route('account.dashboard')">
                                <i class="pi pi-home text-500 mr-3 text-xl"></i>
                                <span>
                            <span class="block text-700 font-medium">Dashboard</span>
                            <p class="mt-1 mb-0 text-600 text-sm">Check out your various stats!</p>
                        </span>
                            </Link>
                        </li>
                        <li class="mb-2">
                            <Link
                                :class="route().current('account.deals') ? 'border-green-500' : ''"
                                class="flex p-2 align-items-start hover:bg-green-100 border-transparent border-1 hover:border-100 border-round cursor-pointer transition-colors transition-duration-150 p-ripple"
                                v-ripple :href="$route('account.deals')">
                                <i class="pi pi-money-bill text-500 mr-3 text-xl"></i>
                                <span>
                            <span class="block text-700 font-medium">Deals</span>
                            <p class="mt-1 mb-0 text-600 text-sm">Your posted deals</p>
                        </span>
                            </Link>
                        </li>
                        <li class="mb-2">
                            <Link
                                :class="route().current('account.bounties') ? 'border-green-500' : ''"
                                class="flex p-2 align-items-start hover:bg-green-100 border-transparent border-1 hover:border-100 border-round cursor-pointer transition-colors transition-duration-150 p-ripple"
                                v-ripple :href="$route('account.bounties')">
                                <i class="pi pi-filter text-500 mr-3 text-xl"></i>
                                <span>
                            <span class="block text-700 font-medium">Bounties</span>
                            <p class="mt-1 mb-0 text-600 text-sm">Your posted bounties</p>
                        </span>
                            </Link>
                        </li>
                        <li class="mb-2">
                            <Link
                                :class="route().current('account.points') ? 'border-green-500' : ''"
                                class="flex p-2 align-items-start hover:bg-green-100 border-transparent border-1 hover:border-100 border-round cursor-pointer transition-colors transition-duration-150 p-ripple"
                                v-ripple :href="$route('account.points')">
                                <i class="pi pi-star text-500 mr-3 text-xl"></i>
                                <span>
                            <span class="block text-700 font-medium">Points</span>
                            <p class="mt-1 mb-0 text-600 text-sm">Let's spend those points!</p>
                        </span>
                            </Link>
                        </li>
                        <li class="mb-2">
                            <Link
                                :class="route().current('account.watchlist') ? 'border-green-500' : ''"
                                class="flex p-2 align-items-start hover:bg-green-100 border-transparent border-1 hover:border-100 border-round cursor-pointer transition-colors transition-duration-150 p-ripple"
                                v-ripple :href="$route('account.watchlist')">
                                <i class="pi pi-eye text-500 mr-3 text-xl"></i>
                                <span>
                            <span class="block text-700 font-medium">Watchlist</span>
                            <p class="mt-1 mb-0 text-600 text-sm">Always watching...</p>
                        </span>
                            </Link>
                        </li>
                        <li class="mb-2">
                            <Link
                                :class="route().current('account.notifications') ? 'border-green-500' : ''"
                                class="flex p-2 align-items-start hover:bg-green-100 border-transparent border-1 hover:border-100 border-round cursor-pointer transition-colors transition-duration-150 p-ripple"
                                v-ripple :href="$route('account.notifications')">
                                <i class="pi pi-comment text-500 mr-3 text-xl"></i>
                                <span>
                            <span class="block text-700 font-medium">Notifications</span>
                            <p class="mt-1 mb-0 text-600 text-sm">Psst! Over here!</p>
                        </span>
                            </Link>
                        </li>
                        <li class="mb-2">
                            <Link
                                :class="route().current('account.following') ? 'border-green-500' : ''"
                                class="flex p-2 align-items-start hover:bg-green-100 border-transparent border-1 hover:border-100 border-round cursor-pointer transition-colors transition-duration-150 p-ripple"
                                v-ripple :href="$route('account.following')">
                                <i class="pi pi-user-plus text-500 mr-3 text-xl"></i>
                                <span>
                            <span class="block text-700 font-medium">Following</span>
                            <p class="mt-1 mb-0 text-600 text-sm">No stalking allowed!</p>
                        </span>
                            </Link>
                        </li>
                        <li class="mb-2">
                            <Link
                                :class="route().current('account.warnings') ? 'border-green-500' : ''"
                                class="flex p-2 align-items-start hover:bg-green-100 border-transparent border-1 hover:border-100 border-round cursor-pointer transition-colors transition-duration-150 p-ripple"
                                v-ripple :href="$route('account.warnings')">
                                <i class="pi pi-exclamation-triangle text-500 mr-3 text-xl"></i>
                                <span>
                            <span class="block text-700 font-medium">Warnings</span>
                            <p class="mt-1 mb-0 text-600 text-sm">Did you break the rules!?</p>
                        </span>
                            </Link>
                        </li>
                        <li class="mb-2">
                            <Link
                                :class="route().current('account.details') ? 'border-green-500' : ''"
                                class="flex p-2 align-items-start hover:bg-green-100 border-transparent border-1 hover:border-100 border-round cursor-pointer transition-colors transition-duration-150 p-ripple"
                                v-ripple :href="$route('account.details')">
                                <i class="pi pi-cog text-500 mr-3 text-xl"></i>
                                <span>
                            <span class="block text-700 font-medium">Account Info</span>
                            <p class="mt-1 mb-0 text-600 text-sm">Your details inside</p>
                        </span>
                            </Link>
                        </li>
                    </ul>
                </li>
                <li class="mb-2 text-center">
                    <Link
                        class="block p-2 font-medium text-700 hover:bg-green-100 border-transparent border-1 hover:border-100 border-round cursor-pointer transition-colors transition-duration-150 p-ripple"
                        v-ripple method="post" :href="$route('logout')">
                        <span class="pi pi-lock mr-2"></span>
                        <span class="font-medium">Logout</span>
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
import Tooltip from "primevue/tooltip";
import Ripple from "primevue/ripple";
import StyleClass from "primevue/styleclass";

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
    props: {},
    directives: {
        "badge": BadgeDirective,
        "tooltip": Tooltip,
        "ripple": Ripple,
        "styleclass": StyleClass
    }
};
</script>
