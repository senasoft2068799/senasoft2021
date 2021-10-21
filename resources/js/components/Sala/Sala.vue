<template>
  <div id="sala" class="container">
    <div class="row" style="margin-top: 30px">
      <div class="col-md-2"></div>
      <div class="col-md-8" style="text-align: center; color: white">
        <center>
          <h1 class="code" :style="{ background: '#' + code }">
            {{ code }}
          </h1>
          <h2>
            ¡Comparte este código con tus amigos para que se puedan unir a la
            partida!
          </h2>
        </center>
        <hr />
        <h1>Esperando jugadores...</h1>
      </div>
    </div>
    <div class="col-md-2"></div>
    <div class="row d-flex" style="margin-top: -40px">
      <CartaJugador :jugador="jugadores[0]" />
      <CartaJugador :jugador="jugadores[1]" />
      <CartaJugador :jugador="jugadores[2]" />
      <CartaJugador :jugador="jugadores[3]" />
    </div>
  </div>
</template>

<script>
import Storage from "../../utilities/Storage.js";
import CartaJugador from "./CartaJugador.vue";
export default {
  components: {
    CartaJugador,
  },
  data() {
    return {
      code: localStorage.getItem("partida"),
      jugadores: [],
    };
  },
  mounted() {
    this.getListaEspera();
    this.interval = setInterval(
      function () {
        this.getListaEspera();
      }.bind(this),
      5000
    );
  },
  methods: {
    getListaEspera() {
      this.axios
        .get(`/api/lista-espera/${this.$route.params.id}`)
        .then((res) => {
          this.jugadores = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>