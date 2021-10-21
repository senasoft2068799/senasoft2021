<template>
  <div>
    <div class="main-card">
      <div class="cards" style="margin-left: -100px">
        <div class="row">
          <div class="col-md-12">
            <h2 style="color: white" class="title">Programadores</h2>
          </div>
          <Cartas
            v-for="datos in programadores"
            :key="datos.id"
            :cartaJugar="datos"
          />
        </div>
      </div>
      <div class="cards">
        <div class="row">
          <div class="col-md-12">
            <h2 style="color: white" class="title">Módulos</h2>
          </div>
          <Cartas
            v-for="datos in modulos"
            :key="datos.id"
            :cartaJugar="datos"
          />
        </div>
      </div>
      <div class="cards">
        <div class="row">
          <div class="col-md-12">
            <h2 style="color: white" class="title">Errores</h2>
          </div>
          <Cartas
            v-for="datos in errores"
            :key="datos.id"
            :cartaJugar="datos"
          />
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
  </div>
</template>
<script>
import Cartas from "../Cartas.vue";
import infoCartas from "../../../../public/json/cartas.json";
export default {
  name: "PanelCartas",
  components: {
    Cartas,
  },
  data() {
    return {
      cartasJson: infoCartas.cartas,
    };
  },
  computed: {
    programadores: function () {
      return this.cartasJson.filter(function (u) {
        if (u.tipo == 1) return u.tipo;
      });
    },
    modulos: function () {
      return this.cartasJson.filter(function (u) {
        if (u.tipo == 2) return u.tipo;
      });
    },
    errores: function () {
      return this.cartasJson.filter(function (u) {
        if (u.tipo == 3) return u.tipo;
      });
    },
  },
};
</script>