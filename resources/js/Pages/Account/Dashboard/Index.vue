<template>
    <Head>
        <title>Your Dashboard</title>
        <meta name="description" content="Your Dashboard">
    </Head>
    <div class="p-4">
        <div class="surface-border border-round surface-card" style="min-height: 20rem">
            <div class="grid">
                <dash-menu class="col-3" :user="user" :avatar="avatar" />
                <div class="col-4 px-5 flex flex-column flex-auto">
                    <div>
                        <Card style="margin-bottom: 2em">
                            <template #title>
                                Welcome {{ user.name }}
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
import DashMenu from "@/Shared/DashMenu";
import Card from "primevue/card";


export default {
    components: {
        Head,
        DashMenu,
        Link,
        Card
    },
    name: "Index",
    props: {
        user: Object,
        avatar: String
    }
};
</script>
