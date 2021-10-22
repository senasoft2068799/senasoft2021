<template>
  <div>
    <center>
      <div class="row-cols-1 row-cols-md-3 g-4 mt-3">
        <div class="contenedor-preguntas">
          <input type="radio" name="dot" id="uno" />
          <input type="radio" name="dot" id="dos" />
          <input type="radio" name="dot" id="tres" />
          <PanelCartas />
        </div>
      </div>
    </center>
  </div>
</template>
<script>
import PanelCartas from "../Preguntas/PanelCartas.vue";
export default {
  components: {
    PanelCartas,
  },
  data() {
    return {
      
    };
  },
};
</script>