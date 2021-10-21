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
              <td v-if=""></td>
              <td v-else=""></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
import cartas from "../../../public/json/cartas.json";
export default {
  data() {
    return {
      json: cartas.cartas,
    };
  },
};
</script>