<template>
  <div>
    <ProductForm
      v-model="dialog"
      title="Detalhes"
      :product="editingProduct"
      v-show="isVisibleModal(editingProduct)"
    ></ProductForm>

    <div class="pl-3 pt-3">
      <h3>Produtos</h3>
    </div>
    <div class="pb-4" style="margin: 1em;">
      <v-app id="product_item">
        <div class="input-group" style="margin-bottom:1em;">
          <form action>
            <v-text-field
              solo
              label="Buscar"
              append-icon="search"
              width="1800"
              id="filterQuery"
              v-model="filterQuery"
            ></v-text-field>
          </form>
        </div>
        <div
          style="margin-bottom: 0.7em;"
          v-for="product in products.data"
          v-show="filterRow(product)"
          :key="product.id"
        >
          <v-card width="800" class="mx-auto">
            <v-list-item>
              <v-list-item-content>
                <v-list-item-title class="headline">{{ product.name }}</v-list-item-title>
                <v-list-item-subtitle>{{ product.category.name }}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>

            <v-card-text>Descrição do Produto</v-card-text>
            <v-card-text>{{ product.id }}</v-card-text>

            <v-card-actions>
              <span
                class="card-text badge light-green darken-2 font-weight-medium"
                style="padding: 0.6em; color: #fff;"
              >{{ formatPrice(product.price) }}</span>

              <v-spacer></v-spacer>

              <v-btn icon @click="setVisibleModal(product)">
                <v-icon>mdi-pencil</v-icon>
              </v-btn>
              <v-btn icon>
                <v-icon @click="deleteProduct(product)">mdi-delete</v-icon>
              </v-btn>
            </v-card-actions>
          </v-card>
        </div>
        <v-btn
          fab
          dark
          large
          color="light-green darken-2"
          fixed
          right
          bottom
          @click="setVisibleModal(null)"
        >
          <v-icon dark>add</v-icon>
        </v-btn>
        <div id="my-modal" class="modal fade"></div>
      </v-app>
    </div>
  </div>
</template>

<script>
import gql from "graphql-tag";
import ProductForm from "./ProductForm";

export const LIST_PRODUCTS = gql`
  query {
    products {
      data {
        id
        name
        price
        quantity
        category {
          name
        }
      }
    }
  }
`;

export const LIST_CATEGORIES = gql`
  query {
    categories {
      data {
        id
        name
      }
    }
  }
`;

export const DELETE_PRODUCT_BY_ID = gql`
  mutation deleteProduct($id: ID!) {
    deleteProduct(id: $id) {
      id
      name
    }
  }
`;

export default {
  mounted() {
    console.log("ExampleComponent.");
  },
  data: function() {
    return {
      products: [],
      filterQuery: "",
      dialog: false,
      visibleModal: 0,
      editingProduct: null
    };
  },
  apollo: {
    products: LIST_PRODUCTS
  },
  methods: {
    filterRow(product) {
      return product.name
        .toString()
        .toLowerCase()
        .includes(this.filterQuery.toString().toLowerCase());
    },

    formatPrice(price) {
      return "R$ " + price.toFixed(2);
    },
    refreshList() {
      this.$apollo.queries.LIST_PRODUCTS.refetch();
    },
    deleteProduct(product) {
      //   this.$apollo.queries.DELETE_PRODUCT_BY_ID.skip = false;
      var deleteScope = this;
      console.log(deleteScope);
      this.$apollo.mutate({
        mutation: DELETE_PRODUCT_BY_ID,
        variables: {
          id: product.id
        }
      });
      this.$apollo.queries.products.refetch();
    },
    itemClicked: function(product) {
      this.product_id = product.id;
      this.product_name = product.name;
      this.product_price = product.price;
      this.product_quantity = product.quantity;
      this.product_category_id = product.category_id;
      this.product_visibleModal = this.product_id;
    },

    // getModalTitle: function() {
    //   if (this.editingProduct = null){
    //     return "Criar novo Produto";
    //   } else {
    //     return "Editar Produto";
    //   }
    // },

    isVisibleModal: function(id) {
      this.visibleModal = id;
      return id == this.visibleModal;
    },

    setVisibleModal: function(product) {

      console.log("Product");
      console.log(product);
      console.log("Dialog");
      console.log(this.dialog);

      if (product != null) {

        this.visibleModal = product.id;
        this.editingProduct = product;
        this.dialog = this.isVisibleModal(product.id);
      } else {

        if (this.dialog == false || this.dialog == null){
          this.editingProduct = null;
          this.product = null;
          this.dialog = true;
        }
      }
    }
  }
};
</script>