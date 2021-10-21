<template>
  <div>
    <center>
      <div class="col-md-12">
        <h1 style="color: white; margin-top: 8%; font-size: 50px">
          ¡Aquí tenemos a nuestro ganador!
        </h1>
        <br /><br />
        <h1 style="color: white">Nombre del jugador</h1>
        <i class="fas fa-trophy" style="color: white; font-size: 100px"></i>
        <h2 style="color: white">
          ¡Felicidades "nombreJugador", eres el ganador de la partida!
        </h2>
        <div>
          <div class="col-md-12">
            <button class="botonGanador">
              <router-link
                :to="{ name: 'index' }"
                style="text-decoration: none; color: black"
                >Volver al inicio <i class="fas fa-home"></i></router-link
              >
            </button>
          </div>
        </div>
      </div>
    </center>
  </div>
</template>
<script>
export default {
  
};
</script>