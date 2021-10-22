<template>
  <div>
    <center>
      <div class="col-md-12">
        <h1 style="color: white; margin-top: 8%; font-size: 50px">
          ¡Aquí tenemos a nuestro ganador!
        </h1>
        <br /><br />
        <h1 style="color: white">{{ currentUser.nickname }}</h1>
        <i class="fas fa-trophy" style="color: white; font-size: 100px"></i>
        <h2 style="color: white">
          ¡Felicidades "{{ currentUser.nickname }}", eres el ganador de la
          partida!
        </h2>
        <div>
          <div class="col-md-12">
            <button class="botonGanador">
              <router-link
                :to="{ name: 'index' }"
                style="text-decoration: none; color: black"
                >Volver al inicio <i class="fas fa-home"></i
              ></router-link>
            </button>
          </div>
        </div>
      </div>
    </center>
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
    };
  },
  mounted() {
    this.checkCurrentUser();
  },
  methods: {
    obtenerGanador() {
      let datos = {
        partida_id: this.$route.params.id,
        user_nickname: this.currentUser.nickname,
      };
      axios
        .post("/api/obtener-ganador", datos)
        .then((res) => {
          console.log(res.data);
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
            this.obtenerGanador();
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