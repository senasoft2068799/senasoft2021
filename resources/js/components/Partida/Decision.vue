<template>
  <div class="container">
    <center>
      <h1 style="color: white">¡Es tu turno! ¿Qué deseas hacer?</h1>
    </center>
    <div class="row d-flex" style="margin-top: -20px">
      <div class="col-md-6">
        <div class="contenedor">
          <div class="carta">
            <div class="box">
              <div class="content">
                <h3>Hacer una pregunta</h3>
                <p>
                  Aquí podrás realizar una pregunta a tus rivales, seleccionas
                  el programador que hizo el error, el módulo en el que se
                  desarrolló y por último el tipo de error que tiene.
                </p>
                <button class="btn">
                  <router-link :to="{ name: 'preguntas' }"
                    >Hacer pregunta</router-link
                  >
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="contenedor">
          <div class="carta">
            <div class="box">
              <div class="content">
                <h3>Acusar</h3>
                <p>
                  ¿Te sientes con suerte?
                  <br />
                  Si es así, o ya te sabes el programador que causó el error, el
                  módulo y el tipo de error, ¡podrás ganar la partida!
                </p>
                <button class="btn">
                  <router-link :to="{ name: 'Acusacion' }"
                    >Acusar</router-link
                  >
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