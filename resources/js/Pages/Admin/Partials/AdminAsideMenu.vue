<template>
    <PanelMenu :model="items" />
</template>

<script>

import { Link } from "@inertiajs/inertia-vue3";
import PanelMenu from "primevue/panelmenu";

export default {
    name: "AdminAsideMenu",
    components: {
        Link,
        PanelMenu
    },
    data() {
        return {
            items: [{
                key: "0",
                label: "Main Site",
                icon: "pi pi-fw pi-home",
                url: "/"
            },
                {
                    key: "1",
                    label: "Users",
                    icon: "pi pi-fw pi-users",
                    items: [{
                        key: "1_0",
                        label: "All Users",
                        icon: "pi pi-users pi-align-left",
                        url: route("admin.user.index")
                    },
                        {
                            key: "1_1",
                            label: "Users With Roles",
                            icon: "pi pi-th-large pi-align-right",
                            url: route("admin.user.roles")
                        },
                        {
                            key: "1_2",
                            label: "Reset User Password",
                            icon: "pi pi-spinner pi-align-center",
                            url: route("admin.reset-password")
                        }
                    ]
                },
                {
                    key: "2",
                    label: "Assign User Roles",
                    icon: "pi pi-fw pi-th-large",
                    items: [{
                        key: "2_0",
                        label: "Assign Role",
                        icon: "pi pi-fw pi-plus-circle",
                        url: "/admin/roles"
                    },
                        {
                            key: "2_1",
                            label: "Add New Role",
                            icon: "pi pi-fw pi-plus-circle",
                            url: "/admin/roles/roles"
                        },
                        {
                            key: "2_2",
                            label: "Add New Permission",
                            icon: "pi pi-fw pi-plus-circle",
                            url: "/admin/roles/permissions"
                        }
                    ]
                },
                {
                    key: "3",
                    label: "Reports",
                    icon: "pi pi-fw pi-print",
                    items: [{
                        key: "3_0",
                        label: "All Reports",
                        icon: "pi pi-fw pi-print",
                        url: route("admin.report.index")
                    }
                    ]
                },
                {
                    key: "4",
                    label: "Warnings",
                    icon: "pi pi-fw pi-exclamation-triangle",
                    items: [{
                        key: "3_0",
                        label: "All Warnings",
                        icon: "pi pi-fw pi-exclamation-triangle",
                        url: route("admin.warn.index")
                    }
                    ]
                },
                {
                    key: "5",
                    label: "Stores",
                    icon: "pi pi-fw pi-credit-card",
                    items: [{
                        key: "5_1",
                        label: "All Stores",
                        icon: "pi pi-fw pi-credit-card",
                        url: route("admin.store.index")
                    },
                        {
                            key: "5_2",
                            label: "Add Store",
                            icon: "pi pi-fw pi-credit-card",
                            url: route("admin.store.create")
                        },
                        {
                            key: "5_3",
                            label: "Store Categories",
                            icon: "pi pi-fw pi-credit-card",
                            url: route("admin.store-category.index")
                        },
                        {
                            key: "5_4",
                            label: "Add Store Category",
                            icon: "pi pi-fw pi-credit-card",
                            url: route("admin.store-category.create")
                        }
                    ]
                },
                {
                    key: "6",
                    label: "Brands",
                    icon: "pi pi-fw pi-chart-bar",
                    items: [{
                        key: "6_1",
                        label: "All Brands",
                        icon: "pi pi-fw pi-chart-bar",
                        url: route("admin.brand.index")
                    },
                        {
                            key: "6_2",
                            label: "Add Brand",
                            icon: "pi pi-fw pi-chart-bar",
                            url: route("admin.brand.create")
                        }
                    ]
                },
                {
                    key: "7",
                    label: "Deals",
                    icon: "pi pi-fw pi-shopping-cart",
                    items: [{
                        key: "7_1",
                        label: "All Deals",
                        icon: "pi pi-fw pi-shopping-cart",
                        url: route("admin.deal.index")
                    }
                    ]
                },
                {
                    key: "8",
                    label: "Bounties",
                    icon: "pi pi-fw pi-money-bill",
                    items: [{
                        key: "8_1",
                        label: "All Bounties",
                        icon: "pi pi-fw pi-money-bill",
                        url: route("admin.bounty.index")
                    }
                    ]
                },
                {
                    key: "9",
                    label: "Products",
                    icon: "pi pi-fw pi-box",
                    items: [{
                        key: "9_1",
                        label: "All Products",
                        icon: "pi pi-fw pi-box",
                        url: route("admin.product.index")
                    },
                        {
                            key: "9_2",
                            label: "Add Product",
                            icon: "pi pi-fw pi-box",
                            url: route("admin.product.create")
                        },
                        {
                            key: "9_3",
                            label: "Product Categories",
                            icon: "pi pi-fw pi-box",
                            url: route("admin.product-category.index")
                        },
                        {
                            key: "9_4",
                            label: "Add Product Category",
                            icon: "pi pi-fw pi-box",
                            url: route("admin.product-category.create")
                        }
                    ]
                },
                {
                    key: "10",
                    label: "Site Pages",
                    icon: "pi pi-fw pi-copy",
                    items: [{
                        key: "10_1",
                        label: "All Pages",
                        icon: "pi pi-fw pi-copy",
                        url: route("admin.page.index")
                    },
                        {
                            key: "10_2",
                            label: "Add New Page",
                            icon: "pi pi-fw pi-copy",
                            url: route("admin.page.create")
                        }
                    ]
                },
                {
                    key: "11",
                    label: "Announcements",
                    icon: "pi pi-fw pi-volume-up",
                    items: [{
                        key: "11_1",
                        label: "All Announcements",
                        icon: "pi pi-fw pi-volume-up",
                        url: route("admin.announcement.index")
                    },
                        {
                            key: "11_2",
                            label: "Add New Announcements",
                            icon: "pi pi-fw pi-volume-up",
                            url: route("admin.announcement.create")
                        }
                    ]
                },
                {
                    key: "12",
                    label: "Blog",
                    icon: "pi pi-fw pi-pencil",
                    items: [{
                        key: "12_1",
                        label: "All Blog Posts",
                        icon: "pi pi-fw pi-pencil",
                        url: route("admin.blog.index")
                    },
                        {
                            key: "12_2",
                            label: "Add Blog Post",
                            icon: "pi pi-fw pi-pencil",
                            url: route("admin.blog.create")
                        },
                        {
                            key: "12_3",
                            label: "Blog Categories",
                            icon: "pi pi-fw pi-pencil",
                            url: route("admin.blog-category.index")
                        },
                        {
                            key: "12_4",
                            label: "Add Blog Category",
                            icon: "pi pi-fw pi-pencil",
                            url: route("admin.blog-category.create")
                        }
                    ]
                },
                {
                    key: "13",
                    label: "Settings",
                    icon: "pi pi-fw pi-sitemap",
                    items: [{
                        key: "13_1",
                        label: "All Settings",
                        icon: "pi pi-fw pi-sitemap",
                        url: route("admin.settings.index")
                    }
                    ]
                }
            ]
        };
    }
};
</script>

<style scoped>

</style>
