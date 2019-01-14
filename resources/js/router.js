import Vue from 'vue'
import Router from 'vue-router'
import NProgress from 'nprogress'

import Home from './components/Home.vue'
import About from './components/About.vue'
import ShowTask from './components/Tasks/ShowTask.vue'

Vue.use(Router)

// Modo Historial activado
const router = new Router({
    mode: 'history',
    routes: [{
            path: '/',
            name: 'root',
            component: Home
        }, 
        {
            path: '/home',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/tasks/:id',
            name: 'showTask',
            component: ShowTask
        }
    ]
})

//Antes de cargar ruta
router.beforeResolve((to, from, next) => {
    if (to.name) {
        NProgress.start()
    }
    next()
})

//Despues de cargar ruta
router.afterEach((to, from) => {
    NProgress.done()
})

export default router
