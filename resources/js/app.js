import './bootstrap';
import "bootstrap";

import { createApp } from "vue";

import ExampleCounter from "App.vue";

const app = createApp({});

app.component("example-counter", ExampleCounter);

const mountedApp = app.mount("#app");
// import { createApp, h } from 'vue'
// import { createInertiaApp } from '@inertiajs/vue3'

// createInertiaApp({
//   resolve: name => {
//     const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
//     // return pages[`./Pages/${name}.vue`]
//     return pages[`./Pages/User/Show.vue`]
//   },
//   setup({ el, App, props, plugin }) {
//     createApp({ render: () => h(App, props) })
//       .use(plugin)
//       .mount(el)
//   },
// })