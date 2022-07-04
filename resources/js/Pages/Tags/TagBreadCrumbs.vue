<template>
    <ul class="list-none p-0 m-0 flex font-medium overflow-y-hidden overflow-x-auto border-round">
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
        <li class="relative p-3 bg-green-700">
            <div class="absolute left-0 top-0 z-1"
                 style="border-left: 20px solid var(--green-500); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
            <Link class="cursor-pointer text-green-100 font-bold pl-4 white-space-nowrap"
                  :href="$route('tag.show', tag)">
                Tagged With: {{ tag }}
            </Link>
            <div class="absolute top-0"
                 style="left: 1px; border-left: 20px solid var(--green-100); border-top: 26px solid transparent; border-bottom: 26px solid transparent; width: 0; height: 0"></div>
        </li>
    </ul>
</template>

<script setup>

const props = defineProps({
    tag: Object
});
</script>
<script>
export default {
    name: "TagBreadCrumbs"
};
</script>
<style scoped>
.chip a {
    font-size: 20px;
    padding: 10px;
}

</style>
