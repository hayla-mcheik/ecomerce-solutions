import "./bootstrap";
import "../css/app.css";

import { createApp, h, onMounted, ref } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/vue3";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import GuestLayout from "./Layouts/GuestLayout.vue";
import AuthenticatedLayout from "./Layouts/AuthenticatedLayout.vue";
import { createPinia } from "pinia";
import  ToastContainer  from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.baseURL = import.meta.env.VITE_API_BASE_URL || '';
const pinia = createPinia();
createInertiaApp({
    
    title: (title) => `${title} - NanoEssence`,
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        let page = pages[`./Pages/${name}.vue`];

        if (name.startsWith("Admin/")) {
            page.default.layout = AuthenticatedLayout;
        } else {
            page.default.layout = GuestLayout;
        }
        return page;
    },
    setup({ el, App, props, plugin }) {
        const vueApp = createApp({ 
            render: () => h(App, props),
        })
        .use(plugin)
        .use(pinia)
        .use(ZiggyVue)
        .component("Head", Head)
        .component("Link", Link)
        .component('ToastContainer', ToastContainer)
        vueApp.mount(el);
    },
    progress: {
        color: "#4f46e5",
        showSpinner: true,
    },
});