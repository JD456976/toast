<template>
    <Head>
        <title>{{ blog.title }}</title>
        <meta name="description" content="Blog Post">
    </Head>
    <div class="page-content mb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-11 col-lg-12 m-auto">
                    <div class="row">
                        <div class="col-lg-9">
                            <flash-messages />
                            <div class="single-page pt-50 pr-30">
                                <div class="single-header style-2">
                                    <div class="row">
                                        <Divider />
                                        <ul class="list-none p-0 m-0 flex font-medium overflow-y-hidden overflow-x-auto border-round shadow-2">
                                            <li class="relative p-3 bg-green-500">
                                                <Link class="cursor-pointer"
                                                      :href="$route('deal.index')">
                                                    <i class="pi pi-home text-white"></i>
                                                </Link>
                                            </li>
                                            <li class="relative p-3 bg-green-500">
                                                <div class="absolute left-0 top-0 z-1"
                                                     style="border-left: 20px solid var(--green-500); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
                                                <Link class="cursor-pointer text-white pl-4 white-space-nowrap"
                                                      :href="$route('blog.index')">
                                                    Blogs
                                                </Link>
                                                <div class="absolute top-0"
                                                     style="left: 1px; border-left: 20px solid var(--green-100); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
                                            </li>
                                            <li class="relative p-3 bg-green-500">
                                                <div class="absolute left-0 top-0 z-1"
                                                     style="border-left: 20px solid var(--green-500); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
                                                <Link class="cursor-pointer text-white pl-4 white-space-nowrap"
                                                      :href="$route('blog.index')">
                                                    {{ blog.category.title }}
                                                </Link>
                                                <div class="absolute top-0"
                                                     style="left: 1px; border-left: 20px solid var(--green-100); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
                                            </li>
                                            <li class="relative p-3 bg-green-700">
                                                <div class="absolute left-0 top-0 z-1"
                                                     style="border-left: 20px solid var(--green-500); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
                                                <Link
                                                    class="cursor-pointer text-green-100 font-bold pl-4 white-space-nowrap"
                                                    :href="$route('blog.show', blog.slug)">
                                                    {{ blog.title }}
                                                </Link>
                                                <div class="absolute top-0"
                                                     style="left: 1px; border-left: 20px solid var(--green-100); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
                                            </li>
                                        </ul>
                                        <Divider />
                                        <div class="col-xl-12 col-lg-12 m-auto">
                                            <div v-if="admin === true" class="fixed-bottom">
                                                <Toolbar>
                                                    <template #start>
                                                        <Link class="mr-3" :href="$route('admin.blog.edit', blog.id)">
                                                            <Button icon="pi pi-pencil" iconPos="right" label="Edit"
                                                                    class="p-button-raised p-button-warning" />
                                                        </Link>
                                                        <Link class="mr-3" v-if="blog.is_featured === false"
                                                              :href="$route('admin.blog.feature', blog.id)">
                                                            <Button icon="pi pi-star" iconPos="right" label="Feature"
                                                                    class="p-button-raised p-button-info" />
                                                        </Link>
                                                        <Link class="mr-3" v-else
                                                              :href="$route('admin.blog.feature', blog.id)">
                                                            <Button icon="pi pi-star" iconPos="right" label="Unfeature"
                                                                    class="p-button-raised p-button-secondary" />
                                                        </Link>
                                                        <Link class="mr-3" v-if="blog.is_active === false"
                                                              :href="$route('admin.blog.activate', blog.id)">
                                                            <Button icon="pi pi-power-off" iconPos="right"
                                                                    label="Activate"
                                                                    class="p-button-raised p-button-info" />
                                                        </Link>
                                                        <Link class="mr-3" v-else
                                                              :href="$route('admin.blog.activate', blog.id)">
                                                            <Button icon="pi pi-power-off" iconPos="right"
                                                                    label="Deactivate"
                                                                    class="p-button-raised p-button-secondary" />
                                                        </Link>
                                                    </template>

                                                    <template #end>
                                                        <Link
                                                            method="delete"
                                                            :href="$route('admin.blog.destroy', blog.id)">
                                                            <Button label="Delete"
                                                                    class="p-button-danger p-button-raised"
                                                                    icon="pi pi-times"
                                                                    iconPos="right" />
                                                        </Link>
                                                    </template>
                                                </Toolbar>
                                            </div>
                                            <div class="surface-section px-4 py-2 md:px-6 lg:px-2">
                                                <div class="text-600 text-sm mb-3">
                                                    <span>Published on: </span>
                                                    <span class="font-bold mr-1">{{ blog.created_at }}</span>
                                                    <span> by </span>
                                                    <Link class="author-avatar ml-1"
                                                          :href="$route('user.show', blog.user_id)">
                                                        <span class="font-bold">{{ blog.user.name }}</span>
                                                    </Link>
                                                    <span class="post-on has-dot">|  Viewed: {{ views }} times</span>
                                                </div>
                                                <div class="border-blue-600 font-medium text-2xl p-3 mb-3 text-900"
                                                     style="border-left: 8px solid">{{ blog.title }}
                                                </div>
                                                <div class="mb-5">
                                                    <Tag v-for="tag in tagged" :key="id" :value="tag" severity="success"
                                                         class="mr-2"></Tag>
                                                </div>
                                                <div class="line-height-3 text-lg text-700">
                                                    {{ blog.content }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-content">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 m-auto">
                                            <!--Comment form-->
                                            <div class="comment-form">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="comments-area">
                                                            <h3 class="mb-30">Comments</h3>
                                                            <div class="comment-list">
                                                                <h5 v-if="comments.length <= 0">No Comments To
                                                                    Display</h5>
                                                                <Card>
                                                                    <template #content>
                                                                        <DataView :layout="layout" :value="comments"
                                                                                  :paginator="true" :rows="rows"
                                                                                  :sortOrder="sortOrder"
                                                                                  :sortField="sortField">
                                                                            <template #header>
                                                                                <div class="grid grid-nogutter">
                                                                                    <div class="col-6"
                                                                                         style="text-align: left">
                                                                                        <Dropdown v-model="sortKey"
                                                                                                  :options="sortOptions"
                                                                                                  optionLabel="label"
                                                                                                  placeholder="Sort..."
                                                                                                  @change="onSortChange($event)" />
                                                                                        <Dropdown :options="perPage"
                                                                                                  class="ml-5"
                                                                                                  optionLabel="label"
                                                                                                  placeholder="Per Page..."
                                                                                                  @change="onPageChange($event)"
                                                                                        />
                                                                                    </div>
                                                                                </div>
                                                                            </template>

                                                                            <template #list="slotProps">
                                                                                <div class="col-12 lg:col-12">
                                                                                    <div class="p-2">
                                                                                        <div
                                                                                            class="border-1 surface-border border-round p-3">
                                                                                            <div
                                                                                                class="flex align-items-center mb-3">
                                                                                                <Avatar class="mr-2"
                                                                                                        image="https://i.pravatar.cc/300"
                                                                                                        shape="circle"></Avatar>
                                                                                                <Link
                                                                                                    :href="$route('user.show', slotProps.data.user.slug)">
                                                                                                    <span
                                                                                                        class="text-900 font-medium mr-3"> {{ slotProps.data.user.name
                                                                                                        }}</span>
                                                                                                </Link>
                                                                                                <span
                                                                                                    class="text-sm font-medium text-500">
                                                                                                    {{ slotProps.data.created_at
                                                                                                    }}
                                                                                                </span>
                                                                                                <span class="ml-auto">
                                                                                                  <ReportBlogCommentForm
                                                                                                      :blog="blog"
                                                                                                      :comment="slotProps.data"
                                                                                                  />
                                                                                                </span>
                                                                                            </div>
                                                                                            <p class="m-0 p-0 line-height-3 text-600">
                                                                                                {{ slotProps.data.comment
                                                                                                }}
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </template>
                                                                        </DataView>
                                                                    </template>
                                                                </Card>
                                                            </div>
                                                            <blog-comment-form :blog="blog" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 primary-sidebar sticky-sidebar pt-50">
                            <div class="widget-area">
                                <search-widget />
                                <categories-widget :cats="cats" />
                                <popular-widget :popular="popular" />
                                <gallery-widget />
                                <tags-widget :tags="tags" />
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
import Button from "primevue/button";
import Avatar from "primevue/avatar";
import BlogCommentForm from "@/Pages/Blog/BlogCommentForm";
import ReportBlogCommentForm from "@/Pages/Blog/ReportBlogCommentForm";
import SearchWidget from "@/Shared/BlogWidgets/SearchWidget";
import CategoriesWidget from "@/Shared/BlogWidgets/CategoriesWidget";
import PopularWidget from "@/Shared/BlogWidgets/PopularWidget";
import TagsWidget from "@/Shared/BlogWidgets/TagsWidget";
import GalleryWidget from "@/Shared/BlogWidgets/GalleryWidget";
import Image from "primevue/image";
import Tooltip from "primevue/tooltip";
import Badge from "primevue/badge";
import Chip from "primevue/chip";
import Divider from "primevue/divider";
import Card from "primevue/card";
import DataView from "primevue/dataview";
import Dropdown from "primevue/dropdown";
import FlashMessages from "@/Shared/FlashMessages";
import Toolbar from "primevue/toolbar";
import Tag from "primevue/tag";


export default {
    name: "Show",
    components: {
        BlogCommentForm,
        Head,
        Link,
        Button,
        Avatar,
        Image,
        ReportBlogCommentForm,
        SearchWidget,
        CategoriesWidget,
        PopularWidget,
        GalleryWidget,
        TagsWidget,
        Badge,
        Chip,
        Divider,
        Card,
        DataView,
        Dropdown,
        FlashMessages,
        Toolbar,
        Tag
    },
    props: {
        blog: Object,
        comments: Array,
        cats: Array,
        popular: Array,
        tags: Array,
        tagged: Array,
        loggedin: Boolean,
        admin: Boolean,
        media: Object,
        views: Object
    },
    directives: {
        "tooltip": Tooltip
    },
    data() {
        return {
            home: {
                label: "Home",
                icon: "pi pi-home",
                url: "/"
            },
            bitems: [
                {
                    label: "Blogs",
                    url: route("blog.index")
                },
                {
                    label: this.blog.category.title
                },
                {
                    label: this.blog.title
                }
            ],
            layout: "list",
            rows: 10,
            sortKey: null,
            sortOrder: null,
            sortField: null,
            sortOptions: [
                { label: "Newest", value: "!created_at" },
                { label: "Oldest", value: "created_at" }
            ],
            perPage: [
                { label: 10, value: 10 },
                { label: 20, value: 20 },
                { label: 30, value: 30 },
                { label: 40, value: 40 },
                { label: 50, value: 50 }
            ],
            items: [
                {
                    label: "Add",
                    icon: "pi pi-pencil",
                    command: () => {
                        this.$toast.add({ severity: "info", summary: "Add", detail: "Data Added" });
                    }
                },
                {
                    label: "Update",
                    icon: "pi pi-refresh",
                    command: () => {
                        this.$toast.add({ severity: "success", summary: "Update", detail: "Data Updated" });
                    }
                },
                {
                    label: "Delete",
                    icon: "pi pi-trash",
                    command: () => {
                        this.$toast.add({ severity: "error", summary: "Delete", detail: "Data Deleted" });
                    }
                },
                {
                    label: "Upload",
                    icon: "pi pi-upload",
                    command: () => {
                        this.$router.push("fileupload");
                    }
                },
                {
                    label: "Vue Website",
                    icon: "pi pi-external-link",
                    command: () => {
                        window.location.href = "https://vuejs.org/";
                    }
                }
            ]
        };
    },
    methods: {
        onSortChange(event) {
            const value = event.value.value;
            const sortValue = event.value;

            if (value.indexOf("!") === 0) {
                this.sortOrder = -1;
                this.sortField = value.substring(1, value.length);
                this.sortKey = sortValue;
            } else {
                this.sortOrder = 1;
                this.sortField = value;
                this.sortKey = sortValue;
            }
        },
        onPageChange(event) {
            this.rows = event.value.value;
        }
    }
};
</script>

<style scoped>
.chip a {
    font-size: 20px;
    padding: 10px;
}

span.p-menuitem-icon {
    margin-right: 10px;
}

span.p-menuitem-text {
    padding-left: 10px;
}

</style>
