<template>
    <div class="sidebar-widget product-sidebar mb-50 p-30 bg-grey border-radius-10">
        <h5 class="section-title style-1 mb-30">Trending Now</h5>
        <div v-for="item in popular" :key="id" class="single-post clearfix">
            <div class="content">
                <h5>
                    <Link :href="$route('blog.show', item.slug)">
                        {{ item.title }}
                    </Link>
                </h5>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PopularWidget",
    props: {
        popular: Array
    }
};
</script>

<style scoped>

</style>
