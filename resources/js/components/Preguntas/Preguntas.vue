<template>
  <div>
    <FormPregunta
      v-if="currentUser"
      :cartasSeleccionadas="cartasSeleccionadas"
      :usuarioActual="currentUser.nickname"
    />
    <center>
      <div class="row-cols-1 row-cols-md-3 g-4 mt-3">
        <div class="contenedor-preguntas">
          <!-- <input type="radio" name="dot" id="uno" />
          <input type="radio" name="dot" id="dos" /> -->
          <PanelCartas @seleccionar="seleccionarCarta($event)" />
        </div>
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
    seleccionarCarta(event) {
      if (event.tipo == 1) {
        this.cartasSeleccionadas.programador = event;
      } else if (event.tipo == 2) {
        this.cartasSeleccionadas.modulo = event;
      } else if (event.tipo == 3) {
        this.cartasSeleccionadas.error = event;
      }
    },
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
