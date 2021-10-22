<template>
  <div>
    <FormPreguntaAcusacion :cartasSeleccionadas="cartasSeleccionadas" />
    <center>
      <div class="row-cols-1 row-cols-md-3 g-4 mt-3">
        <div class="contenedor-preguntas">
          <h1 style="color: white;">¡Selecciona las cartas que crees que son las que están ocultas!</h1>
          <PanelCartas @seleccionar="seleccionarCarta($event)"/>
        </div>
      </div>
    </center>
  </div>
</template>
<script>
import PanelCartas from "../Preguntas/PanelCartas.vue";
import FormPreguntaAcusacion from "../Preguntas/FormPreguntasAcusacion.vue";
export default {
  components: {
    PanelCartas,
    FormPreguntaAcusacion,
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
    //Este método funciona para que el usuario pueda seleccionar las cartas a acusar
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