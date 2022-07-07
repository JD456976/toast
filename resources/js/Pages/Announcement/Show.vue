<template>
    <div v-if="announcement.is_active === true"
         class="shadow-2 flex flex-wrap justify-content-between align-content-center px-4 md:px-8 mb-5"
         style="background: linear-gradient(90deg, #263238 0%, #526A76 100%); border-radius: 8px">
        <div class="flex align-items-start py-3">
            <div>
            <span v-if="announcement.type === 'success'"
                  class="inline-flex border-circle justify-content-center align-items-center text-white bg-green-500 mr-4"
                  style="width: 38px; height: 38px">
                <i class="pi pi-check-circle text-xl"></i>
            </span>
                <span v-else-if="announcement.type === 'danger'"
                      class="inline-flex border-circle justify-content-center align-items-center text-white bg-orange-500 mr-4"
                      style="width: 38px; height: 38px">
                <i class="pi pi-exclamation-triangle text-xl"></i>
            </span>
                <span v-else-if="announcement.type === 'info'"
                      class="inline-flex border-circle justify-content-center align-items-center text-white bg-blue-500 mr-4"
                      style="width: 38px; height: 38px">
                <i class="pi pi-info-circle text-xl"></i>
            </span>
            </div>
            <div>
                <div class="text-white font-bold mb-1">{{ announcement.title }}</div>
                <span v-html="announcement.content" class="text-bluegray-200"></span>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    announcement: Array
});
</script>

<script>
export default {
    name: "ShowAnnouncement"
};
</script>

<style scoped>

</style>
