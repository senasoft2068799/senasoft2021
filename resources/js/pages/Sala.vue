<template>
  <div id="sala" class="container">
    <div class="row" style="margin-top:30px;">
      <div class="col-md-3"></div>
      <div class="col-md-6" style="text-align: center; color: white;">
        <h1>Espera a que inicie la partida</h1>
        <h3>Jugadores que han ingresado a la partida</h3>
      </div>
    </div>
    <div class="col-md-3"></div>
    <div class="row d-flex" style="margin-top: -60px">
      <div class="col-md-3">
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
      <div class="col-md-3">
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
      <div class="col-md-3">
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
      <div class="col-md-3">
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
export default {};
</script>