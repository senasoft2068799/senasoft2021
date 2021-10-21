import Index from "./pages/Index.vue";
import Auth from "./pages/Auth/Auth.vue";
import Ganador from "./pages/Ganador.vue";
import Sala from "./pages/Sala.vue";
import Preguntas from "./pages/Preguntas.vue";

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
    {
        name: "Sala",
        path: "/sala",
        component: Sala,
        meta: { requiresAuth: true }
    },
    {
        name: "preguntas",
        path: "/preguntas",
        component: Preguntas,
    },
];
