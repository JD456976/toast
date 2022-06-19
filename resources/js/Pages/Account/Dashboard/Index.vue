<template>
    <Head>
        <title>Your Dashboard</title>
        <meta name="description" content="Your Dashboard">
    </Head>
    <div class="page-content pt-50 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <dash-menu :user="user" />
                        <div class="col-md-9">
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
        user: Object
    },
    methods: {
        isUrl(...urls) {
            let currentUrl = this.$page.url.substr(1);
            if (urls[0] === "") {
                return currentUrl === "";
            }
            return urls.filter((url) => currentUrl.startsWith(url)).length;
        }
    }
};
</script>
