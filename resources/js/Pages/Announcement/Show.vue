<template>
    <div v-if="announcement.is_active === true"
         class="shadow-2 flex flex-wrap justify-content-between align-content-center px-4 md:px-8"
         style="background: linear-gradient(90deg, #263238 0%, #526A76 100%); border-radius: 8px">
        <div class="flex align-items-start py-3">
            <div>
            <span
                class="inline-flex border-circle justify-content-center align-items-center text-white bg-green-500 mr-4"
                style="width: 38px; height: 38px">
                <i class="pi pi-check-circle text-xl"></i>
            </span>
            </div>
            <div>
                <div class="text-white font-bold mb-1">Account Verification</div>
                <span class="text-bluegray-200">Libero voluptatum atque exercitationem praesentium provident odit aperiam.</span>
            </div>
        </div>
        <a v-ripple
           class="cursor-pointer bg-bluegray-500 text-white px-3 py-2 line-height-3 my-3 hover:bg-bluegray-400 transition-colors transition-duration-150 p-ripple"
           style="border-radius: 35px">
            <span>Confirm Email</span>
            <i class="ml-2 pi pi-arrow-right"></i>
        </a>
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
