<template>
    <Head>
        <title>Blog</title>
        <meta name="description" content="Blog">
    </Head>
    <blog-header :tags="tags" />
    <div class="page-content mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="shop-product-fillter mb-50 pr-30">
                        <div class="totall-product">
                            <h2>
                                <img class="w-36px mr-10" src="assets/imgs/theme/icons/category-1.svg" alt="" />
                                Kitchen Articles
                            </h2>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">50</a></li>
                                        <li><a href="#">100</a></li>
                                        <li><a href="#">150</a></li>
                                        <li><a href="#">200</a></li>
                                        <li><a href="#">All</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span>Featured <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">Featured</a></li>
                                        <li><a href="#">Newest</a></li>
                                        <li><a href="#">Most comments</a></li>
                                        <li><a href="#">Release Date</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="loop-grid loop-list pr-30 mb-50">
                        <article v-for="blog in blogs" :key="id" class="wow fadeIn animated hover-up mb-30 animated">
                            <div class="post-thumb">
                                <Image :src="blog.media"
                                       alt="Image" width="250" preview />
                            </div>
                            <div class="entry-content-2 pl-50">
                                <h3 class="post-title mb-20">
                                    <Link :href="$route('blog.show', blog.slug)">
                                        {{ blog.title }}
                                    </Link>
                                </h3>
                                <p class="post-exerpt mb-40">{{ blog.content }}</p>
                                <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                    <div>
                                        <span class="post-on">{{ blog.created_at }}</span>
                                        <span v-if="views >= 1" class="hit-count has-dot">
                                          {{ views }}  Views
                                        </span>
                                    </div>
                                    <Link :href="$route('blog.show', blog.slug)">
                                        <Button icon="pi pi-play" iconPos="right" label="Read More"
                                                class="p-button-raised p-button-success" />
                                    </Link>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        <nav aria-label="Page navigation example">
                            <Paginator :rows="10" :totalRecords="totalRecords"
                                       :rowsPerPageOptions="[10,20,30]"></Paginator>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
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
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Image from "primevue/image";
import Button from "primevue/button";
import Paginator from "primevue/paginator";
import BlogHeader from "@/Partials/BlogHeader";
import SearchWidget from "@/Shared/BlogWidgets/SearchWidget";
import CategoriesWidget from "@/Shared/BlogWidgets/CategoriesWidget";
import PopularWidget from "@/Shared/BlogWidgets/PopularWidget";
import GalleryWidget from "@/Shared/BlogWidgets/GalleryWidget";
import TagsWidget from "@/Shared/BlogWidgets/TagsWidget";

export default {
    name: "Index",
    data() {
        return {
            totalRecords: this.blogs.length
        };
    },
    methods: {
        reset() {
            this.first = 0;
        }
    },
    components: {
        TagsWidget,
        GalleryWidget,
        PopularWidget,
        CategoriesWidget,
        BlogHeader,
        Head,
        Image,
        Link,
        Button,
        Paginator,
        SearchWidget
    },
    props: {
        blogs: Array,
        tags: Array,
        views: Array,
        cats: Array,
        popular: Array,
        media: Array
    }
};
</script>
