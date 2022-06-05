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
                        <dash-menu />
                        <div class="col-md-9">
                            <div class="col-8 tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                     aria-labelledby="dashboard-tab">
                                    <div class="card">
                                    </div>
                                    <div class="card-header">
                                        <h3 class="mb-0">Hello!!! {{ user.name }}!</h3>
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
import DashMenu from "@/Shared/DashMenu";
import Icon from "@/Shared/Icon";


export default {
    components: {
        Head,
        DashMenu,
        Link,
        Icon
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
