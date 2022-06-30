<template>
    <Head>
        <title>{{ user.name}}'s Page</title>
        <meta name="description" content="User Page">
    </Head>
    <div class="p-4">
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
        <div class="surface-border border-round surface-card" style="min-height: 20rem">
            <div class="grid">
                <user-dash-menu class="col-3" :user="user" />
                <div class="col-4 px-5 flex flex-column flex-auto">
                    <div>
                        <Card style="margin-bottom: 2em">
                            <template #title>
                                {{ user.name }}'s Page
                            </template>
                            <template #content>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore sed
                                    consequuntur error repudiandae numquam deserunt
                                    quisquam repellat libero asperiores earum nam nobis, culpa ratione quam
                                    perferendis esse, cupiditate neque quas!</p>
                            </template>
                        </Card>
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
import Card from "primevue/card";

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
        Link,
        Card
    }
};
</script>

<style scoped>

</style>
