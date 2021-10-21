import Index from "./components/Index.vue";
import Auth from "./components/Auth/Auth.vue";
import Ganador from "./components/Ganador.vue";
import Sala from "./components/Sala/Sala.vue";
import Preguntas from "./components/Preguntas/Preguntas.vue";
import Reglas from "./components/Reglas.vue";
import Tablero from "./components/Partida/Tablero.vue";

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
        meta: { requiresAuth: true }
    },
    {
        name: "Sala",
        path: "/sala/:id",
        component: Sala,
        meta: { requiresAuth: true }
    },
    {
        name: "preguntas",
        path: "/preguntas",
        component: Preguntas,
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
