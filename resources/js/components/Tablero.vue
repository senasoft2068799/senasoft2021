<template>
  <div class="container" style="margin-top: 50px">
    <div class="row">
      <div class="col-md-6">
        <Tablero />
      </div>
      <div class="col-md-6">
        <Cartas />
        <Cartas />
        <Cartas />
        <Cartas />
      </div>
    </div>
  </div>
</template>
<script>
import Cartas from "./Cartas.vue";
import Tablero from "./Tabla.vue";
export default {
  components: {
    Cartas,
    Tablero,
  },
};
</script>