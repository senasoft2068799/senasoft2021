import Index from "./pages/Index.vue";
import Auth from "./pages/Auth/Auth.vue";
import Ganador from "./pages/Ganador.vue";

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
        name: "ganador",
        path: "/ganador",
        component: Ganador,
    },
];
