<template>
    <Head>
        <title>Admin Dashboard</title>
        <meta name="description" content="Admin Dashboard">
    </Head>

    <div class="no-underline min-h-screen flex relative lg:static surface-ground">
        
        <div class="min-h-screen flex flex-column relative flex-auto">
            <div
                class="flex justify-content-between align-items-center px-5 surface-0 border-bottom-1 surface-border relative lg:static"
                style="height:60px">
                <div class="flex">
                    <a v-ripple class="cursor-pointer block lg:hidden text-700 mr-3 mt-1 p-ripple"
                       v-styleclass="{ selector: '#app-sidebar', enterClass: 'hidden', enterActiveClass: 'fadeinleft', leaveToClass: 'hidden', leaveActiveClass: 'fadeoutleft', hideOnOutsideClick: true }">
                        <i class="pi pi-bars text-4xl"></i>
                    </a>
                    <span class="p-input-icon-left">
                    <i class="pi pi-search"></i>
                    <InputText type="text" class="border-none w-10rem sm:w-20rem" placeholder="Search" />
                </span>
                </div>
                <a v-ripple class="cursor-pointer block lg:hidden text-700 p-ripple"
                   v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'fadein', leaveToClass: 'hidden', leaveActiveClass: 'fadeout', hideOnOutsideClick: true }">
                    <i class="pi pi-ellipsis-v text-2xl"></i>
                </a>
                <ul class="list-none p-0 m-0 hidden lg:flex lg:align-items-center select-none lg:flex-row
                surface-section border-1 lg:border-none surface-border right-0 top-100 z-1 shadow-2 lg:shadow-none absolute lg:static">
                    <li>
                        <a v-ripple class="flex p-3 lg:px-3 lg:py-2 align-items-center text-600 hover:text-900 hover:surface-100 font-medium border-round cursor-pointer
                        transition-duration-150 transition-colors p-ripple">
                            <i class="pi pi-inbox text-base lg:text-2xl mr-2 lg:mr-0"></i>
                            <span class="block lg:hidden font-medium">Inbox</span>
                        </a>
                    </li>
                    <li>
                        <a v-ripple class="flex p-3 lg:px-3 lg:py-2 align-items-center text-600 hover:text-900 hover:surface-100 font-medium border-round cursor-pointer
                        transition-duration-150 transition-colors p-ripple">
                            <i class="pi pi-bell text-base lg:text-2xl mr-2 lg:mr-0" v-badge.danger></i>
                            <span class="block lg:hidden font-medium">Notifications</span>
                        </a>
                    </li>
                    <li class="border-top-1 surface-border lg:border-top-none">
                        <a v-ripple class="flex p-3 lg:px-3 lg:py-2 align-items-center hover:surface-100 font-medium border-round cursor-pointer
                        transition-duration-150 transition-colors p-ripple">
                            <Avatar class="mr-2 lg:mr-0"
                                    style="width: 32px; height: 32px"
                                    image="https://i.pravatar.cc/300"
                                    shape="circle"></Avatar>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-column flex-auto">
                <div class="p-5">
                    <div class="grid">
                        <div class="col-12 md:col-6 lg:col-3">
                            <div class="surface-card shadow-2 p-3 border-round">
                                <div class="flex justify-content-between mb-3">
                                    <div>
                                        <span class="block text-500 font-medium mb-3">Total Deals</span>
                                        <div class="text-900 font-medium text-xl">{{ deals.length }}</div>
                                    </div>
                                    <div class="flex align-items-center justify-content-center bg-blue-100 border-round"
                                         style="width:2.5rem;height:2.5rem">
                                        <i class="pi pi-shopping-cart text-blue-500 text-xl"></i>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-green-500 font-medium">{{ featuredDeals.length }} </span>
                                    <span class="text-500"> Featured Deals</span>
                                </div>
                                <div>
                                    <span class="text-green-500 font-medium">{{ activeDeals.length }} </span>
                                    <span class="text-500"> Active Deals</span>
                                </div>
                                <div>
                                    <span class="text-green-500 font-medium">{{ frontPageDeals.length }} </span>
                                    <span class="text-500"> Frontpage Deals</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 md:col-6 lg:col-3">
                            <div class="surface-card shadow-2 p-3 border-round">
                                <div class="flex justify-content-between mb-3">
                                    <div>
                                        <span class="block text-500 font-medium mb-3">Total Reports</span>
                                        <div class="text-900 font-medium text-xl">{{ reports.length }}</div>
                                    </div>
                                    <div
                                        class="flex align-items-center justify-content-center bg-orange-100 border-round"
                                        style="width:2.5rem;height:2.5rem">
                                        <i class="pi pi-flag text-orange-500 text-xl"></i>
                                    </div>
                                </div>
                                <span class="text-green-500 font-medium">%52+ </span>
                                <span class="text-500">since last week</span>
                            </div>
                        </div>
                        <div class="col-12 md:col-6 lg:col-3">
                            <div class="surface-card shadow-2 p-3 border-round">
                                <div class="flex justify-content-between mb-3">
                                    <div>
                                        <span class="block text-500 font-medium mb-3">Total Bounties</span>
                                        <div class="text-900 font-medium text-xl">{{ bounties.length }}</div>
                                    </div>
                                    <div class="flex align-items-center justify-content-center bg-cyan-100 border-round"
                                         style="width:2.5rem;height:2.5rem">
                                        <i class="pi pi-wallet text-cyan-500 text-xl"></i>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-green-500 font-medium">{{ unverifiedBounties.length }}  </span>
                                    <span class="text-500"> Unverified Bounties</span>
                                </div>
                                <div>
                                    <span class="text-green-500 font-medium">{{ activeBounties.length }}  </span>
                                    <span class="text-500"> Active Bounties</span>
                                </div>
                                <div>
                                    <span class="text-green-500 font-medium">{{ featuredBounties.length }}  </span>
                                    <span class="text-500"> Featured Bounties</span>
                                </div>
                                <div>
                                    <span class="text-green-500 font-medium">{{ filledBounties.length }}  </span>
                                    <span class="text-500"> Filled Bounties</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 md:col-6 lg:col-3">
                            <div class="surface-card shadow-2 p-3 border-round">
                                <div class="flex justify-content-between mb-3">
                                    <div>
                                        <span class="block text-500 font-medium mb-3">Total Comments</span>
                                        <div class="text-900 font-medium text-xl">{{ comments.length }}</div>
                                    </div>
                                    <div
                                        class="flex align-items-center justify-content-center bg-purple-100 border-round"
                                        style="width:2.5rem;height:2.5rem">
                                        <i class="pi pi-comment text-purple-500 text-xl"></i>
                                    </div>
                                </div>
                                <span class="text-green-500 font-medium">{{ reportedComments.length }} </span>
                                <span class="text-500"> Reported Comments</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <div class="grid">
                        <div class="col-12 md:col-6 lg:col-3">
                            <div class="surface-card shadow-2 p-3 border-round">
                                <div class="flex justify-content-between mb-3">
                                    <div>
                                        <span class="block text-500 font-medium mb-3">Total Stores</span>
                                        <div class="text-900 font-medium text-xl">{{ stores.length }}</div>
                                    </div>
                                    <div class="flex align-items-center justify-content-center bg-blue-100 border-round"
                                         style="width:2.5rem;height:2.5rem">
                                        <i class="pi pi-shopping-cart text-blue-500 text-xl"></i>
                                    </div>
                                </div>
                                <span class="text-green-500 font-medium">{{ featuredStores.length }} </span>
                                <span class="text-500"> Featured Stores</span>
                            </div>
                        </div>
                        <div class="col-12 md:col-6 lg:col-3">
                            <div class="surface-card shadow-2 p-3 border-round">
                                <div class="flex justify-content-between mb-3">
                                    <div>
                                        <span class="block text-500 font-medium mb-3">Total Brands</span>
                                        <div class="text-900 font-medium text-xl">{{ brands.length }}</div>
                                    </div>
                                    <div
                                        class="flex align-items-center justify-content-center bg-orange-100 border-round"
                                        style="width:2.5rem;height:2.5rem">
                                        <i class="pi pi-map-marker text-orange-500 text-xl"></i>
                                    </div>
                                </div>
                                <span class="text-green-500 font-medium">{{ featuredBrands.length }} </span>
                                <span class="text-500"> Featured Brands</span>
                            </div>
                        </div>
                        <div class="col-12 md:col-6 lg:col-3">
                            <div class="surface-card shadow-2 p-3 border-round">
                                <div class="flex justify-content-between mb-3">
                                    <div>
                                        <span class="block text-500 font-medium mb-3">Total Products</span>
                                        <div class="text-900 font-medium text-xl">{{ products.length }}</div>
                                    </div>
                                    <div class="flex align-items-center justify-content-center bg-cyan-100 border-round"
                                         style="width:2.5rem;height:2.5rem">
                                        <i class="pi pi-inbox text-cyan-500 text-xl"></i>
                                    </div>
                                </div>
                                <span class="text-green-500 font-medium">520  </span>
                                <span class="text-500">newly registered</span>
                            </div>
                        </div>
                        <div class="col-12 md:col-6 lg:col-3">
                            <div class="surface-card shadow-2 p-3 border-round">
                                <div class="flex justify-content-between mb-3">
                                    <div>
                                        <span class="block text-500 font-medium mb-3">Total Users</span>
                                        <div class="text-900 font-medium text-xl">{{ users.length }}</div>
                                    </div>
                                    <div
                                        class="flex align-items-center justify-content-center bg-purple-100 border-round"
                                        style="width:2.5rem;height:2.5rem">
                                        <i class="pi pi-comment text-purple-500 text-xl"></i>
                                    </div>
                                </div>
                                <span class="text-green-500 font-medium">{{ bannedUsers.length }} </span>
                                <span class="text-500"> Banned Users</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 xl:col-6">
                    <div class="surface-card shadow-2 border-round p-4">
                        <div class="text-xl text-900 font-medium mb-5">Latest News</div>
                        <ul class="list-none p-0 m-0">
                            <li class="pb-3 border-bottom-1 surface-border">
                                <div class="font-medium text-900 mb-2">Aenean euismod elementum</div>
                                <div class="line-height-3 text-600" style="max-width: 30rem">Vitae turpis massa sed
                                    elementum tempus egestas sed sed risus.
                                    In metus vulputate eu scelerisque felis imperdiet proin.
                                </div>
                            </li>
                            <li class="py-3 border-bottom-1 surface-border">
                                <div class="font-medium text-900 mb-2">In iaculis nunc sed augue lacus</div>
                                <div class="line-height-3 text-600" style="max-width: 30rem">Viverra vitae congue. Nisi
                                    scelerisque eu ultrices vitae auctor eu augue ut lectus.
                                    Elementum eu facilisis sed odio morbi.
                                </div>
                            </li>
                            <li class="py-3 border-bottom-1 surface-border">
                                <div class="font-medium text-900 mb-2">Proin sagittis nisl rhoncus</div>
                                <div class="line-height-3 text-600" style="max-width: 30rem">In pellentesque massa
                                    placerat duis ultricies lacus. Ac feugiat sed lectus vestibulum mattis ullamcorper.
                                </div>
                            </li>
                        </ul>
                        <div class="flex justify-content-between pt-3">
                            <Button label="Clear All" class="p-button-outlined p-button-secondary w-6 mr-2"></Button>
                            <Button label="New Entry" class="p-button-outlined w-6 ml-2"></Button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AdminLayout from "@/Shared/AdminLayout";
