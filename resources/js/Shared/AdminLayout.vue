<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <admin-aside-menu />
            </div>
            <div class="col-10">
                <slot />
            </div>
        </div>
    </div>
</template>

<script>


import AdminHeader from "@/Pages/Admin/Partials/AdminHeader";
import AdminFooter from "@/Pages/Admin/Partials/AdminFooter";
import AdminAsideMenu from "@/Pages/Admin/Partials/AdminAsideMenu";
import FlashMessages from "@/Shared/FlashMessages";

export default {
    name: "AdminLayout",
    components: { FlashMessages, AdminFooter, AdminHeader, AdminAsideMenu }
};
</script>

<style scoped>

</style>
