<template>
  <div class="col-md-12">
    <div class="contenedor">
      <div
        class="carta"
        style="margin-top: 0px; padding-top: 0px; height: 250px"
      >
        <div class="box">
          <div class="content">
            <img src="" />
            <h3>{{ cartaJugar.nombre }}</h3>
            <input type="text" style="display: none" v-model="prueba" />
            <button style="color: white">Seleccionar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Carta",
  props: ["cartaJugar"],
  data() {
    return {
      prueba: null,
    };
  },
  methods: {
    //Este método funciona para cuando el usuario seleccione una carta, se mostrará en la vista
    seleccionarCarta() {
      this.prueba = this.cartaJugar.nombre;
      this.$emit("seleccionar", this.cartaJugar);
    },
  },
};
</script>