import Index from "./components/Index.vue";
import Auth from "./components/Auth/Auth.vue";
import Ganador from "./components/Ganador.vue";
import Sala from "./components/Sala/Sala.vue";
import Preguntas from "./components/Preguntas/Preguntas.vue";
import Reglas from "./components/Reglas.vue";
import Dashboard from "./components/Partida/Dashboard.vue";
import Decision from "./components/Partida/Decision.vue";
import Acusacion from "./components/Partida/Acusacion.vue";
import Respuesta from "./components/Partida/Respuesta.vue";

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
        path: "/ganador/:id",
        component: Ganador,
        meta: { requiresAuth: true }
    },
    {
        name: "sala",
        path: "/sala/:id",
        component: Sala,
        meta: { requiresAuth: true }
    },
    {
        name: "preguntas",
        path: "/pregunta/:id",
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
        name: "Dashboard",
        path: "/partida/:id",
        component: Dashboard,
        meta: { requiresAuth: true }
    },

    {
        name: "Decision",
        path: "/decision/:id",
        component: Decision,
        meta: { requiresAuth: true }
    },

    {
        name: "Acusacion",
        path: "/acusacion",
        component: Acusacion,
        meta: { requiresAuth: true }
    },

    {
        name: "Respuesta",
        path: "/respuesta/:id",
        component: Respuesta,
        meta: { requiresAuth: true }
    },
];
