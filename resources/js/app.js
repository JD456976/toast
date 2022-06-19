import { createApp, h } from "vue";
import { createInertiaApp, InertiaLink } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import PrimeVue from "primevue/config";
import MainLayout from "@/Shared/MainLayout";
import ToastService from "primevue/toastservice";
import BadgeDirective from "primevue/badgedirective";
import Ripple from "primevue/ripple";
import ConfirmationService from "primevue/confirmationservice";
import InstantSearch from "vue-instantsearch/vue3/es";

InertiaProgress.init({ includeCSS: true, showSpinner: true });

createInertiaApp({
    resolve: (name) => {
        const page = require(`./Pages/${name}`).default;
        page.layout = page.layout || MainLayout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        const VueApp = createApp({ render: () => h(App, props) });

        VueApp.config.globalProperties.$route = route;

        VueApp.use(plugin)
            .use(PrimeVue, { ripple: true })
            .directive("ripple", Ripple)
            .directive("badge", BadgeDirective)
            .use(ToastService)
            .use(ConfirmationService)
            .use(InstantSearch)
            .mixin({ methods: { route } })
            .component("Link", InertiaLink)
            .mount(el);
    },
});
