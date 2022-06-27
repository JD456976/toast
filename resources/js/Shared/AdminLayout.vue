<template>

    <div class="p-4">
        <div class="grid no-underline surface-border border-round surface-card" style="min-height: 20rem">
            <div class="col-2 mr-8">
                <admin-side-menu />
            </div>
            <div class="col-9">
                <slot />
            </div>

        </div>
    </div>
</template>

<script>


import AdminHeader from "@/Pages/Admin/Partials/AdminHeader";
import AdminFooter from "@/Pages/Admin/Partials/AdminFooter";
import FlashMessages from "@/Shared/FlashMessages";
import AdminSideMenu from "@/Pages/Admin/Partials/AdminSideMenu";

export default {
    name: "AdminLayout",
    components: { AdminSideMenu, FlashMessages, AdminFooter, AdminHeader }
};
</script>

<style lang="scss" scoped>
@import "~primeflex/primeflex.css";

</style>
