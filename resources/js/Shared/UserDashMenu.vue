<template>
    <div class="col-md-3">
        <div class="surface-card border-round shadow-2 select-none">
            <ul class="list-none p-2 m-0">
                <li>
                    <a v-ripple class="flex p-2 align-items-center cursor-pointer p-ripple"
                       v-styleclass="{ selector: '#pb_profile_submenu', enterClass: 'hidden', enterActiveClass: 'slidedown', leaveToClass: 'hidden', leaveActiveClass: 'slideup' }">
                <span class="mr-3 inline-flex">
                     <img :src="user.avatar" width="42" height="42" />
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
                                v-ripple :href="$route('user.show', user.slug)">
                                <i class="pi pi-info-circle text-500 mr-3 text-xl"></i>
                                <span>
                            <span class="block text-700 font-medium">Info</span>
                            <p class="mt-1 mb-0 text-600 text-sm">{{ user.name }}'s Info</p>
                        </span>
                            </Link>
                        </li>
                        <li class="mb-2">
                            <Link
                                :class="route().current('user.deals') ? 'border-green-500' : ''"
                                class="flex p-2 align-items-start hover:bg-green-100 border-transparent border-1 hover:border-100 border-round cursor-pointer transition-colors transition-duration-150 p-ripple"
                                v-ripple :href="$route('user.deals', user.id)">
                                <i class="pi pi-money-bill text-500 mr-3 text-xl"></i>
                                <span>
                            <span class="block text-700 font-medium">Deals</span>
                            <p class="mt-1 mb-0 text-600 text-sm">{{ user.name }}'s Deals</p>
                        </span>
                            </Link>
                        </li>
                        <li class="mb-2">
                            <Link
                                :class="route().current('user.bounties') ? 'border-green-500' : ''"
                                class="flex p-2 align-items-start hover:bg-green-100 border-transparent border-1 hover:border-100 border-round cursor-pointer transition-colors transition-duration-150 p-ripple"
                                v-ripple :href="$route('user.bounties',user.id)">
                                <i class="pi pi-user-plus text-500 mr-3 text-xl"></i>
                                <span>
                            <span class="block text-700 font-medium">Bounties</span>
                            <p class="mt-1 mb-0 text-600 text-sm">{{ user.name }}'s Bounties</p>
                        </span>
                            </Link>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import BadgeDirective from "primevue/badgedirective";
import Tooltip from "primevue/tooltip";
import Ripple from "primevue/ripple";
import StyleClass from "primevue/styleclass";

export default {
    name: "UserDashMenu",
    props: {
        user: Object
    },
    components: {
        Link
    },
    directives: {
        "badge": BadgeDirective,
        "tooltip": Tooltip,
        "ripple": Ripple,
        "styleclass": StyleClass
    }
};
</script>

<style scoped>

</style>
