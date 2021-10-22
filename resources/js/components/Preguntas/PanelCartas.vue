<template>
  <div>
    <div class="main-card">
      <button v-if="tipoCarta != 1" @click="tipoCarta--" class="flecha" style="margin-right: 500px;"><i class="fas fa-arrow-left"></i></button>
      <div class="cards">
        <div class="row">
          <div class="col-md-12">
            <h2 v-if="tipoCarta == 1" style="color: white" class="title">Programadores</h2>
            <h2 v-if="tipoCarta == 2" style="color: white" class="title">Módulos</h2>
            <h2 v-if="tipoCarta == 3" style="color: white" class="title">Errores</h2>
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
      <button v-if="tipoCarta != 3" @click="tipoCarta++" class="flecha" style="margin-left: 550px;"><i class="fas fa-arrow-right"></i></button>
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
    //Estas funciones son para dividr los tipos de cartas para así poder mostrarlas
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