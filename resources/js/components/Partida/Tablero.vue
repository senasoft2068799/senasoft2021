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
              <td v-if="prueba(carta.id)">
                <b
                  v-if="
                    prueba(carta.id).respuesta_user_partida.user_nickname ==
                    currentUser.nickname
                  "
                  class="text-green"
                >
                  {{ prueba(carta.id).respuesta_user_partida.user_nickname }}
                </b>
                <b v-else>
                  {{ prueba(carta.id).respuesta_user_partida.user_nickname }}
                </b>
              </td>
              <td v-else></td>
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
      tablero: [],
    };
  },
  mounted() {
    this.checkCurrentUser();
  },
  methods: {
    prueba(id) {
      return this.tablero.find((item) => item.carta_id === id);
    },
    obtenerTablero() {
      let datos = {
        partida_id: this.$route.params.id,
        user_nickname: this.currentUser.nickname,
      };
      axios
        .post("/api/obtener-tablero", datos)
        .then((res) => {
          this.tablero = res.data.data;
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
            this.obtenerTablero();
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