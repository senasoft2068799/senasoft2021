import Index from "./pages/Index.vue";
import Auth from "./pages/Auth/Auth.vue";
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
        name: "Sala",
        path: "/sala",
        component: Sala,
        meta: { requiresAuth: true }
    },
];
