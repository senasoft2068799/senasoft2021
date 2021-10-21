<template>
  <div>
    <FormPregunta />
    <center>
      <div class="row-cols-1 row-cols-md-3 g-4 mt-3">
        <input type="radio" name="dot" id="uno" />
        <input type="radio" name="dot" id="dos" />
        <input type="radio" name="dot" id="tres" />
        <div class="contenedor-preguntas">
          <div class="botonDash">
            <label for="uno" class="uno" style="margin-right: 20px"
              ><i
                class="fas fa-arrow-left"
                style="font-size: 65px; margin-left: 2px"
              ></i
            ></label>
          </div>
          <TableroCartas />
          <div class="botonDash">
            <label for="dos" class="dos" style="margin-left: -150px"
              ><i
                class="fas fa-arrow-right"
                style="font-size: 65px; margin-left: 2px"
              ></i
            ></label>
          </div>
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