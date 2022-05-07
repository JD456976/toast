<template>
    <div class="col">
        <div id="modals"></div>
        <n-tooltip trigger="hover">
            <template #trigger>
                <n-button type="primary" @click="showModal = true">
                    Report Bounty
                </n-button>
            </template>
            Something wrong with this bounty? Let us know!
        </n-tooltip>
        <n-modal v-model:show="showModal">
            <n-card
                style="width: 600px"
                title="Report Bounty:"
                :bordered="false"
                size="huge"
                role="dialog"
                aria-modal="true"
            >
                <template #header-extra>
                    {{ bounty.item_name }}
                </template>
                <form @submit.prevent="store">
                    <select-input v-model="form.reason"
                                  :error="form.errors.reason"
                                  label="Reason">
                        <option v-if="input == null" disabled :value="null">
                            Select an option
                        </option>
                        <option value="Spam">Spam</option>
                        <option value="Incomplete">Incomplete</option>
                        <option value="Duplicate">Duplicate</option>
                        <option value="Other">Other</option>
                    </select-input>

                    <textarea-input v-model="form.comment"
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
        SelectInput
    },
    props: {
        bounty: Object
    },
    remember: "form",
    data() {
        return {
            form: this.$inertia.form({
                _method: "post",
                reason: "",
                comment: "",
                bounty_slug: this.bounty.slug
            })
        };
    },
    methods: {
        store() {
            this.form.post(`/report/bounty/${this.bounty.id}`, {
                onSuccess: () => this.form.reset("comment", "reason")
            });
        }
    }
};
</script>

<style scoped>

</style>
