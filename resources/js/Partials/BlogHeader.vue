<template>
    <div class="page-header mt-30 mb-75">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15">Blog</h1>
                        <div class="breadcrumb">
                            <a href="/public" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> Blog
                        </div>
                    </div>
                    <div class="col-xl-9 text-end d-none d-xl-block">
                        <ul class="tags-list">
                            <li v-for="tag in tags" :key="id" class="hover-up">
                                <Link :href="$route('blog.tag', tag)">
                                    {{ tag }}
                                    <i class="pi pi-times"></i>
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    name: "blog-header",
    props: {
        tags: {}
    },
    components: {
        Link
    }
};
</script>
