<template>
    <form @change="rate" ref="form">
        <div class="rating">
            <Rating @change="rate" :cancel="false"
                    v-model="form.newRating" />
        </div>
    </form>
</template>

<script setup>
import Rating from "primevue/rating";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    bounty: Object,
    newRating: Number,
    rating: Number,
    initial: Number
});

const form = useForm({
    newRating: props.initial
});

const rate = () => {
    form.post(route("bounty.rate", props.bounty.id), {});
};
</script>

<script>
export default {
    name: "RateBountyForm"
};
</script>

<style scoped>

</style>
