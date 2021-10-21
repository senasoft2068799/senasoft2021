<template>
  <div class="container" style="margin-top: 50px">
    <div class="row">
      <div class="col-md-6">
        <Tabla />
      </div>
      <div class="col-md-6">
        <Cartas />
      </div>
    </div>
  </div>
</template>
<script>
import Cartas from "../Cartas.vue";
import Tabla from "./Tabla.vue";
export default {
  components: {
    Cartas,
    Tabla,
  },
};
</script>