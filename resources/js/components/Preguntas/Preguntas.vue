<template>
  <div>
    <FormPregunta />
    <center>
      <div class="row-cols-1 row-cols-md-3 g-4 mt-3">
        <div class="contenedor-preguntas">
          <input type="radio" name="dot" id="uno" />
          <input type="radio" name="dot" id="dos" />
          <input type="radio" name="dot" id="tres" />
          <TableroCartas />
        </div>
      </div>
    </center>
  </div>
</template>
<script>
import TableroCartas from "./TableroCartas.vue";
import FormPregunta from "./FormPregunta.vue";
export default {
  components: {
    TableroCartas,
    FormPregunta,
  },
  data() {
    return {
      programador: "",
    };
  },
};
</script>