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
                <button class="btn" @click="crearPartida()">Crear</button>
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
                  Si tienes el código de una partida escribelo en el siguiente
                  campo y después da click al botón
                </p>
                <input type="text" v-model="partida_id" />
                <p class="form-p" v-if="errors.has('partida_id')">
                  {{ errors.get("partida_id") }}
                </p>
                <button class="btn" @click="unirsePartida()">Unirme</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div style="text-align: center">
        <router-link :to="{ name: 'Reglas' }" class="btn-reglas"
          >Reglas <i class="fas fa-book"></i
        ></router-link>
      </div>
    </div>
  </div>
</template>
<script>
import Storage from "../utilities/Storage.js";
import Errors from "../utilities/Errors.js";
export default {
  data() {
    return {
      errors: new Errors(),
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
      //Aquí se muestra el modal de creando partida
      this.$swal({
        title: "Creando partida...",
      });
      this.$swal.showLoading();
      this.checkCurrentUser();
      //Una vez creada la partida, hará lo siguiente generando un código hexadecimal aleatoriamente
      axios
        .post("/api/crear-partida", this.currentUser)
        .then((res) => {
          // Storage.record("partida", res.data, false);
          this.$swal.close();
          Storage.record("partida", res.data.msg, false); //Aquí se envía el código a localStorage
          this.$router.push(`/sala/${res.data.msg}`);
        })
        //Si se produce algún error, se muestra al usuario por medio de esta función
        .catch((err) => {
          this.$swal({
            icon: "error",
            title: "Ha ocurrido un error:\n" + err,
          });
        });
    },
    unirsePartida() {
      //Como en la anterior función se muestra el modal de cargando
      this.$swal({
        title: `Conéctandose a la partida (${this.partida_id})...`,
      });
      this.$swal.showLoading();
      this.checkCurrentUser();
      let datos = {
        partida_id: this.partida_id,
        user_nickname: this.currentUser.nickname,
      };
      //Una vez se tenga los requisitos necesarios que son el usuario, token y el código de la partida a ingresar
      //hará lo siguiente
      axios
        .post("/api/unirse-partida", datos)
        .then((res) => {
          if (res.data.allowed) {
            Storage.record("partida", res.data.msg, false);
            this.$swal.close();
            this.$router.push(`/sala/${res.data.msg}`);
          } else {
            if (res.data.join) {
              this.$swal.close();
              console.log("INDEX VUE");
              this.$router.push(`/partida/${res.data.msg}`);
            } else {
              this.$swal({
                icon: "info",
                title: res.data.msg,
              });
            }
          }
        })
        //Si hay un error, se motrará al usuario
        .catch((err) => {
          if (err.response.status === 422) {
            this.errors.record(err.response.data.errors);
            this.$swal({
              icon: "error",
              title: "Los datos ingresados no son válidos.",
            });
          } else if (err.response.status === 500) {
            this.$swal({
              icon: "error",
              title: "Este código de partida no esta disponible o no existe",
            });
          } else {
            this.$swal({
              icon: "error",
              title: "Ha ocurrido un error:\n" + err,
            });
          }
        });
    },
    checkCurrentUser() {
      //Este método principalmente será para verificar que el usuario se encuentre registrado en el sistema
      //Este se valida por medio de un token que genera automáticamente laravel en el almacenamiento de aplicación y vue lo trae con Storage
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