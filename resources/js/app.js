import { InertiaApp } from "@inertiajs/inertia-vue"
import Vue from 'vue'
import route from 'ziggy'
import VueToastr from '@deveodk/vue-toastr'

require('./bootstrap')
Vue.use(InertiaApp)

const options = {
    toast: {
        defaultPosition: 'toast-top-left',
        defaultTimeout: 3000
    }
}

Vue.use(VueToastr, options)

Vue.config.productionTip = false

Vue.mixin({
    methods: {
        route: (name, params, absolute) => route(name, params, absolute, Ziggy),
    },
});

const app = document.getElementById('app')

new Vue({
    render: h => h(InertiaApp, {
        props: {
            initialPage: JSON.parse(app.dataset.page),
            resolveComponent: name => require(`./Pages/${name}`).default,
        },
    }),
}).$mount(app)
