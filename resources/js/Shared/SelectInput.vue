<template>
    <div :class="$attrs.class">
        <label v-if="label" class="form-label" :for="id">{{ label }}:</label>
        <select :id="id" ref="input" v-model="selected" v-bind="{ ...$attrs, class: null }" class="form-select"
                :class="{ error: error }">
            <slot />
        </select>
        <div v-if="error"
             class="alert alert-danger alert-dismissible mb-2" role="alert">
            <div class="d-flex align-items-center">
                <i class="bx bx-error"></i>
                <span>{{ error }}</span>
            </div>
        </div>
    </div>
</template>

<script>
import { v4 as uuid } from "uuid";

export default {
    inheritAttrs: false,
    props: {
        id: {
            type: String,
            default() {
                return `select-input-${uuid()}`;
            }
        },
        error: String,
        label: String,
        modelValue: [String, Number, Boolean]
    },
    emits: ["update:modelValue"],
    data() {
        return {
            selected: this.modelValue
        };
    },
    watch: {
        selected(selected) {
            this.$emit("update:modelValue", selected);
        }
    },
    methods: {
        focus() {
            this.$refs.input.focus();
        },
        select() {
            this.$refs.input.select();
        }
    }
};
</script>
