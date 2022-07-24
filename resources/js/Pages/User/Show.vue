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
                                <div class="surface-ground">
                                    <div class="grid">
                                        <div v-for="item in user.views" class="col-12 md:col-6 xl:col-4 p-3">
                                            <div class="surface-card shadow-2 border-rounded p-4">
                                                <div class="flex border-bottom-1 surface-border pb-4">
                                                    <img :src="item.user.avatar" alt="" class="mr-3"
                                                         style="width: 70px; height: 70px">
                                                    <div class="flex flex-column align-items-start">
                                                <span class="text-lg text-900 font-medium mb-1">{{ item.user.name
                                                    }}</span>
                                                        <span class="text-600 font-medium mb-2">website</span>
                                                        <span
                                                            class="bg-blue-50 text-blue-400 border-round inline-flex py-1 px-2 text-sm">Editor</span>
                                                    </div>
                                                </div>
                                                <div class="flex justify-content-between pt-4">

                                                    <Link :href="$route('user.show', item.user.slug)">
                                                        <Button label="View" icon="pi pi-search"
                                                                class="p-button-outlined p-button-secondary w-100 mr-2" />
                                                    </Link>

                                                    <Link method="post" :href="$route('follow.store', item.user.id)">
                                                        <Button label="Follow" icon="pi pi-user-plus"
                                                                class="p-button-outlined p-button-secondary w-100 mr-2" />
                                                    </Link>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        admin: Boolean,
        views: Array
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
