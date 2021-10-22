<template>
  <form
    class="form"
    style="
      padding-top: 0px;
      margin-top: 0px;
      max-width: 480px;
      width: 80%;
      height: 42px;
    "
  >
    <div class="form-container" style="margin-top: 30px">
      <div class="form-group" style="display: flex">
        <input
          type="text"
          class="form-input"
          disabled
          style="margin-top: 60px;"
          v-if="cartasSeleccionadas.programador"
          v-model="cartasSeleccionadas.programador.nombre"
        />
        <input type="text" class="form-input" disabled v-else />
        <h2 style="padding: 10px; font-size: 30px">|</h2>
        <input
          type="text"
          class="form-input"
          disabled
          style="margin-top: 60px;"
          v-if="cartasSeleccionadas.modulo"
          v-model="cartasSeleccionadas.modulo.nombre"
        />
        <input type="text" class="form-input" disabled v-else />
        <h2 style="padding: 10px; font-size: 30px">|</h2>
        <input
          type="text"
          class="form-input"
          disabled
          style="margin-top: 60px;"
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