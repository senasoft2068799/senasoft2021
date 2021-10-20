import Index from "./pages/Index.vue";
import Auth from "./pages/Auth/Auth.vue";
import Bienvenido from "./pages/Bienvenido.vue";
import Sala from "./pages/Sala.vue";

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
        name: "Bienvenido",
        path: "/bienvenido",
        component: Bienvenido,
        meta: { requiresAuth: true }
    },
    {
        name: "Sala",
        path: "/sala",
        component: Sala,
        meta: { requiresAuth: true }
    },
];
