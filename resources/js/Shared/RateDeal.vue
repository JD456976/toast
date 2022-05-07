<template>
    <form @change="rate" ref="form">
        <div class="rating">
            <pre></pre>
            <input type="radio" id="star5" name="rating" value="5" v-model="form.newRating" /><label
            for="star5"></label>
            <input type="radio" id="star4" name="rating" value="4" v-model="form.newRating" /><label
            for="star4"></label>
            <input type="radio" id="star3" name="rating" value="3" v-model="form.newRating" /><label
            for="star3"></label>
            <input type="radio" id="star2" name="rating" value="2" v-model="form.newRating" /><label
            for="star2"></label>
            <input type="radio" id="star1" name="rating" value="1" v-model="form.newRating" /><label
            for="star1"></label>
        </div>
    </form>
</template>

<script>

export default {
    props: {
        deal: Object,
        newRating: Number,
        rating: Number,
        initial: Number
    },
    remember: "form",
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
            this.form.patch(`/deal/rate/${this.deal.id}`, {});
        }
    }
};
</script>

<style scoped>

/****** Style Star Rating Widget *****/

.rating {
    border: none;
    float: left;
}

.rating > input {
    display: none;
}

.rating > label:before {
    margin: 5px;
    font-size: 2em;
    font-family: FontAwesome;
    display: inline-block;
    content: "\f005";
}

.rating > .half:before {
    content: "\f089";
    position: absolute;
}

.rating > label {
    color: #ddd;
    float: right;
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label {
    color: #FFD700;
}

/* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label {
    color: #FFED85;
}
</style>
