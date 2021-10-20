import Index from "./pages/Index.vue";
import Login from "./pages/Auth/Login.vue"

export const routes = [
    {
        name: "index",
        path: "/",
        component: Index,
        meta: { requiresAuth: true }
    },
    {
        name: "login",
        path: "/login",
        component: Login,
    },
];
