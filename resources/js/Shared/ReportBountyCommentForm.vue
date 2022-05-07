<template>
    <div class="col">
        <div id="modals"></div>
        <n-tooltip trigger="hover">
            <template #trigger>
                <n-button
                    :disabled="comment.is_reported === 1"
                    color="red"
                    type="primary"
                    @click="showModal = true"
                >
                    <icon name="flag"></icon>
                </n-button>
            </template>
            <div v-if="comment.is_reported === 1">Already Reported</div>
            <div v-else>Report Comment</div>
        </n-tooltip>
        <n-modal v-model:show="showModal">
            <n-card
                style="width: 600px"
                title="Report Comment"
                :bordered="false"
                size="huge"
                role="dialog"
                aria-modal="true"
            >
                <template #header-extra></template>
                <form @submit.prevent="store">
                    <select-input
                        v-model="form.reason"
                        :error="form.errors.reason"
                        label="Reason"
                    >
                        <option v-if="input == null" disabled :value="null">
                            Select an option
                        </option>
                        <option value="Spam">Spam</option>
                        <option value="Incomplete">Incomplete</option>
                        <option value="Duplicate">Duplicate</option>
                        <option value="Other">Other</option>
                    </select-input>

                    <textarea-input
                        v-model="form.comment"
                        :error="form.errors.comment"
                        label="Comment"
                    />
                </form>
                <template #footer>
                    <n-button @click="showModal = false">Cancel</n-button>
                    <n-button class="ml-20" @click="store()" type="primary">
                        Submit
                    </n-button>
                </template>
            </n-card>
        </n-modal>
    </div>
</template>

<script>
import { NButton, NCard, NModal, NTooltip } from "naive-ui";
import SelectInput from "./SelectInput";
import TextareaInput from "./TextareaInput";
import { computed, ref } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import Icon from "./Icon";

export default {
    setup() {
        const user = computed(() => usePage().props.value.auth.user);
        return {
            user,
            showModal: ref(false)
        };
    },
    name: "ReportDealForm",
    components: {
        NCard,
        NModal,
        NButton,
        NTooltip,
        TextareaInput,
        SelectInput,
        Icon
    },
    props: {
        bounty: Object,
        comment: Object
    },
    remember: "form",
    data() {
        return {
            form: this.$inertia.form({
                _method: "post",
                reason: "",
                comment: "",
                slug: this.bounty.slug
            })
        };
    },
    methods: {
        store() {
            this.form.post(`/report/comment/${this.comment.id}`, {
                onSuccess: () => this.form.reset("comment", "reason")
            });
        }
    },
};
</script>

<style scoped></style>
