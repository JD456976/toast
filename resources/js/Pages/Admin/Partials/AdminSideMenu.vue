<template>
    <div id="app-sidebar"
         class="surface-section h-full lg:h-auto hidden lg:block flex-shrink-0 absolute lg:static left-0 top-0 z-1 border-right-1 surface-border select-none"
         style="width:280px">
        <div class="flex flex-column h-full">
            <div class="flex align-items-center px-5 flex-shrink-0" style="height:60px">
                <Link :href="$route('deal.index')">
                    <img src="/assets/frontend/imgs/theme/logo.svg" alt="logo" />
                </Link>
            </div>
            <div class="overflow-y-auto">
                <ul class="list-none p-2 m-0">
                    <li>
                        <div class="p-3 text-500 font-medium">HOME</div>
                    </li>
                    <li>
                        <Link v-ripple
                              class="flex align-items-center cursor-pointer p-3 text-blue-500 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                              :href="$route('admin.dashboard')">
                            <i class="pi pi-home mr-2"></i>
                            <span class="font-medium">Dashboard</span>
                        </Link>
                    </li>
                </ul>
                <ul class="list-none p-2 m-0 border-top-1 surface-border">
                    <li>
                        <div class="p-3 text-500 font-medium">USERS</div>
                    </li>
                    <li>
                        <Link v-ripple
                              class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                              :href="$route('admin.user.index')">
                            <i class="pi pi-users mr-2"></i>
                            <span class="font-medium">All Users</span>
                        </Link>
                    </li>
                    <li>
                        <a v-ripple
                           class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                           v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                            <i class="pi pi-file mr-2"></i>
                            <span class="font-medium">User Roles</span>
                            <div class="ml-auto">
                                <i class="pi pi-chevron-down ml-2"></i>
                            </div>
                        </a>
                        <ul
                            class="list-none py-0 pl-3 pr-0 m-0 hidden overflow-y-hidden transition-all transition-duration-400 transition-ease-in-out">
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      href="/admin/roles">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">Users With Roles</span>
                                </Link>
                            </li>
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.user.roles')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">Assign User Roles</span>
                                </Link>
                            </li>
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      href="/admin/roles/roles">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">Add New Roles</span>
                                </Link>
                            </li>
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      href="/admin/roles/permissions">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">Add New Permission</span>
                                </Link>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <Link v-ripple
                              class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                              :href="$route('admin.reset-password')">
                            <i class="pi pi-users mr-2"></i>
                            <span class="font-medium">Reset User Password</span>
                        </Link>
                    </li>
                    <li>
                        <Link v-ripple
                              class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                              :href="$route('admin.report.index')">
                            <i class="pi pi-users mr-2"></i>
                            <span class="font-medium">Reports</span>
                        </Link>
                    </li>
                    <li>
                        <Link v-ripple
                              class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                              :href="$route('admin.warn.index')">
                            <i class="pi pi-users mr-2"></i>
                            <span class="font-medium">Warnings</span>
                        </Link>
                    </li>
                </ul>
                <ul class="list-none p-2 m-0 border-top-1 surface-border">
                    <li>
                        <div class="p-3 text-500 font-medium">STORES</div>
                    </li>
                    <li>
                        <a v-ripple
                           class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                           v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                            <i class="pi pi-file mr-2"></i>
                            <span class="font-medium">Stores</span>
                            <div class="ml-auto">
                                <i class="pi pi-chevron-down ml-2"></i>
                            </div>
                        </a>
                        <ul
                            class="list-none py-0 pl-3 pr-0 m-0 hidden overflow-y-hidden transition-all transition-duration-400 transition-ease-in-out">
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.store.index')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">All Stores</span>
                                </Link>
                            </li>
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.store.create')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">Add New Store</span>
                                </Link>
                            </li>
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.store-category.index')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">Store Categories</span>
                                </Link>
                            </li>
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.store-category.create')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">Add Store Category</span>
                                </Link>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="list-none p-2 m-0 border-top-1 surface-border">
                    <li>
                        <div class="p-3 text-500 font-medium">PRODUCTS</div>
                    </li>
                    <li>
                        <a v-ripple
                           class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                           v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                            <i class="pi pi-file mr-2"></i>
                            <span class="font-medium">Products</span>
                            <div class="ml-auto">
                                <i class="pi pi-chevron-down ml-2"></i>
                            </div>
                        </a>
                        <ul
                            class="list-none py-0 pl-3 pr-0 m-0 hidden overflow-y-hidden transition-all transition-duration-400 transition-ease-in-out">
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.product.index')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">All Products</span>
                                </Link>
                            </li>
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.product.create')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">Add New Product</span>
                                </Link>
                            </li>
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.product-category.index')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">Product Categories</span>
                                </Link>
                            </li>
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.product-category.create')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">Add Product Category</span>
                                </Link>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="list-none p-2 m-0 border-top-1 surface-border">
                    <li>
                        <div class="p-3 text-500 font-medium">BRANDS</div>
                    </li>
                    <li>
                        <a v-ripple
                           class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                           v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                            <i class="pi pi-file mr-2"></i>
                            <span class="font-medium">Brands</span>
                            <div class="ml-auto">
                                <i class="pi pi-chevron-down ml-2"></i>
                            </div>
                        </a>
                        <ul
                            class="list-none py-0 pl-3 pr-0 m-0 hidden overflow-y-hidden transition-all transition-duration-400 transition-ease-in-out">
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.brand.index')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">All Brands</span>
                                </Link>
                            </li>
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.brand.create')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">Add New Brand</span>
                                </Link>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="list-none p-2 m-0 border-top-1 surface-border">
                    <li>
                        <div class="p-3 text-500 font-medium">DEALS</div>
                    </li>
                    <li>
                        <Link v-ripple
                              class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                              :href="$route('admin.deal.index')">
                            <i class="pi pi-users mr-2"></i>
                            <span class="font-medium">All Deals</span>
                        </Link>
                    </li>
                </ul>
                <ul class="list-none p-2 m-0 border-top-1 surface-border">
                    <li>
                        <div class="p-3 text-500 font-medium">BOUNTIES</div>
                    </li>
                    <li>
                        <Link v-ripple
                              class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                              :href="$route('admin.bounty.index')">
                            <i class="pi pi-users mr-2"></i>
                            <span class="font-medium">All Bounties</span>
                        </Link>
                    </li>
                </ul>
                <ul class="list-none p-2 m-0 border-top-1 surface-border">
                    <li>
                        <div class="p-3 text-500 font-medium">PAGES</div>
                    </li>
                    <li>
                        <a v-ripple
                           class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                           v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                            <i class="pi pi-file mr-2"></i>
                            <span class="font-medium">Site Pages</span>
                            <div class="ml-auto">
                                <i class="pi pi-chevron-down ml-2"></i>
                            </div>
                        </a>
                        <ul
                            class="list-none py-0 pl-3 pr-0 m-0 hidden overflow-y-hidden transition-all transition-duration-400 transition-ease-in-out">
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.page.index')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">All Pages</span>
                                </Link>
                            </li>
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.page.create')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">Add New Page</span>
                                </Link>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="list-none p-2 m-0 border-top-1 surface-border">
                    <li>
                        <div class="p-3 text-500 font-medium">ANNOUNCEMENTS</div>
                    </li>
                    <li>
                        <a v-ripple
                           class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                           v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                            <i class="pi pi-file mr-2"></i>
                            <span class="font-medium">Announcements</span>
                            <div class="ml-auto">
                                <i class="pi pi-chevron-down ml-2"></i>
                            </div>
                        </a>
                        <ul
                            class="list-none py-0 pl-3 pr-0 m-0 hidden overflow-y-hidden transition-all transition-duration-400 transition-ease-in-out">
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.announcement.index')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">All Announcements</span>
                                </Link>
                            </li>
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.announcement.create')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">Add New Announcements</span>
                                </Link>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="list-none p-2 m-0 border-top-1 surface-border">
                    <li>
                        <div class="p-3 text-500 font-medium">BLOG</div>
                    </li>
                    <li>
                        <a v-ripple
                           class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                           v-styleclass="{ selector: '@next', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                            <i class="pi pi-file mr-2"></i>
                            <span class="font-medium">Blogs</span>
                            <div class="ml-auto">
                                <i class="pi pi-chevron-down ml-2"></i>
                            </div>
                        </a>
                        <ul
                            class="list-none py-0 pl-3 pr-0 m-0 hidden overflow-y-hidden transition-all transition-duration-400 transition-ease-in-out">
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.blog.index')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">All Blog Posts</span>
                                </Link>
                            </li>
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.blog.create')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">Add New Blog Post</span>
                                </Link>
                            </li>
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.blog-category.index')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">Blog Categories</span>
                                </Link>
                            </li>
                            <li>
                                <Link v-ripple
                                      class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                                      :href="$route('admin.blog-category.create')">
                                    <i class="pi pi-users mr-2"></i>
                                    <span class="font-medium">Add Blog Category</span>
                                </Link>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="list-none p-2 m-0 border-top-1 surface-border">
                    <li>
                        <div class="p-3 text-500 font-medium">SETTINGS</div>
                    </li>
                    <li>
                        <Link v-ripple
                              class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                              :href="$route('admin.settings.index')">
                            <i class="pi pi-users mr-2"></i>
                            <span class="font-medium">Site Settings</span>
                        </Link>
                    </li>
                </ul>
            </div>
            <div class="p-2 mt-auto border-top-1 surface-border">
                <ul class="list-none p-2 m-0 hidden origin-bottom animation-duration-150">
                    <li>
                        <Link
                            class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                            v-ripple method="post" :href="$route('account.dashboard')">
                            <i class="pi pi-user mr-2"></i>
                            <span class="font-medium">Profile</span>
                        </Link>
                    </li>
                    <li>
                        <Link
                            class="flex align-items-center cursor-pointer p-3 text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                            v-ripple method="post" :href="$route('logout')">
                            <i class="pi pi-lock mr-2"></i>
                            <span class="font-medium">Logout</span>
                        </Link>
                    </li>
                </ul>
                <a v-ripple
                   class="p-3 flex align-items-center cursor-pointer text-700 hover:surface-100 border-round transition-colors transition-duration-150 p-ripple"
                   v-styleclass="{ selector: '@prev', enterClass: 'hidden', enterActiveClass: 'scalein', leaveToClass: 'hidden', leaveActiveClass: 'fadeout' }">
                    <Avatar class="mr-2"
                            style="width: 28px; height: 28px"
                            :image="user.avatar"
                            shape="circle"></Avatar>
                    <span class="font-medium">{{ user.name }}</span>
                    <i class="pi pi-chevron-up ml-auto"></i>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import Tooltip from "primevue/tooltip";
import Ripple from "primevue/ripple";
import StyleClass from "primevue/styleclass";
import BadgeDirective from "primevue/badgedirective";

export default {
    name: "AdminSideMenu",
    directives: {
        "tooltip": Tooltip,
        "ripple": Ripple,
        "styleclass": StyleClass,
        "badge": BadgeDirective
    },
    props: {
        user: Object
    }
};
</script>
<style>
body a {
    text-decoration: none;
}
</style>
