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
                            <Button class="p-button-raised" type="submit" label="Save Comment" icon="pi pi-check"
                                    iconPos="right" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import Textarea from "primevue/textarea";
import Button from "primevue/button";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    bounty: Object,
    errors: Object
});

const form = useForm({
    bounty_comment: "",
    bounty_id: props.bounty.id
});

const store = () => {
    form.post(route("bounty-comment.store"), {
        onSuccess: () => form.reset("bounty_comment")
    });
};

</script>

<script>

export default {
    name: "BountyCommentForm",
    remember: "form"
};
</script>

<style scoped>

</style>
