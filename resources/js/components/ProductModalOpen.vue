<template>
  <div id="app">
    <v-app>
      <v-btn @click="dialog = true">Open</v-btn>
      <ProductForm v-model="dialog" />
    </v-app>
  </div>
</template>

<script>
import ProductForm from "./ProductForm";

export default {
  data() {
    return {
      dialog: false
    };
  }
};
</script>