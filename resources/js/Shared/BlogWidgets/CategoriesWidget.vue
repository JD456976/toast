<template>
    <div class="sidebar-widget widget-category-2 mb-50">
        <h5 class="section-title style-1 mb-30">Category</h5>
        <ul>
            <li v-for="cat in cats" :key="id">
                <a href="shop-grid-right.html"> <img
                    src="assets/imgs/theme/icons/category-1.svg"
                    alt="" />{{ cat.title }}</a><span
                class="count">44</span>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "CategoriesWidget",
    props: {
        cats: Array
    }
};
</script>

<style scoped>

</style>
