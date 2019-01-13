window.axios = require('axios')
import NProgress from 'nprogress'

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'


//Barra superior de carga
NProgress.configure({
    minimum: 0.2,
    showSpinner: false
});

// Interceptor para las peticiones
window.axios.interceptors.request.use(function(config) {
    NProgress.start();
    return config
}, function(error) {
    return Promise.reject(error)
})

// Interceptor para la respuesta
window.axios.interceptors.response.use(function(response) {
    NProgress.done()
    return response
}, function(error) {
    return Promise.reject(error)
})

let token = document.head.querySelector('meta[name="csrf-token"]')

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}