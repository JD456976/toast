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
                                        <Breadcrumb class="mb-10" :home="home" :model="bitems" />
                                        <div class="col-xl-10 col-lg-12 m-auto">
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
                                            <h6 class="mb-10"><a href="#">{{ blog.category.title }}</a></h6>
                                            <h2 class="mb-10">{{ blog.title }} </h2>
                                            <div class="single-header-meta">
                                                <div class="entry-meta meta-1 font-xs mt-15 mb-15">
                                                    <Link class="author-avatar"
                                                          :href="$route('user.show', blog.user_id)">
                                                        <Avatar image="https://i.pravatar.cc/300" />
                                                    </Link>
                                                    <span class="post-by">By
                                                        <Link
                                                            :href="$route('user.show', blog.user.slug)">
                                                            {{ blog.user.name }}
                                                        </Link>
                                                    </span>
                                                    <span class="post-on has-dot">{{ blog.created_at }}</span>
                                                    <span class="post-on has-dot">Viewed: {{ views }} times</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <figure class="single-thumbnail">
                                    <Image :src="media"
                                           alt="Image" width="250" preview />
                                </figure>
                                <div class="single-content">
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-12 m-auto">
                                            <p>
                                                {{ blog.content }}
                                            </p>
                                            <!--Entry bottom-->
                                            <Divider />
                                            <h5>Tags</h5>
                                            <div class=" mt-50 mb-30">
                                                <div class="chip w-50 w-sm-100">
                                                    <Chip class="mr-2" v-for="tag in tagged" :key="id">
                                                        <Link
                                                            :href="$route('blog.tag', tag)">
                                                            {{ tag }}
                                                        </Link>
                                                    </Chip>
                                                </div>
                                            </div>
                                            <Divider />
                                            <h5>Share</h5>
                                            <div>
                                                <SpeedDial :model="items"
                                                           direction="left" />
                                            </div>
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
                                                                                <div class="col-12">
                                                                                    <div class="product-list-item">
                                                                                        <div class="thumb">
                                                                                            <a :href="$route('user.show',slotProps.data.user.slug)"
                                                                                               class="font-heading text-brand">{{
                                                                                                    slotProps.data.user.name
                                                                                                }}
                                                                                            </a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="product-list-detail">
                                                                                    <span
                                                                                        class="font-xs text-muted">Posted: {{ slotProps.data.created_at
                                                                                        }}
                                                                                    </span>
                                                                                            <div
                                                                                                class="product-description">
                                                                                                {{ slotProps.data.comment
                                                                                                }}
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="product-list-action ms-auto">
                                                                                            <ReportBlogCommentForm
                                                                                                :blog="blog"
                                                                                                :comment="slotProps.data"
                                                                                            />
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
import BlogCommentForm from "@/Shared/BlogCommentForm";
import ReportBlogCommentForm from "@/Shared/ReportBlogCommentForm";
import SearchWidget from "@/Shared/BlogWidgets/SearchWidget";
import CategoriesWidget from "@/Shared/BlogWidgets/CategoriesWidget";
import PopularWidget from "@/Shared/BlogWidgets/PopularWidget";
import TagsWidget from "@/Shared/BlogWidgets/TagsWidget";
import GalleryWidget from "@/Shared/BlogWidgets/GalleryWidget";
import Image from "primevue/image";
import SpeedDial from "primevue/speeddial";
import Tooltip from "primevue/tooltip";
import Badge from "primevue/badge";
import Chip from "primevue/chip";
import Divider from "primevue/divider";
import Card from "primevue/card";
import DataView from "primevue/dataview";
import Dropdown from "primevue/dropdown";
import FlashMessages from "@/Shared/FlashMessages";
import Breadcrumb from "primevue/breadcrumb";
import Toolbar from "primevue/toolbar";


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
        SpeedDial,
        Chip,
        Divider,
        Card,
        DataView,
        Dropdown,
        FlashMessages,
        Breadcrumb,
        Toolbar
    },
    props: {
        blog: Object,
        comments: Array,
        cats: Array,
        popular: Array,
        tags: Array,
        tagged: Array,
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
