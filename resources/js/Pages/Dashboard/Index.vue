<template>
    <Head>
        <title>Your Dashboard</title>
        <meta name="description" content="Your Dashboard">
    </Head>
    <div class="tab-content account dashboard-content pl-50">
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
</template>

<script>

import Layout from "../../Shared/Layout";
import { Head } from "@inertiajs/inertia-vue3";

export default {
    components: Head,
    name: "Index",
    props: {
        user: Object
    },
    layout: Layout
};
</script>
