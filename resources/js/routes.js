import Index from "./pages/Index.vue";
import Login from "./pages/Auth/Login.vue"

export const routes = [
    {
        name: "index",
        path: "/",
        component: Index
    },
    {
        name: "login",
        path: "/login",
        component: Login
    }
];
