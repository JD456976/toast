<template>
    <div>
        <div v-if="$page.props.flash.success && show" class="alert alert-success alert-dismissible mb-2" role="alert">
            <div class="d-flex align-items-center">
                <i class="bx bx-error"></i>
                <span>{{ $page.props.flash.success }}</span>
            </div>
        </div>

        <div v-if="($page.props.flash.error || Object.keys($page.props.errors).length > 0) && show"
             class="alert alert-danger alert-dismissible mb-2" role="alert">
            <div v-if="$page.props.flash.error" class="d-flex align-items-center">
                <i class="bx bx-error"></i>
                <span>{{ $page.props.flash.error }}</span>
            </div>
            <div v-else class="d-flex align-items-center">
                <span v-if="Object.keys($page.props.errors).length === 1">There is one form error.</span>
                <span v-else>There are {{ Object.keys($page.props.errors).length }} form errors.</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            show: true
        };
    },
    watch: {
        "$page.props.flash": {
            handler() {
                this.show = true;
            },
            deep: true
        }
    }
};
</script>
