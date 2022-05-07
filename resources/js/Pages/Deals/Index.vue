<template>
    <Head>
        <title>Your Deals</title>
        <meta name="description" content="Your posted deals">
    </Head>
    <div class="tab-pane" id="deals"
    ><h5 v-if="deals.length <= 0">No Deals to Display</h5>
        <div v-else class="card">
            <div class="card-header">
                <h3 class="mb-0">Your Deals</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Posted</th>
                            <th>Status</th>
                            <th>Title</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="deal in deals" :key="deal.id">
                            <td>{{ deal.id }}</td>
                            <td>{{ formatDate(deal.created_at) }}</td>
                            <td>
                                <span v-if="deal.is_active == 1" class="badge bg-success">Active</span>
                                <span v-else-if="deal.is_active == 0" class="badge bg-danger">Deactive</span>
                            </td>
                            <td>{{ deal.title }}</td>
                            <td>
                                <Link :href="$route('deal.show',deal.slug)">View Deal</Link>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Layout from "../../Shared/Layout";
import dayjs from "dayjs";
import { Head } from "@inertiajs/inertia-vue3";


export default {
    name: "Index",
    components: Head,
    props: {
        deals: Array
    },
    layout: Layout,

    methods: {
        formatDate(dateString) {
            const date = dayjs(dateString);
            // Then specify how you want your dates to be formatted
            return date.format("dddd MMMM D, YYYY");
        }
    }
};
</script>
