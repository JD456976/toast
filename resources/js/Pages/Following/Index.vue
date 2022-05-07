<template>
    <Head>
        <title>Your Follow Lists</title>
        <meta name="description" content="Your Follow Lists">
    </Head>
    <div class="tab-pane" id="notifications"
    >
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Your Follow Lists</h3>
            </div>
            <div class="card-body">
                <h5 v-if="following.length <= 0">You are not following anyone</h5>
                <h5 v-else>People you are following</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Added</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in following" :key="item.id">
                            <td>{{ item.id }}</td>
                            <td>{{ formatDate(item.created_at) }}</td>
                            <td>{{ item.user.name }}</td>
                            <td>
                                <Link method="delete" :href="$route('follow.delete',item.id)">Unfollow
                                </Link>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-body">
                <h5 v-if="followed.length <= 0">No one is currently following you</h5>
                <h5 v-else>People following you</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Added</th>
                            <th>Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in followed" :key="item.id">
                            <td>{{ item.id }}</td>
                            <td>{{ formatDate(item.created_at) }}</td>
                            <td>{{ item.user.name }}</td>
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
        following: Array,
        followed: Array,
        user: Object
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
