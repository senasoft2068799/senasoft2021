<template>
  <div>
    <div class="main-card">
      <button v-if="tipoCarta != 1" @click="tipoCarta--">Izquierda -</button>
      <button v-if="tipoCarta != 3" @click="tipoCarta++">Derecha +</button>
      <div class="cards">
        <div class="row">
          <div class="col-md-12">
            <h2 style="color: white" class="title">Programadores</h2>
          </div>
          <div
            v-for="datos in programadores"
            :key="datos.id"
            @click="seleccionarCarta(datos)"
          >
            <Cartas :cartaJugar="datos" />
          </div>
        </div>
      </div>
      <!-- <div class="cards">
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
      </div> -->
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
      tipoCarta: 1,
    };
  },
  methods: {
    seleccionarCarta(carta) {
      this.$emit("seleccionar", carta);
    },
  },
  computed: {
    programadores: function () {
      let tipo = this.tipoCarta;
      return this.cartasJson.filter(function (u) {
        if (u.tipo == tipo) return u.tipo;
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