<template>
  <div class="col-sm-12 col-md-6 col-xl-4">
    <div class="contenedor">
      <div class="carta">
        <div class="box">
          <div class="content">
            <img :src="'/images/descarga.png'" class="img" alt="jugador1" />
            <h3 class="margin" v-if="jugador">{{ jugador.nickname }}</h3>
            <h3 v-else>Esperando...</h3>
            <div class="loader">Cargando...</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "CartaJugador",
  props: ["jugador"],
  data() {
    return {};
  },
};
</script>