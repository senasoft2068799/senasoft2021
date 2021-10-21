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
                <button class="btn" @click="crearPartida()">
                  Crear
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
                <p>
                  Si tienes el código de una partida escribelo en el siguiente campo y después da click al botón
                </p>
                <input type="text" v-model="partida_id" />
                <button class="btn" @click="unirsePartida()">Unirme</button>
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
      currentUser: {
        nickname: null,
      },
      token: null,
      partida_id: null,
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
      this.checkCurrentUser();
      axios
        .post("/api/crear-partida", this.currentUser)
        .then((res) => {
          // Storage.record("partida", res.data, false);
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
    unirsePartida() {
      this.$swal({
        title: `Conéctandose a la partida (${this.partida_id})...`,
      });
      this.$swal.showLoading();
      this.checkCurrentUser();
      let datos = {
        partida_id: this.partida_id,
        user_nickname: this.currentUser.nickname,
      };
      axios
        .post("/api/unirse-partida", datos)
        .then((res) => {
          if (res.data.allowed) {
            Storage.record("partida", res.data.msg, false);
            this.$swal.close();
            this.$router.push("/sala");
          } else {
            this.$swal({
              icon: "info",
              title: res.data.msg,
            });
          }
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
            console.log(res.data);
          })
          .catch((err) => {
            console.log("Error autenticación: " + err);
            Storage.remove("token");
            this.$router.push("/");
          });
      } else {
        this.currentUser = {};
        this.token = null;
      }
    },
  },
};
</script>