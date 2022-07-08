import { ref } from "vue";

export const sortOptions = ref([
    { label: "Newest", value: "!created_at" },
    { label: "Oldest", value: "created_at" },
    { label: "Featured", value: "!is_featured" }
]);
