import { InertiaApp } from "@inertiajs/inertia-vue"
import Vue from 'vue'
import route from 'ziggy'
import Snotify, { SnotifyPosition } from 'vue-snotify'

require('./bootstrap')
Vue.use(InertiaApp)

const options = {
    toast: {
        position: SnotifyPosition.rightTop
    }
}

Vue.use(Snotify, options)

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