import { Head } from "@inertiajs/inertia-vue3";
import Button from "primevue/button";
import Tooltip from "primevue/tooltip";
import Ripple from "primevue/ripple";
import StyleClass from "primevue/styleclass";
import BadgeDirective from "primevue/badgedirective";
import InputText from "primevue/inputtext";
import AdminSideMenu from "@/Pages/Admin/Partials/AdminSideMenu";
import Avatar from "primevue/avatar";

export default {
    name: "Index",
    layout: AdminLayout,
    components: {
        AdminSideMenu,
        Head,
        Button,
        InputText,
        Avatar
    },
    directives: {
        "tooltip": Tooltip,
        "ripple": Ripple,
        "styleclass": StyleClass,
        "badge": BadgeDirective
    },
    props: {
        deals: Array,
        comments: Array,
        bounties: Array,
        reports: Array,
        stores: Array,
        products: Array,
        brands: Array,
        users: Array
    },
    computed: {
        unverifiedBounties() {
            return this.bounties.filter(bounty => bounty.is_verified === false);
        },
        filledBounties() {
            return this.bounties.filter(bounty => bounty.is_filled === true);
        },
        activeBounties() {
            return this.bounties.filter(bounty => bounty.is_active === true);
        },
        featuredBounties() {
            return this.bounties.filter(bounty => bounty.is_featured === true);
        },
        featuredDeals() {
            return this.deals.filter(deals => deals.is_featured === true);
        },
        activeDeals() {
            return this.deals.filter(deals => deals.is_active === true);
        },
        frontPageDeals() {
            return this.deals.filter(deals => deals.is_frontpage === true);
        },
        reportedComments() {
            return this.comments.filter(comment => comment.is_reported === true);
        },
        featuredStores() {
            return this.stores.filter(store => store.is_featured === true);
        },
        featuredBrands() {
            return this.brands.filter(brand => brand.is_featured === true);
        },
        bannedUsers() {
            return this.users.filter(user => user.is_banned === true);
        }
    }
};
</script>

<style>
#app-sidebar a {
    text-decoration: none;
}
</style>
