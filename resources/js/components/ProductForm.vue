<template>
  <v-row justify="center">
    <!-- <v-dialog v-model="dialog" persistent max-width="600px"> -->
    <v-dialog :value="value" @input="$emit('input')" >
      <v-card>
        <v-card-title>
          <span class="headline" style="padding-top: 0.6em !important; padding-left: 0.4em !important;"> {{ title }} </span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12">
                <v-text-field label="Nome do Produto" hint="Ex. Creme de Leite" required></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field label="Valor" required hint="Em Reais (R$)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field label="Quantidade" hint="Em unidades" oninput="this.value = this.value.replace(/[^\d]/, '')"></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-select
                  :items="['Categoria 1', 'Categoria 2', 'Categoria 3', 'Categoria 4']"
                  label="Categoria"
                  required
                ></v-select>
              </v-col>
            </v-row>
          </v-container>
          {{ product }}
        </v-card-text>
        <v-card-actions style="padding-bottom: 1.2em !important; padding-right: 1.1em !important;">
          <v-spacer></v-spacer>
          <v-btn color="light-green darken-3" text @click.native="$emit('input')">Cancelar</v-btn>
          <v-btn color="light-green darken-1" dark @click="dialog = '0'">Salvar</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {
  props: {
    value: Boolean,
    title: String,
    product: Object,
  },
  computed: {
    show: {
      get() {
        console.log("get ProductForm");
        return this.value;
      },
      set(value) {
        console.log("set ProductForm");
        this.$emit("input", value);
      }
    }
  },
  methods: {
    // isNumber: function(evt) {
    //   evt = evt ? evt : window.event;
    //   var charCode = evt.which ? evt.which : evt.keyCode;
    //   if (
    //     charCode > 31 &&
    //     (charCode < 48 || charCode > 57) &&
    //     charCode !== 46
    //   ) {
    //     evt.preventDefault();
    //   } else {
    //     return true;
    //   }
    // }
  }
};
</script>