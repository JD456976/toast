<template>
    <Head>
        <title>Your Bounties</title>
        <meta name="description" content="Your Bounties">
    </Head>
    <div class="tab-pane" id="bounties"
    ><h5 v-if="bounties.length <= 0">No Bounties to Display</h5>
        <div v-else class="card">
            <div class="card-header">
                <h3 class="mb-0">Your Bounties</h3>
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
                        <tr v-for="bounty in bounties" :key="bounty.id">
                            <td>{{ bounty.id }}</td>
                            <td>{{ formatDate(bounty.created_at) }}</td>
                            <td>
                                <span v-if="bounty.is_active == 1" class="badge bg-success">Active</span>
                                <span v-else-if="bounty.is_active == 0" class="badge bg-danger">Deactive</span>
                            </td>
                            <td>{{ bounty.item_name }}</td>
                            <td>
                                <Link :href="$route('bounty.show',bounty.slug)">View Bounty</Link>
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
        bounties: Array
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
