<template>
  <div class="main-card">
    <div class="botonDash">
      <label for="uno" class="uno"
        ><i
          class="fas fa-arrow-left"
          style="font-size: 65px; margin-left: 2px"
        ></i
      ></label>
    </div>
    <div class="cards">
      <div class="row">
        <div class="col-md-12">
          <h2 style="color: white;" class="title">Programadores</h2>
        </div>
        <Cartas />
        <Cartas />
        <Cartas />
      </div>
    </div>
    <div class="botonDash">
      <label for="dos" class="dos"
        ><i
          class="fas fa-arrow-right"
          style="font-size: 65px; margin-left: 2px"
        ></i
      ></label>
    </div>
  </div>
</template>
<script>
import Cartas from "../Cartas.vue";
export default {
  name: "TableroCartas",
  components: {
    Cartas,
  },
};
</script>