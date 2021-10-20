import Index from "./pages/Index.vue";
import Login from "./pages/Auth/Login.vue"
import Login from "./pages/Auth/Register.vue"

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
        component: Login
    },
    {
        name: "register",
        path: "/register",
        component: Register
    }
];
