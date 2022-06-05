<template>
    <div>
        <Transition name="slide-fade">
            <div v-if="$page.props.flash.success && show"
                 class="w-50 mx-auto fixed-top z-index-1 shadow alert alert-success alert-dismissible mb-2"
                 role="alert">
                <div class="d-flex align-items-center">
                    <i class="pi pi-check-circle mr-2"></i>
                    <span class="ml-10">{{ $page.props.flash.success }}</span>
                    <Button @click="close" icon="pi pi-times" class="p-button-rounded p-button-danger p-button-text" />
                </div>
            </div>
        </Transition>
        <Transition name="slide-fade">
            <div v-if="$page.props.flash.warning && show"
                 class="w-50 mx-auto fixed-top z-index-1 shadow alert alert-warning alert-dismissible mb-2"
                 role="alert">
                <div class="d-flex align-items-center">
                    <i class="pi pi-bell mr-2"></i>
                    <span class="ml-10">{{ $page.props.flash.warning }}</span>
                    <Button @click="close" icon="pi pi-times" class="p-button-rounded p-button-danger p-button-text" />
                </div>
            </div>
        </Transition>
        <Transition name="slide-fade">
            <div v-if="$page.props.flash.info && show"
                 class="w-50 mx-auto fixed-top z-index-1 shadow alert alert-info alert-dismissible mb-2"
                 role="alert">
                <div class="d-flex align-items-center">
                    <i class="pi pi-info-circle mr-2"></i>
                    <span class="ml-10">{{ $page.props.flash.info }}</span>
                    <Button @click="close" icon="pi pi-times" class="p-button-rounded p-button-danger p-button-text" />
                </div>
            </div>
        </Transition>
        <Transition name="slide-fade">
            <div v-if="($page.props.flash.error || Object.keys($page.props.errors).length > 0) && show"
                 class="w-50 mx-auto fixed-top z-index-1 shadow alert alert-danger alert-dismissible"
                 role="alert">
                <div v-if="$page.props.flash.error" class="d-flex align-items-center">
                    <i class="pi pi-exclamation-triangle"></i>
                    <span class="ml-10">{{ $page.props.flash.error }}</span>
                    <Button @click="close" icon="pi pi-times" class="p-button-rounded p-button-danger p-button-text" />
                </div>
                <div v-else class="d-flex align-items-center">
                    <span v-if="Object.keys($page.props.errors).length === 1">There is one form error.</span>
                    <span v-else>There are {{ Object.keys($page.props.errors).length }} form errors.</span>
                </div>
            </div>
        </Transition>
    </div>
</template>

<script>
import Button from "primevue/button";

export default {
    components: {
        Button
    },
    data() {
        return {
            show: true
        };
    },
    watch: {
        "$page.props.flash": {
            handler() {
                this.show = true;
                setTimeout(() => {
                    this.show = false;
                }, 2500);
            },
            deep: true
        }
    },
    methods: {
        close() {
            this.show = false;
        }
    }
};
</script>

<style scoped>
.slide-fade-enter-active {
    transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateX(20px);
    opacity: 0;
}
</style>
