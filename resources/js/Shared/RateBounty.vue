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
        rating: Number,
        initial: Number
    },
    remember: "form",
    components: {
        Rating
    },
    data() {
        return {
            form: this.$inertia.form({
                _method: "patch",
                newRating: this.initial
            })
        };
    },
    methods: {
        rate() {
            this.form.patch(route("bounty.rate", this.bounty.id), {});
        }
    }
};
</script>

<style scoped>

</style>
