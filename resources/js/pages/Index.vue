<template>
  <div class="container">
    <div class="row d-flex">
      <div class="col-md-6">
        <div class="contenedor">
          <div class="carta">
            <div class="box">
              <div class="content">
                <h3>Crear partida</h3>
                <p>
                  Aquí podrás crear una partida y jugar con tus amigos a
                  encontrar las cartas en secreto.
                </p>
                <button @click="crearPartida()">
                  Crear
                  <!-- <router-link :to="{ name: 'categorias.index' }"
                    >Crear</router-link
                  > -->
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
                <h3>Unirse a partida</h3>
                {{ currentUser }}
                <p>
                  Si tienes el código de una partida activa ingresa a ella dando
                  click al siguiente botón
                </p>
                <button>
                  <router-link :to="{ name: 'categorias.index' }"
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
import Storage from "../utilities/Storage.js";
export default {
  data() {
    return {
      partida: {
        jugadore_id: 1,
      },
      currentUser: {},
      token: null,
    };
  },
  mounted() {
    this.checkCurrentUser();
  },
  methods: {
    crearPartida() {
      this.$swal({
        title: "Creando partida...",
      });
      this.$swal.showLoading();
      axios
        .post("/api/partidas", this.partida)
        .then((res) => {
          Storage.record("partida", res.data, false);
          this.$swal.close();
          this.$router.push("/sala");
        })
        .catch((err) => {
          this.$swal({
            icon: "error",
            title: "Ha ocurrido un error:\n" + err,
          });
        });
    },
    checkCurrentUser() {
      if (Storage.has("token")) {
        this.token = Storage.get("token", false);
        window.axios.defaults.headers.common[
          "Authorization"
        ] = `Bearer ${this.token}`;
        this.axios
          .get("/api/user")
          .then((res) => {
            this.currentUser = res.data;
          })
          .catch((err) => {
            console.log("Error autenticación: " + err);
            Storage.remove("token");
          });
      } else {
        this.currentUser = {};
        this.token = null;
      }
    },
  },
};
</script>