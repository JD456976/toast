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
                                <Textarea :autoResize="true" rows="5" cols="30" id="bounty_comment"
                                          v-bind:class='{"p-invalid": form.errors.bounty_comment}'
                                          v-model="form.bounty_comment"
                                />
                                <small v-if="form.errors.bounty_comment" id="name-help"
                                       class="p-error">{{ form.errors.bounty_comment }}</small>
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
import Textarea from "primevue/textarea";
import Button from "primevue/button";

export default {
    props: {
        bounty: Object,
        errors: Object
    },
    name: "BountyCommentForm",
    components: {
        Textarea,
        Button
    },
    remember: "form",
    data() {
        return {
            form: this.$inertia.form({
                _method: "post",
                bounty_comment: "",
                bounty_id: this.bounty.id
            })
        };
    },
    methods: {
        store() {
            this.form.post(route("bounty-comment.store"), {
                onSuccess: () => this.form.reset("bounty_comment")
            });
        }
    }
};
</script>

<style scoped>

</style>
