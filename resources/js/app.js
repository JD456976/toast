import { createApp, h } from 'vue';
import { createInertiaApp, InertiaLink } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import PrimeVue from 'primevue/config';

InertiaProgress.init();

createInertiaApp({
    resolve: (name) => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        const VueApp = createApp({ render: () => h(App, props) });

        VueApp.config.globalProperties.$route = route;

        VueApp.use(plugin)
            .use(PrimeVue)
            .mixin({ methods: { route } })
            .component('Link', InertiaLink)
            .mount(el);
    },
});
