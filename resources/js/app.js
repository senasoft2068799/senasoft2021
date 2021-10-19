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

// Instancias

const router = new VueRouter({
    mode: "history",
    routes: routes
});

const app = new Vue({
    el: "#app",
    router: router,
    render: h => h(App)
});