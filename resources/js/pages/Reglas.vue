<template>
  <div id="sala" class="container">
    <div class="row" style="margin-top:30px;">
      <div class="col-md-2"></div>
      <div class="col-md-8" style="text-align: center; color: white;">
        <h1>Reglas</h1>
      </div>
    </div>
    <div class="col-md-2"></div>
    <div class="row d-flex" style="margin-top: -40px">
      <div class="col-sm-12 col-md-6 col-xl-4">
        <div class="contenedor">
          <div class="carta">
            <div class="box">
              <div class="content">
                <h3 class="margin">¡Bienvenido al juego encuentra el bug!</h3>
                <p>En este juego encontrarás 19 cartas las cuales pertenecen a uno de los 3 tipos que hay los cuales son:
                    <ul style="text-align: justify;">
                        <li>Programador</li>
                        <li>Modulo</li>
                        <li>Error</li>
                    </ul>
                    </p>
                    <p style="text-align: justify;">El juego colocará un caso el cual tú tendrás que adivinar, por ejemplo, el caso que generó el 
                    juego es "El programador <b>Pedro</b> tiene un <b>error 404</b> en el Modulo de <b>Recibos "</b></p>
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
                <h3 class="margin">Y ¿cómo adivinas el caso? ¡Es fácil!</h3>
                <p style="text-align: justify;">Tu tendrás 4 cartas y un tablero en donde anotarás las cartas que tengas
                     y las que tengan los demás jugadores, para esto, tendrás que realizar una pregunta 
                     con las opciones que te da el juego, esta pregunta se realizará al siguiente jugador después 
                     de ti.</p>
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
                <h3 class="margin">Y cómo responder?</h3>
                <p style="text-align: justify;">El jugador siguiente debe ser el primero en intentar contestar a tu pregunta. 
                    Si tiene alguna de las cartas sobre las que has preguntado, debe enseñarte una de ellas en secreto. 
                    ¡Nunca te deben enseñar más de una carta!, si no tiene ninguna de las cartas sobre las que has 
                    preguntado, simplemente dirá: “No puedo contestar”, y la pregunta pasa al siguiente jugador que tiene 
                    el turno, y así sucesivamente hasta el final de los jugadores.
                    </p>
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
                <h3 class="margin">Y cómo encuentras pistas?</h3>
                <p style="text-align: justify;">En la hoja de notas el sistema (usuario) va registrando
                     los datos de las cartas que puede determinar qué tiene otro jugador, para posteriormente
                      poder hacer una acusación.
                    </p>
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
                <h3 class="margin">¿Una acusación? ¡¿Qué es eso?!</h3>
                <p style="text-align: justify;">Hacer una acusación, seleccionando un programador,
                     un módulo y un error. Por ejemplo: “Yo creo que Juan tiene un error de Null pointer 
                     en el módulo de Usuarios". Si tu acusación es correcta, serás el ganador del juego, 
                     pero si no es cierta, simplemente vas a perder el turno, no puedes anotar nada en la 
                     hoja de notas, y tus compañeros tampoco reciben ningún tipo de respuesta.
                    </p>
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