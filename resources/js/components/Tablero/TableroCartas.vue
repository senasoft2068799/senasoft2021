<template>
  <div class="cards">
    <div class="row">
      <div class="col-md-12">
        <h2 style="color: white">Programadores</h2>
      </div>
      <Cartas />
      <Cartas />
      <Cartas />
    </div>
  </div>
</template>
<script>
import Cartas from "./Cartas.vue";
export default {
  name: "TableroCartas",
  components: {
    Cartas,
  },
};
</script>