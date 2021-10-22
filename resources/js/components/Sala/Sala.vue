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
      <TarjetaJugador :jugador="jugadores[0]" />
      <TarjetaJugador :jugador="jugadores[1]" />
      <TarjetaJugador :jugador="jugadores[2]" />
      <TarjetaJugador :jugador="jugadores[3]" />
    </div>
  </div>
</template>

<script>
import Storage from "../../utilities/Storage.js";
import TarjetaJugador from "./TarjetaJugador.vue";
export default {
  components: {
    TarjetaJugador,
  },
  data() {
    return {
      code: this.$route.params.id,
      jugadores: [],
      //Aquí se puede añadir el local storage para restaurar la partida
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
          this.jugadores = res.data.users;
          if (res.data.start) {
            this.$router.push(`/partida/${this.$route.params.id}`);
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>