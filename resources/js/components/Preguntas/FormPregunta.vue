<template>
    <form
      class="form"
      style="
        padding-top: 0px;
        margin-top: 0px;
        max-width: 780px;
        width: 80%;
        height: 42px;
      "
    >
      <div class="form-container" style="margin-top: 30px">
        <div class="form-group" style="display: flex">
          <input type="text" class="form-input" disabled />
          <h2 style="padding: 10px; font-size: 30px">|</h2>
          <input type="text" class="form-input" disabled />
          <h2 style="padding: 10px; font-size: 30px">|</h2>
          <input type="text" class="form-input" disabled />
          <button type="submit" class="botonPreguntas">Realizar pregunta</button>
        </div>
      </div>
    </form>
</template>
<script>
export default {
  name: "FormPregunta",
};
</script>