<template>
  <div class="col-md-12">
    <div v-for="carta in json" :key="carta.id">
      <div class="contenedor">
        <div
          class="carta"
          style="margin-top: 0px; padding-top: 0px; height: 250px"
        >
          <div class="box">
            <div class="content">
              <img src="" />
              <h3>{{carta.nombre}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import cartas from "../../../../public/json/cartas.json";
export default {
  name: "Cartas",
  data() {
    return {
      json: cartas.cartas,
    };
  },
};
</script>