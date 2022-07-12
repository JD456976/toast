<template>
    <form @change="rate" ref="form">
        <div class="rating">
            <Rating @change="rate" :cancel="false"
                    v-model="form.newRating" />
        </div>
    </form>
</template>

<script>

import Rating from "primevue/rating";

export default {
    props: {
        bounty: Object,
        newRating: Number,
        initial: Number
    },
    components: {
        Rating
    },
    remember: "form",
    data() {
        return {
            form: this.$inertia.form({
                newRating: this.initial
            })
        };
    },
    methods: {
        rate() {
            this.form.post(route("bounty.rate", this.bounty.id));
        }
    }
};
</script>

<style scoped>

</style>
