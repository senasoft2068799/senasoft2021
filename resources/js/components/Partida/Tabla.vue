<template>
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Quien</th>
              <th>Notas</th>
            </tr>
          </thead>
          <tbody style="text-align: center">
            <tr v-for="carta in json" :key="carta.id">
              <td>{{ carta.nombre }}</td>
<<<<<<< HEAD
=======
              <td></td>
<<<<<<< HEAD
<<<<<<< HEAD
              <td></td>
=======
=======
>>>>>>> f331ac46b8757beb138cee42071219dc4aa34e33
>>>>>>> c5b8b749767bc901a9faa232cbfe97e86fc35eb7
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
import cartas from "../../../../public/json/cartas.json";
import Storage from "../../utilities/Storage.js";
export default {
  data() {
    return {
      currentUser: {
        nickname: null,
      },
      token: null,
      json: cartas.cartas,
    };
  },
  mounted() {
    this.checkCurrentUser();
    this.obtenerTablero();
  },
  methods: {
    obtenerTablero() {
      this.checkCurrentUser();
      let datos = {
        partida_id: this.$route.params.id,
        user_nickname: this.currentUser.nickname,
      };
      axios
        .post("/api/obtener-tablero", datos)
        .then((res) => {
          console.log(res);
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