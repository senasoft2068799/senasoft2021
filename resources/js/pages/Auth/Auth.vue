<template>
  <form @submit.prevent="auth()">
    <div>
      <label for="nickname">Nick</label>
      <input type="text" id="nickname" v-model="user.nickname" />
      <small class="text-danger" v-if="errors.has('nickname')">
        {{ errors.get("nickname") }}
      </small>
    </div>
    <div>
      <label for="password">Contraseña</label>
      <input type="password" id="password" v-model="user.password" />
      <small class="text-danger" v-if="errors.has('password')">
        {{ errors.get("password") }}
      </small>
    </div>
    <div v-if="newUser">
      <label for="password">Confirmar contraseña</label>
      <input
        type="password"
        id="password"
        v-model="user.password_confirmation"
      />
      <small class="text-danger" v-if="errors.has('password_confirmation')">
        {{ errors.get("password_confirmation") }}
      </small>
    </div>
    <div>
      <label><input type="checkbox" v-model="newUser" />Crear usuario</label>
    </div>
    <button type="submit">Iniciar</button>
  </form>
</template>
<script>
import Errors from "../../utilities/Errors.js";
import Storage from "../../utilities/Storage.js";
export default {
  data() {
    return {
      newUser: false,
      errors: new Errors(),
      user: {
        nickname: null,
        password: null,
        password_confirmation: null,
        device_name: "browser",
      },
    };
  },
  methods: {
    auth() {
      // Si el checkbox newUser está marcado, se registra, de lo contrario se loguea
      this.newUser ? this.register() : this.login();
    },
    login() {
      axios
        .post("/api/login", this.user)
        .then((res) => {
          // Si todo sale bien, se guarda el token de login en el localstorage, y se envía a la ruta principal
          this.errors.clearAll();
          Storage.record("token", res.data, false);
          this.$router.push("/");
        })
        .catch((err) => {
          // Si el error es 422, significa, que un campo no es válido
          if (err.response.status === 422) {
            this.errors.record(err.response.data.errors);
            this.$swal({
              icon: "error",
              title: "Los campos ingresados no son válidos.",
            });
          } else {
            // De lo contrario, puede ser un error no planeado
            this.$swal({
              icon: "error",
              title: "Ha ocurrido un error:\n" + err,
            });
          }
        });
    },
    register() {
      axios
        .post("/api/register", this.user)
        .then((response) => {
          // Si todo sale bien, el jugador se logea automáticamente
          this.login();
        })
        .catch((err) => {
          // Si el error es 422, significa, que un campo no es válido
          if (err.response.status === 422) {
            this.errors.record(err.response.data.errors);
            this.$swal({
              icon: "error",
              title: "Los campos ingresados no son válidos.",
            });
          } else {
            // De lo contrario, puede ser un error no planeado
            this.$swal({
              icon: "error",
              title: "Ha ocurrido un error:\n" + err,
            });
          }
        });
    },
  },
};
</script>