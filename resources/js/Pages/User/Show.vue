<template>
    <Head>
        <title>{{ user.name}}'s Page</title>
        <meta name="description" content="User Page">
    </Head>
    <div class="page-content pt-50 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <Toolbar v-if="admin" class="mb-50">
                        <template #start>
                            <Link class="nav-link" :href="$route('admin.user.edit', user.id)">
                                <Button label="Edit User" icon="pi pi-pencil" class="mr-2" />
                            </Link>
                        </template>

                        <template #end>
                            <warn-user :user="user" />
                        </template>
                    </Toolbar>
                    <div class="row">
                        <user-dash-menu :user="user" />
                        <div class="col-md-9">
                            <div class="p-card p-component" style="margin-bottom: 2em;"><!---->
                                <div class="p-card-body">
                                    <div class="p-card-title"> {{ user.name }}'s page</div><!---->
                                    <div class="p-card-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit. Inventore sed consequuntur error repudiandae numquam deserunt quisquam
                                        repellat libero asperiores earum nam nobis, culpa ratione quam perferendis esse,
                                        cupiditate neque quas!</p></div><!----></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import UserDashMenu from "@/Shared/UserDashMenu";
import Button from "primevue/button";
import WarnUser from "@/Shared/WarnUser";
import Toolbar from "primevue/toolbar";

export default {
    name: "Show",
    props: {
        user: Object,
        admin: Boolean
    },
    components: {
        Head,
        UserDashMenu,
        Button,
        WarnUser,
        Toolbar,
        Link
    }
};
</script>

<style scoped>

</style>
