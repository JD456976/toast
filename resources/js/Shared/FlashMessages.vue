<template>
    <div>
        <Transition name="slide-fade">
            <div v-if="$page.props.flash.success && show"
                 class="w-50 mx-auto fixed-top z-index-1 flex align-items-start p-4 bg-green-100 border-round border-1 border-green-300">
                <i class="pi pi-check-circle text-green-900 text-2xl mr-3"></i>
                <div class="mr-3">
                    <div class="text-green-900 font-medium text-xl mb-2 line-height-1">Success</div>
                    <p class="m-0 p-0 text-green-700 line-height-3">
                        {{ $page.props.flash.success }}
                    </p>
                </div>
                <div class="ml-auto">
                    <a v-ripple
                       class="inline-flex align-items-center justify-content-center ml-auto border-circle hover:bg-green-50 no-underline cursor-pointer transition-colors transition-duration-150 p-ripple"
                       style="width:1.5rem;height:1.5rem">
                        <i @click="close" class="pi pi-times text-green-900"></i>
                    </a>
                </div>
            </div>
        </Transition>
        <Transition name="slide-fade">
            <div v-if="$page.props.session.status && show"
                 class="w-50 mx-auto fixed-top z-index-1 flex align-items-start p-4 bg-green-100 border-round border-1 border-green-300">
                <i class="pi pi-check-circle text-green-900 text-2xl mr-3"></i>
                <div class="mr-3">
                    <div class="text-green-900 font-medium text-xl mb-2 line-height-1">Success</div>
                    <p class="m-0 p-0 text-green-700 line-height-3">
                        {{ $page.props.session.status }}
                    </p>
                </div>
                <div class="ml-auto">
                    <a v-ripple
                       class="inline-flex align-items-center justify-content-center ml-auto border-circle hover:bg-green-50 no-underline cursor-pointer transition-colors transition-duration-150 p-ripple"
                       style="width:1.5rem;height:1.5rem">
                        <i @click="close" class="pi pi-times text-green-900"></i>
                    </a>
                </div>
            </div>
        </Transition>
        <Transition name="slide-fade">
            <div v-if="$page.props.flash.warning && show"
                 class="w-50 mx-auto fixed-top z-index-1 flex align-items-start p-4 bg-yellow-100 border-round border-1 border-yellow-300">
                <i class="pi pi-exclamation-triangle text-yellow-900 text-2xl mr-3"></i>
                <div class="mr-3">
                    <div class="text-yellow-900 font-medium text-xl mb-2 line-height-1">Attention</div>
                    <p class="m-0 p-0 text-yellow-700 mb-3 line-height-3">
                        {{ $page.props.flash.warning }}
                    </p>
                </div>
                <div class="ml-auto">
                    <a v-ripple
                       class="inline-flex align-items-center justify-content-center ml-auto border-circle hover:bg-yellow-50 no-underline cursor-pointer transition-colors transition-duration-150 p-ripple"
                       style="width:1.5rem;height:1.5rem">
                        <i class="pi pi-times text-yellow-900"></i>
                    </a>
                </div>
            </div>
        </Transition>
        <Transition name="slide-fade">
            <div v-if="$page.props.flash.info && show"
                 class="w-50 mx-auto fixed-top z-index-1 flex align-items-start p-4 bg-blue-100 border-round border-1 border-blue-300">
                <i class="pi pi-exclamation-circle text-blue-900 text-2xl mr-3"></i>
                <div class="mr-3">
                    <div class="text-blue-900 font-medium text-xl mb-2 line-height-1">Attention</div>
                    <p class="m-0 p-0 text-blue-700 mb-3 line-height-3">
                        {{ $page.props.flash.info }}
                    </p>
                </div>
                <div class="ml-auto">
                    <a v-ripple
                       class="inline-flex align-items-center justify-content-center ml-auto border-circle hover:bg-blue-50 no-underline cursor-pointer transition-colors transition-duration-150 p-ripple"
                       style="width:1.5rem;height:1.5rem">
                        <i class="pi pi-times text-blue-900"></i>
                    </a>
                </div>
            </div>
        </Transition>
        <Transition name="slide-fade">
            <div v-if="($page.props.flash.error || Object.keys($page.props.errors).length > 0) && show"
                 class="w-50 mx-auto fixed-top z-index-1 flex align-items-start p-4 bg-pink-100 border-round border-1 border-pink-300">
                <i class="pi pi-times-circle text-pink-900 text-2xl mr-3"></i>
                <div v-if="$page.props.flash.error" class="mr-3">
                    <div class="text-pink-900 font-medium text-xl mb-2 line-height-1">Error</div>
                    <p class="m-0 p-0 text-pink-700 line-height-3">
                        {{ $page.props.flash.error }}
                    </p>
                </div>
                <div v-else class="d-flex align-items-center">
                    <span v-if="Object.keys($page.props.errors).length === 1">There is one form error.</span>
                    <span v-else>There are {{ Object.keys($page.props.errors).length }} form errors.</span>
                </div>
                <div class="ml-auto">
                    <a v-ripple
                       class="inline-flex align-items-center justify-content-center ml-auto border-circle hover:bg-pink-50 no-underline cursor-pointer transition-colors transition-duration-150 p-ripple"
                       style="width:1.5rem;height:1.5rem">
                        <i @click="close" class="pi pi-times text-pink-900"></i>
                    </a>
                </div>
            </div>
        </Transition>
    </div>
</template>

<script>
import Button from "primevue/button";
import Tooltip from "primevue/tooltip";
import Ripple from "primevue/ripple";

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
    directives: {
        "tooltip": Tooltip,
        "ripple": Ripple
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
