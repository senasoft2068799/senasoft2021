<template>
  <form
    class="form"
    style="
      padding-top: 0px;
      margin-top: 0px;
      max-width: 880px;
      width: 80%;
      height: 50px;
    "
  >
    <div class="form-container" style="margin-top: 30px">
      <div class="form-group" style="display: flex">
        <h2 class="h2Preguntas">El programador</h2>
        <input
          type="text"
          class="form-input inputPreguntas"
          disabled
          v-if="cartasSeleccionadas.programador"
          v-model="cartasSeleccionadas.programador.nombre"
        />
        <input type="text" class="form-input" disabled v-else />
        <h2 class="h2Preguntas">generó en el módulo</h2>
        <input
          type="text"
          class="form-input inputPreguntas"
          disabled
          v-if="cartasSeleccionadas.modulo"
          v-model="cartasSeleccionadas.modulo.nombre"
        />
        <input type="text" class="form-input" disabled v-else />
        <h2 class="h2Preguntas">un error</h2>
        <input
          type="text"
          class="form-input inputPreguntas"
          disabled
          v-if="cartasSeleccionadas.error"
          v-model="cartasSeleccionadas.error.nombre"
        />
        <input type="text" class="form-input" disabled v-else />
        <button type="submit" class="botonPreguntas">Realizar pregunta</button>
      </div>
    </div>
  </form>
</template>
<script>
import Cartas from "../Cartas.vue";
export default {
  name: "FormPregunta",
  props: ["cartasSeleccionadas"],
  components: {
    Cartas,
  },
};
</script>