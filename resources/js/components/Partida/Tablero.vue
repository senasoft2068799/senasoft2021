<template>
  <div class="row">
    <div class="col-md-8">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Cartas</th>
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
                    usuarioActual
                  "
                  class="text-green"
                >
                  ✔ {{ prueba(carta.id).respuesta_user_partida.user_nickname }}
                </b>
                <b v-else class="text-green">
                  ✔ {{ prueba(carta.id).respuesta_user_partida.user_nickname }}
                </b>
              </td>
              <td v-else class="text-red">✘</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- <Cartas /> -->
  </div>
</template>
<script>
import cartas from "../../../../public/json/cartas.json";
export default {
  props: ["usuarioActual"],
  data() {
    return {
      json: cartas.cartas,
      tablero: [],
    };
  },
  mounted() {
    this.obtenerTablero();
  },
  methods: {
    prueba(id) {
      return this.tablero.find((item) => item.carta_id === id);
    },
    obtenerTablero() {
      let datos = {
        partida_id: this.$route.params.id,
        user_nickname: this.usuarioActual,
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
  },
};
</script>