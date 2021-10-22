<template>
  <div class="container" style="margin-top: 50px">
    <div class="row">
      <div class="col-md-6">
        <Tablero
          :usuarioActual="currentUser.nickname"
          v-if="currentUser.nickname != null"
        />
      </div>
      <div class="col-md-6">
        <!-- <Cartas /> -->
      </div>
    </div>
  </div>
</template>
<script>
import Cartas from "../Cartas.vue";
import Tablero from "./Tablero.vue";
import Storage from "../../utilities/Storage.js";
export default {
  components: {
    Cartas,
    Tablero,
  },
  data() {
    return {
      informacionTurno: {},
      currentUser: {
        nickname: null,
      },
      token: null,
    };
  },
  mounted() {
    this.checkCurrentUser();
    this.interval = setInterval(
      function () {
        this.preguntarJugador();
      }.bind(this),
      10000
    );
  },
  methods: {
    preguntarJugador() {
      this.axios
        .get(`/api/informacion-turno/${this.$route.params.id}`)
        .then((res) => {
          this.informacionTurno = res.data;
          if (
            this.informacionTurno.jugador_pregunta == this.currentUser.nickname
          ) {
            this.pregunta();
          } else if (
            this.informacionTurno.jugador_respuesta == this.currentUser.nickname
          ) {
            this.respuesta();
          } else {
            console.log("No te toca turno aún.");
            //Espera
          }
        })
        .catch((err) => {
          console.log(err);
        });
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
    pregunta() {
      this.$router.push(`/decision/${this.$route.params.id}`);
    },
    respuesta() {
      this.$router.push(`/respuesta/${this.$route.params.id}`);
    },
  },
};
</script>