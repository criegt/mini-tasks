import './settings'

import Vue from 'vue'
import Router from 'vue-router'

import Home from './components/Home.vue'
import Navbar from './components/layouts/Navbar.vue'
import BackToTop from './components/layouts/BackToTop.vue'

import router from './router'
import iziToast from 'izitoast'

Vue.use(Router)

Vue.component('home', Home)
Vue.component('navbar', Navbar)
Vue.component('back-to-top', BackToTop)

Vue.prototype.$http = window.axios
Vue.prototype.$alert = iziToast

const app = new Vue({
    router,
    el: '#app'
});
