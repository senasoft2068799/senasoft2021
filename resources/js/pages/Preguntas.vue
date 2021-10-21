<template>
  <div>
    <FormPregunta />
    <center>
      <div class="row-cols-1 row-cols-md-3 g-4 mt-3">
        <div class="contenedor-preguntas">
          <input type="radio" name="dot" id="uno" />
          <input type="radio" name="dot" id="dos" />
          <input type="radio" name="dot" id="tres" />
          <div class="main-card">
            <TableroCartas />
            <div class="botonDash">
              <label for="dos" class="dos" style="margin-left: -50px;"
                ><i
                  class="fas fa-arrow-right"
                  style="font-size: 65px; margin-left: 2px"
                ></i
              ></label>
            </div>
            <div class="botonDash">
            <label for="uno" class="uno" style="margin-right: -100px;"
                ><i
                  class="fas fa-arrow-left"
                  style="font-size: 65px; margin-left: 2px"
                ></i
              ></label>
            </div>
            <TableroCartas style="margin-right: -15px;"/>
            <div class="botonDash">
              <label for="tres" class="tres" style="margin-left: -50px;"
                ><i
                  class="fas fa-arrow-right"
                  style="font-size: 65px; margin-left: 2px"
                ></i
              ></label>
            </div>
            <div class="botonDash">
              <label for="dos" class="dos" style="margin-right: -100px;"
                ><i
                  class="fas fa-arrow-left"
                  style="font-size: 65px; margin-left: 2px"
                ></i
              ></label>
            </div>
            <TableroCartas />
          </div>
        </div>
      </div>
    </center>
  </div>
</template>
<script>
import TableroCartas from "./Tablero-Preguntas/TableroCartas.vue";
import FormPregunta from "./Tablero-Preguntas/FormPregunta.vue";
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