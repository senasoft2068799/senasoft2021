<template>
  <div>
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-4">
          <div class="contenedor">
            <div class="carta">
              <div class="box">
                <div class="content">
                  <h2>1</h2>
                  <img alt="..." class="rounded">
                  <h3>Carta 1</h3>
                  <p>Hola</p>
                  <button>
                    <router-link
                      style="color: #fff; text-decoration: none; font-weight: 400;"
                      :to="{ name: 'modelo.index' }"
                      >Botón</router-link
                    >
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contenedor">
            <div class="carta">
              <div class="box">
                <div class="content">
                  <h2>2</h2>
                  <img alt="..." class="rounded">
                  <h3>Carta 2</h3>
                  <p>no sé 2</p>
                  <button>
                    <router-link
                      style="
                        color: #fff;
                        text-decoration: none;
                        font-weight: 400;
                      "
                      :to="{ name: 'categorias.index' }"
                      >Botón 2</router-link
                    >
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contenedor">
            <div class="carta">
              <div class="box">
                <div class="content">
                  <h2>3</h2>
                  <img alt="..." class="rounded">
                  <h3>Carta 3</h3>
                  <p>Hola 3</p>
                  <button>
                    <router-link
                      style="
                        color: #fff;
                        text-decoration: none;
                        font-weight: 400;
                      "
                      :to="{ name: 'categorias.index' }"
                      >Botón 3</router-link
                    >
                  </button>
                </div>
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
