<template>
    <div class="grid flex-column">
        <div class="col">
            <Button
                v-if="comment.is_reported === 1"
                v-tooltip.top="'Already Reported'"
                disabled="disabled"
                icon="pi pi-flag-fill"
                class="p-button-rounded p-button-danger" />
            <Button v-else
                    v-tooltip.top="'Report Comment'"
                    @click="openBasic"
                    icon="pi pi-flag-fill"
                    class="p-button-rounded p-button-danger" />
            <Dialog header="Report Comment" v-model:visible="displayBasic" :style="{width: '50vw'}">
                <form>
                    <Dropdown
                        v-model="form.blog_comment_reason"
                        v-bind:class='{"p-invalid": form.errors.report_blog_comment_reason}'
                        :options="reasons"
                        optionLabel="name"
                        optionValue="value"
                        placeholder="Select a Reason" />
                    <div>
                        <small v-if="form.errors.report_blog_comment_reason" id="name-help"
                               class="p-error">{{ form.errors.report_blog_comment_reason }}</small>
                    </div>

                    <label for="comment">Comment</label>
                    <Textarea :autoResize="true" rows="5" cols="30" id="comment"
                              v-bind:class='{"p-invalid": form.errors.report_blog_comment_comment}'
                              v-model="form.report_blog_comment_comment"
                    />
                    <small v-if="form.errors.report_blog_comment_comment" id="name-help"
                           class="p-error">{{ form.errors.report_blog_comment_comment }}</small>

                </form>
                <template #footer>
                    <Button @click="closeBasic" label="Cancel" icon="pi pi-times" class="p-button-secondary" />
                    <Button @click="store" label="Submit" icon="pi pi-check" autofocus />
                </template>
            </Dialog>
        </div>
    </div>
</template>

<script>

import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import Textarea from "primevue/textarea";
import Dropdown from "primevue/dropdown";
import Dialog from "primevue/dialog";
import Button from "primevue/button";
import Tooltip from "primevue/tooltip";
import Ripple from "primevue/ripple";

export default {
    setup() {
        const user = computed(() => usePage().props.value.auth.user);
        return {
            user
        };
    },
    name: "ReportBlogCommentForm",
    components: {
        Textarea,
        Dropdown,
        Button,
        Dialog,
        Tooltip,
        Ripple
    },
    props: {
        blog: Object,
        comment: Object
    },
    remember: "form",
    directives: {
        "tooltip": Tooltip,
        "ripple": Ripple
    },
    data() {
        return {
            form: this.$inertia.form({
                _method: "post",
                report_blog_comment_reason: "",
                report_blog_comment_comment: "",
                slug: this.blog.slug
            }),
            displayBasic: false,
            reasons: [
                { name: "Spam", value: "spam" },
                { name: "Offensive", value: "off" },
                { name: "Other", value: "other" }
            ]
        };
    },
    methods: {
        store() {
            this.form.post(route("report.blog.comment", this.comment.id), {
                onSuccess: () => {
                    this.form.reset("report_blog_comment_comment", "report_blog_comment_reason");
                    this.displayBasic = false;
                }
            });
        },
        openBasic() {
            this.displayBasic = true;
        },
        closeBasic() {
            this.displayBasic = false;
        }
    }
};
</script>

<style scoped></style>
