<template>
  <div>
    <center>
      <div class="col-md-12">
        <h1 style="color: white; margin-top: 8%; font-size: 50px">
          ¡Aquí tenemos a nuestro ganador!
        </h1>
        <br /><br />
        <h1 style="color: white">Nombre del jugador</h1>
        <i class="fas fa-trophy" style="color: white; font-size: 100px"></i>
        <h2 style="color: white">
          ¡Felicidades "nombreJugador", eres el ganador del día de hoy!
        </h2>
        <h2 style="color: white">¿Ahora qué deseas hacer?</h2>
        <div style="display: flex;">
          <div class="col-md-4">
            <button
              @click="crearPartida()" class="botonGanador"
            >
              Crear partida
              <i class="fas fa-gamepad"></i>
            </button>
          </div>
          <div class="col-md-4">
            <button
              @click="crearPartida()" class="botonGanador"
            >
              Unirse a partida <i class="fas fa-sign-in-alt"></i>
            </button>
          </div>
          <div class="col-md-4">
            <button class="botonGanador">
              <router-link
                :to="{ name: 'index' }"
                style="text-decoration: none; color: black"
                >Volver al inicio <i class="fas fa-home"></i></router-link
              >
            </button>
          </div>
        </div>
      </div>
    </center>
  </div>
</template>
<script>
export default {
  data() {
    return {
      partida: {
        jugadore_id: 1,
      },
    };
  },
  methods: {
    crearPartida() {
      this.$swal({
        title: "Creando partida...",
      });
      this.$swal.showLoading();
      axios
        .post("/api/partida", this.partida)
        .then((res) => {
          Storage.record("partida", res.data, false);
          this.$swal.close();
          this.$router.push("/sala");
        })
        .catch((err) => {
          this.$swal({
            icon: "error",
            title: "Ha ocurrido un error:\n" + err,
          });
        });
    },
  },
};
</script>