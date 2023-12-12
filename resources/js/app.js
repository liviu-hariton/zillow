import { createApp, h } from 'vue'
import { createPinia } from 'pinia'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { ZiggyVue } from 'ziggy'

// define a default layout
import MainLayout from '@/Layouts/MainLayout.vue'

const pinia = createPinia()

createInertiaApp({
  resolve: async (name) => {
    const pages = import.meta.glob('./Pages/**/*.vue')

    // define a default layout
    const page = await pages[`./Pages/${name}.vue`]()
    // if the page has a layout defined use it,
    // otherwise use the default one - MainLayout in this case
    page.default.layout = page.default.layout || MainLayout

    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(pinia)
      .use(ZiggyVue)
      .mount(el)
  },
})
