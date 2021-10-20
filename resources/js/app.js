// Dependencias
require('./bootstrap');
window.Vue = require('vue').default;

import App from "./App.vue";
import VueAxios from "vue-axios";
import VueRouter from "vue-router";
import axios from "axios";
import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";
import { routes } from "./routes";
import Storage from "./utilities/Storage.js";

// Configuración de imports
const swalOptions = {
    confirmButtonColor: "#198754",
    cancelButtonColor: "#dc3545",
    confirmButtonText: "Continuar",
    cancelButtonText: "Cancelar"
};

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(VueSweetalert2, swalOptions);

// Función autenticación
function loggedIn() {
    return Storage.get("token", false);
}

// Instancia router

const router = new VueRouter({
    mode: "history",
    routes: routes
});


// Redireccion por autenticación


router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // Se comprueba si el jugador ya inició sesión con el meta (requiresAuth)
        // De lo contrario, se redirige al login
        if (!loggedIn()) {
            next({
                path: '/auth',
                query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next() // Siempre se debe llamar next al finalizar
    }
});

// Instancia app

const app = new Vue({
    el: "#app",
    router: router,
    render: h => h(App)
});