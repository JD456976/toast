<template>
    <div class="comment-form">
        <h4 class="mb-15">Add a Comment</h4>
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <form @submit.prevent="store">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea-input v-model="form.comment" :error="form.errors.comment"
                                                class="pb-8 pr-6 w-full lg:w-1/2" label="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <loading-button :loading="form.processing" class="btn-indigo" type="submit">Save Comment
                            </loading-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import TextareaInput from "./TextareaInput";
import LoadingButton from "./LoadingButton";

export default {
    props: {
        deal: Object,
        errors: Object
    },
    name: "CommentForm",
    components: {
        TextareaInput,
        LoadingButton
    },
    remember: "form",
    data() {
        return {
            form: this.$inertia.form({
                _method: "post",
                comment: ""
            })
        };
    },
    methods: {
        store() {
            this.form.post(`/deal/comment/store/${this.deal.id}`, {
                onSuccess: () => this.form.reset("comment")
            });
        }
    }
};
</script>

<style scoped>

</style>
