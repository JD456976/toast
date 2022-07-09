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
    deal: Object,
    newRating: Number,
    rating: Number,
    initial: Number
});

const form = useForm({
    newRating: props.initial
});

const store = () => {
    form.post(route("deal.rate"));
};
</script>

<script>


export default {
    name: "RateDealForm"
};
</script>

<style scoped>

</style>
