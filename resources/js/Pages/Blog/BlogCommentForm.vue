<template>
    <div class="comment-form">
        <h4 class="mb-15">Add a Comment</h4>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <form @submit.prevent="store">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">
                                    Comment
                                </label>
                                <Textarea :autoResize="true" rows="5" cols="30" id="blog_comment"
                                          v-bind:class='{"p-invalid": form.errors.blog_comment}'
                                          v-model="form.blog_comment"
                                />
                                <small v-if="form.errors.blog_comment" id="name-help"
                                       class="p-error">{{ form.errors.blog_comment }}</small>
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
        blog: Object,
        errors: Object
    },
    name: "BlogCommentForm",
    components: {
        Textarea,
        Button
    },
    remember: "form",
    data() {
        return {
            form: this.$inertia.form({
                _method: "post",
                blog_comment: "",
                blog_id: this.blog.id
            })
        };
    },
    methods: {
        store() {
            this.form.post(route("blog-comment.store"), {
                onSuccess: () => this.form.reset("blog_comment")
            });
        }
    }
};
</script>

<style scoped>

</style>
