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
          <tbody style="text-align: center;">
            <tr v-for="(card, index) in cards" :key="index">
              <td>Pedro</td>
              <td>X Jugador 2</td>
            </tr>
            <tr>
              <td>Andrea</td>
              <td>X Jugador 4</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
export default {
	name: "Tabla",
};
</script>