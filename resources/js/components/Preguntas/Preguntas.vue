<template>
  <div>
    <FormPregunta
      v-if="currentUser"
      :cartasSeleccionadas="cartasSeleccionadas"
      :usuarioActual="currentUser.nickname"
    />
    <center>
      <div class="contenedor-preguntas">
        <PanelCartas @seleccionar="seleccionarCarta($event)" />
      </div>
    </center>
  </div>
</template>
<script>
import PanelCartas from "./PanelCartas.vue";
import FormPregunta from "./FormPregunta.vue";
import Storage from "../../utilities/Storage.js";
export default {
  components: {
    PanelCartas,
    FormPregunta,
  },
  //Este método es para verificar el usuario que está realizando la pregunta
  mounted() {
    this.checkCurrentUser();
  },
  data() {
    return {
      cartasSeleccionadas: {
        programador: null,
        modulo: null,
        error: null,
      },
      currentUser: {
        nickname: null,
      },
      token: null,
    };
  },
  methods: {
    //Este método es para que el usuario pueda seleccionar una carta del tablero
    //Este se divide en los tipos de carta que hay que son: programador, módulo y error
    seleccionarCarta(event) {
      if (event.tipo == 1) {
        this.cartasSeleccionadas.programador = event;
      } else if (event.tipo == 2) {
        this.cartasSeleccionadas.modulo = event;
      } else if (event.tipo == 3) {
        this.cartasSeleccionadas.error = event;
      }
    },
    //Este método principalmente será para verificar que el usuario se encuentre registrado en el sistema
    //Este se valida por medio de un token que genera automáticamente laravel en el almacenamiento de aplicación y vue lo trae con Storage
    checkCurrentUser() {
      if (Storage.has("token")) {
        this.token = Storage.get("token", false);
        window.axios.defaults.headers.common[
          "Authorization"
        ] = `Bearer ${this.token}`;
        this.axios
          .get("/api/user")
          .then((res) => {
            this.currentUser = res.data;
          })
          .catch((err) => {
            console.log("Error autenticación: " + err);
            Storage.remove("token");
            this.$router.push("/");
          });
      } else {
        this.currentUser = {};
        this.token = null;
      }
    },
  },
};
</script>
