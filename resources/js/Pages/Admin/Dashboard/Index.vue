<template>
    <Head>
        <title>Admin Dashboard</title>
        <meta name="description" content="Admin Dashboard">
    </Head>

    <div class="surface-ground px-4 py-5 md:px-6 lg:px-8">
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
                        <div class="flex align-items-center justify-content-center bg-orange-100 border-round"
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
                        <div class="flex align-items-center justify-content-center bg-purple-100 border-round"
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
    <div class="surface-ground px-4 py-5 md:px-6 lg:px-8">
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
                        <div class="flex align-items-center justify-content-center bg-orange-100 border-round"
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
                        <div class="flex align-items-center justify-content-center bg-purple-100 border-round"
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
</template>

<script>
import AdminLayout from "@/Shared/AdminLayout";
import { Head } from "@inertiajs/inertia-vue3";
import AsideMenu from "@/Pages/Admin/Partials/AdminAsideMenu";
import "primeflex/primeflex.css";

export default {
    name: "Index",
    layout: AdminLayout,
    components: {
        AsideMenu,
        Head
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

<style scoped>

</style>
