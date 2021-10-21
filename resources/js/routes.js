import Index from "./pages/Index.vue";
import Auth from "./pages/Auth/Auth.vue";
import Sala from "./pages/Sala.vue";
import Reglas from "./pages/Reglas.vue";
import Tablero from "./components/Tablero.vue";

export const routes = [
    {
        name: "index",
        path: "/",
        component: Index,
        meta: { requiresAuth: true }
    },
    {
        name: "auth",
        path: "/auth",
        component: Auth,
    },
    {
        name: "Sala",
        path: "/sala",
        component: Sala,
        meta: { requiresAuth: true }
    },
    {
        name: "Reglas",
        path: "/reglas",
        component: Reglas,
        meta: { requiresAuth: true }
    },
    {
        name: "Tablero",
        path: "/tablero",
        component: Tablero,
        meta: { requiresAuth: true }
    },
];
