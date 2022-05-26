<template>
    <div class="comment-form">
        <h4 class="mb-15">Add a Comment</h4>
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <form @submit.prevent="store">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">
                                    Comment
                                </label>
                                <Textarea :autoResize="true" rows="5" cols="30" id="comment"
                                          v-bind:class='{"p-invalid": form.errors.deal_comment}'
                                          v-model="form.deal_comment"
                                />
                                <small v-if="form.errors.deal_comment" id="name-help"
                                       class="p-error">{{ form.errors.deal_comment }}</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <Button type="submit" label="Save Comment" icon="pi pi-check" iconPos="right" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

import Button from "primevue/button";
import Textarea from "primevue/textarea";


export default {
    props: {
        deal: Object,
        errors: Object
    },
    name: "DealCommentForm",
    components: {
        Textarea,
        Button
    },
    remember: "form",
    data() {
        return {
            form: this.$inertia.form({
                _method: "post",
                deal_comment: ""
            })
        };
    },
    methods: {
        store() {
            this.form.post(route("deal.comment.store", this.deal.id), {
                onSuccess: () => this.form.reset("deal_comment")
            });
        }
    }
};
</script>

<style scoped>

</style>
