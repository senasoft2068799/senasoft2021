<template>
  <form
    class="form"
    style="
      padding-top: 0px;
      margin-top: 0px;
      max-width: 880px;
      width: 80%;
      height: 50px;
    "
  >
    <div class="form-container" style="margin-top: 30px">
      <div class="form-group" style="display: flex">
        <h2 class="h2Preguntas">El programador</h2>
        <input
          type="text"
          class="form-input inputPreguntas"
          disabled
          v-if="cartasSeleccionadas.programador"
          v-model="cartasSeleccionadas.programador.nombre"
        />
        <input type="text" class="form-input" disabled v-else />
        <h2 class="h2Preguntas">generó en el módulo</h2>
        <input
          type="text"
          class="form-input inputPreguntas"
          disabled
          v-if="cartasSeleccionadas.modulo"
          v-model="cartasSeleccionadas.modulo.nombre"
        />
        <input type="text" class="form-input" disabled v-else />
        <h2 class="h2Preguntas">un error</h2>
        <input
          type="text"
          class="form-input inputPreguntas"
          disabled
          v-if="cartasSeleccionadas.error"
          v-model="cartasSeleccionadas.error.nombre"
        />
        <input type="text" class="form-input" disabled v-else />
        <button
          v-if="tipo == 1"
          type="button"
          class="botonPreguntas boton-azul"
          @click="hacerPregunta()"
        >
          Realizar pregunta
        </button>
        <button
          v-else
          type="button"
          class="botonPreguntas boton-rojo"
          @click="hacerPregunta()"
        >
          Realizar acusación
        </button>
      </div>
    </div>
  </form>
</template>
<script>
import Cartas from "../Cartas.vue";
import Storage from "../../utilities/Storage.js";
export default {
  name: "FormPregunta",
  props: ["cartasSeleccionadas", "usuarioActual"],
  components: {
    Cartas,
  },
  data() {
    return {
      tipo: 1,
    };
  },
  mounted() {
    if (this.$route.query.tipo) {
      this.tipo = this.$route.query.tipo;
    }
  },
  methods: {
    hacerPregunta() {
      if (this.cartasSeleccionadas) {
        if (
          this.cartasSeleccionadas.programador &&
          this.cartasSeleccionadas.modulo &&
          this.cartasSeleccionadas.error
        ) {
          let datos = {
            carta_programador: this.cartasSeleccionadas.programador,
            carta_modulo: this.cartasSeleccionadas.modulo,
            carta_error: this.cartasSeleccionadas.error,
            user_nickname: this.usuarioActual,
            partida_id: this.$route.params.id,
            tipo_pregunta: this.tipo,
          };
          this.$swal({
            title: `Enviando...`,
          });
          this.$swal.showLoading();
          axios
            .post("/api/enviar-pregunta", datos)
            .then((res) => {
              this.$swal.close();
              if (datos.tipo_pregunta == 0) {
                if (res.data.correct) {
                  //GANAR
                } else {
                  //PERDER
                }
                this.$swal({
                  icon: "info",
                  title: res.data.msg,
                });
              }
              this.$router.push(`/partida/${this.$route.params.id}`);
            })
            .catch((err) => {
              this.$swal({
                icon: "error",
                title: "Ha ocurrido un error:\n" + err,
              });
            });
        } else {
          this.swalError();
        }
      } else {
        this.swalError();
      }
    },
    swalError() {
      this.$swal({
        icon: "error",
        title: "Debes seleccionar un programador, un módulo y un error.",
      });
    },
    preguntar() {
      console.log("Preguntando");
    },
    acusar() {},
  },
};
</script>