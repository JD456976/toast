<template>

    <div class="p-4">
        <flash-messages />
        <ScrollTop />
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

<script setup>
import FlashMessages from "@/Shared/FlashMessages";
import AdminSideMenu from "@/Pages/Admin/Partials/AdminSideMenu";</script>

<script>


export default {
    name: "AdminLayout"
};
</script>

<style lang="scss" scoped>
@import "~primeflex/primeflex.css";

body a {
    text-decoration: none !important;
}

</style>
