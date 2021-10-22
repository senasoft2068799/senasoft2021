<template>
  <div class="container">
    <div class="col-md-12">
      <center>
        <h1 style="color: white; padding-top: 40px">
          ¡Ups! Al parecer alguien ha preguntado acerca de 2 o más cartas que
          tienes
        </h1>
        <h1 style="color: white">¿Cuál quieres mostrarle?</h1>
      </center>
    </div>
    <div class="row d-flex">
      <div class="col-md-4">
        <div class="contenedor">
          <div
            class="carta"
            style="margin-top: 0px; padding-top: 0px; height: 250px; margin-bottom: 0px;"
          >
            <div class="box">
              <div class="content">
                <img src="" />
                <h3>Nombre carta</h3>
                <input type="text" style="display: none" v-model="prueba" />
                <button style="color: white" @click="seleccionarCarta()">
                  Seleccionar
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contenedor">
          <div
            class="carta"
            style="margin-top: 0px; padding-top: 0px; height: 250px; margin-bottom: 0px;"
          >
            <div class="box">
              <div class="content">
                <img src="" />
                <h3>Nombre carta</h3>
                <input type="text" style="display: none" v-model="prueba" />
                <button style="color: white" @click="seleccionarCarta()">
                  Seleccionar
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contenedor">
          <div
            class="carta"
            style="margin-top: 0px; padding-top: 0px; height: 250px"
          >
            <div class="box">
              <div class="content">
                <img src="" />
                <h3>Nombre carta</h3>
                <input type="text" style="display: none" v-model="prueba" />
                <button style="color: white" @click="seleccionarCarta()">
                  Seleccionar
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {};
</script>