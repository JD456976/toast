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
import Button from "primevue/button";
import Textarea from "primevue/textarea";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    deal: Object,
    errors: Object
});

const form = useForm({
    deal_comment: "",
    deal_id: props.deal.id
});

const store = () => {
    this.form.post(route("deal-comment.store"), {
        onSuccess: () => this.form.reset("deal_comment")
    });
};
</script>

<script>
export default {
    name: "DealCommentForm"
};
</script>

<style scoped>

</style>
