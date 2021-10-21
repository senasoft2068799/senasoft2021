<template>
  <div class="col-md-6">
    <div class="contenedor">
      <div
        class="carta"
        style="margin-top: 0px; padding-top: 0px; height: 250px"
      >
        <div class="box">
          <div class="content" v-for="(datos, index) in datosCarta" :key="index">
            <img src="" />
            <h3>{{datos.nombre}}</h3>
            <h3>{{datos.tipo}}</h3>
            <button style="color: white">Seleccionar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import infoCartas from "../../../public/json/cartas.json";
export default {
  name: "Carta",
  data() {
    return {
      datosCarta: infoCartas.cartas
    };
  },
};
</script>