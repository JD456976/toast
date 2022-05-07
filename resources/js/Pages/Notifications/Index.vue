<template>
    <Head>
        <title>Your notifications</title>
        <meta name="description" content="Your notifications" />
    </Head>
    <div class="tab-pane" id="notifications">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Your Notifications</h3>
            </div>
            <div class="card-body">
                <h5 v-if="unread.length <= 0">
                    No New Notifications to Display
                </h5>
                <h5 v-else>Unread Notifications</h5>
                <div v-else class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Created</th>
                            <th>Title</th>
                            <th>View</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in unread" :key="item.id">
                            <td>{{ item.id }}</td>
                            <td>{{ formatDate(item.created_at) }}</td>
                            <td>{{ item.data.title }}</td>
                            <td></td>
                            <td>
                                <Link
                                    method="post"
                                    :href="
                                            $route('notification.read', item.id)
                                        "
                                >Mark Read
                                </Link>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-body">
                <h5 v-if="all.length <= 0">No Notifications to Display</h5>
                <h5 v-else>All Notifications</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Created</th>
                            <th>Title</th>
                            <th>View</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in all" :key="item.id">
                            <td>{{ item.id }}</td>
                            <td>{{ formatDate(item.created_at) }}</td>
                            <td>{{ item.data.title }}</td>
                            <td></td>
                            <td>
                                <Link
                                    method="delete"
                                    :href="
                                            $route(
                                                'notification.delete',
                                                item.id
                                            )
                                        "
                                >Delete
                                </Link>
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
        unread: Array,
        all: Array
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
