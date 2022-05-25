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
                            <div class="single-page pt-50 pr-30">
                                <div class="single-header style-2">
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-12 m-auto">
                                            <div v-if="admin === true">
                                                <h6>Admin Functions</h6>
                                                <div class="btn-group-sm">
                                                    <Link :href="$route('admin.blog.edit', blog.id)">
                                                        <Button icon="pi pi-pencil" iconPos="right" label="Edit"
                                                                class="p-button-raised p-button-warning" />
                                                    </Link>
                                                    <Link
                                                        method="delete"
                                                        :href="$route('admin.blog.destroy', blog.id)">
                                                        <Button label="Delete"
                                                                class="p-button-danger p-button-raised"
                                                                icon="pi pi-times"
                                                                iconPos="right" />
                                                    </Link>
                                                </div>
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
                                                            :href="$route('user.show', blog.user_id)">
                                                            {{ blog.user.name }}
                                                        </Link>
                                                    </span>
                                                    <span class="post-on has-dot">{{ blog.created_at }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <figure class="single-thumbnail">
                                    <Image src="https://www.primefaces.org/wp-content/uploads/2020/05/placeholder.png"
                                           alt="Image" width="250" preview />
                                </figure>
                                <div class="single-content">
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-12 m-auto">
                                            <p>
                                                {{ blog.content }}
                                            </p>
                                            <!--Entry bottom-->
                                            <div class="entry-bottom mt-50 mb-30">
                                                <div class="tags w-50 w-sm-100">
                                                    <Chip v-for="tag in tags" :key="id" label="Text Only">
                                                        <Link
                                                            class="hover-up btn btn-sm btn-rounded mr-10"
                                                            :href="$route('blog.tag', tag.name)">
                                                            {{ tag.name }}
                                                        </Link>
                                                    </Chip>
                                                </div>
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
                                                                <div v-else v-for="comment in comments" :key="id"
                                                                     class="single-comment  d-flex">
                                                                    <div
                                                                        class="user just d-flex">
                                                                        <div class="thumb text-center">
                                                                            <Image
                                                                                src="https://www.primefaces.org/wp-content/uploads/2020/05/placeholder.png"
                                                                                alt="Image" width="250" preview>
                                                                                <Link v-for="tag in tags" :key="id"
                                                                                      class="font-heading text-brand"
                                                                                      :href="$route('user.show', comment.user_id)">
                                                                                    {{ comment.user_id }}
                                                                                </Link>
                                                                            </Image>
                                                                        </div>
                                                                        <div class="desc">
                                                                            <div
                                                                                class="d-flex justify-content-between mb-10">
                                                                                <div
                                                                                    class="d-flex align-items-center">
                                                                                    <span
                                                                                        class="font-xs text-muted">{{ comment.created_at
                                                                                        }} </span>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-10">
                                                                                {{ comment.comment }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-end">
                                                                        <div v-if="admin" class="col-6">
                                                                            <Link
                                                                                method="delete"
                                                                                :href="$route('blog.comment.destroy', comment.id)">
                                                                                <Button label="Delete"
                                                                                        class="p-button-danger"
                                                                                        icon="pi pi-times"
                                                                                        iconPos="right" />
                                                                            </Link>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <report-blog-comment-form :blog="blog"
                                                                                                      :comment="comment" />
                                                                        </div>
                                                                    </div>

                                                                </div>
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
import Chip from "primevue/chip";
import SpeedDial from "primevue/speeddial";
import Tooltip from "primevue/tooltip";

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
        Chip,
        SpeedDial
    },
    props: {
        blog: Object,
        comments: Array,
        cats: Array,
        popular: Array,
        tags: Array,
        admin: Boolean
    },
    directives: {
        "tooltip": Tooltip
    },
    data() {
        return {
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
    }
};
</script>

<style scoped>

</style>
