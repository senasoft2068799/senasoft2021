<template>
  <div class="container">
    <div class="row d-flex">
      <div class="col-md-6">
        <div class="contenedor">
          <div class="carta">
            <div class="box">
              <div class="content">
                <h3>Crear Partida</h3>
                <p>Aquí podrás crear una partida y jugar con tus amigos a encontrar las cartas en secreto.</p>
                <button>
                  <router-link
                    :to="{ name: 'categorias.index' }"
                    >Crear</router-link
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
                <h3>Unirse a Partida</h3>
                <p>Si tienes el código de una partida activa ingresa a ella dando click al siguiente botón</p>
                <button>
                  <router-link
                    :to="{ name: 'categorias.index' }"
                    >Unirme</router-link
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