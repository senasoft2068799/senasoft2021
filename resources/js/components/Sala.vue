<template>
  <div id="sala" class="container">
    <div class="row" style="margin-top: 30px">
      <div class="col-md-2"></div>
      <div class="col-md-8" style="text-align: center; color: white">
        <h3>Espera a que inicie la partida</h3>
        <center>
          <h1>Código:</h1>
          <h1 class="code" :style="{ background: '#' + code }">
            {{ code }}
          </h1>
        </center>
        <h4>
          ¡Comparte este código con tus amigos para que se puedan unir y empezar
          la partida!
        </h4>
        <h3>Jugadores que han ingresado a la partida</h3>
      </div>
    </div>
    <div class="col-md-2"></div>
    <div class="row d-flex" style="margin-top: -40px">
      <div class="col-sm-12 col-md-6 col-xl-4">
        <div class="contenedor">
          <div class="carta">
            <div class="box">
              <div class="content">
                <img :src="'/images/descarga.png'" class="img" alt="jugador1" />
                <h3 class="margin">Nombre Jugador</h3>
                <div class="loader">Cargando...</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-xl-4">
        <div class="contenedor">
          <div class="carta">
            <div class="box">
              <div class="content">
                <img :src="'/images/descarga.png'" class="img" alt="jugador2" />
                <h3 class="margin">Nombre Jugador</h3>
                <div class="loader">Cargando...</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-xl-4">
        <div class="contenedor">
          <div class="carta">
            <div class="box">
              <div class="content">
                <img :src="'/images/descarga.png'" class="img" alt="jugador3" />
                <h3 class="margin">Nombre Jugador</h3>
                <div class="loader">Cargando...</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-xl-4">
        <div class="contenedor">
          <div class="carta">
            <div class="box">
              <div class="content">
                <img :src="'/images/descarga.png'" class="img" alt="jugador4" />
                <h3 class="margin">Nombre Jugador</h3>
                <div class="loader">Cargando...</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Storage from "../utilities/Storage.js";
export default {
  data() {
    return {
      code: localStorage.getItem("partida"),
    };
  },
  methods: {},
};
</script>