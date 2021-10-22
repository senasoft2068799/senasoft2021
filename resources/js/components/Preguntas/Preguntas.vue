<template>
  <div>
    <FormPregunta :cartasSeleccionadas="cartasSeleccionadas" />
    <center>
      <div class="contenedor-preguntas">
        <PanelCartas @seleccionar="seleccionarCarta($event)" />
      </div>
    </center>
  </div>
</template>
<script>
import PanelCartas from "./PanelCartas.vue";
import FormPregunta from "./FormPregunta.vue";
export default {
  components: {
    PanelCartas,
    FormPregunta,
  },
  data() {
    return {
      cartasSeleccionadas: {
        programador: null,
        modulo: null,
        error: null,
      },
    };
  },
  methods: {
    seleccionarCarta(event) {
      if (event.tipo == 1) {
        this.cartasSeleccionadas.programador = event;
      } else if (event.tipo == 2) {
        this.cartasSeleccionadas.modulo = event;
      } else if (event.tipo == 3) {
        this.cartasSeleccionadas.error = event;
      }
    },
  },
};
</script>