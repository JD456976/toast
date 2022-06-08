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
                            <Link class="nav-link" :href="$route('admin.user.edit', this.user.id)">
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
                            <div class="col-8 tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                     aria-labelledby="dashboard-tab">
                                    <div class="card">
                                    </div>
                                    <div class="card-header">
                                        <h3 class="mb-0">{{ user.name }}'s Page</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            From your account dashboard. you can easily check &amp; view your <a
                                            href="#">recent orders</a>,<br />
                                            manage your <a href="#">shipping and billing addresses</a> and <a
                                            href="#">edit your password and account details.</a>
                                        </p>
                                    </div>
                                </div>
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
