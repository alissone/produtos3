<template>
  <div>
    <div class="pb-4" style="margin: 1em;">
      <div class="input-group" style="margin-bottom:1em;">
        <form action>
          <input
            type="text"
            id="filterQuery"
            v-model="filterQuery"
            class="form-control"
            placeholder
            aria-label
            aria-describedby="basic-addon1"
          />
        </form>

        <div class="input-group-append">
          <button class="btn" type="button">Buscar</button>
        </div>
      </div>

      {{ filterQuery }}
      <h3>Produtos</h3>
      <!-- {{ product }} -->
      <div
        class="card"
        style="margin-bottom: 0.7em;"
        v-for="product in products.data"
        v-show="filterRow(product)"
        :key="product.id"
      >
        <div class="card-body">
          <div class="container">
            <div class="row">
              <div class="col-9">
                <h4 class="card-title">{{ product.name }}</h4>
              </div>
              <div class="col-1 text-right">
                <div class="card-text badge badge-danger">
                  <button
                    class="fa fa-trash has-text is-small text-white"
                    style="background-color: Transparent; border: none; overflow: hidden; cursor: pointer; !important"
                    data-target="#deleteModal"
                    aria-haspopup="true"
                  ></button>
                  Excluir
                </div>
                <div class="card-text badge badge-primary">
                  <button
                    class="fa fa-pencil modal-button is-small text-white"
                    style="background-color: Transparent; border: none; overflow: hidden; cursor: pointer; !important"
                    data-target="#deleteModal"
                    aria-haspopup="true"
                  ></button>
                  Editar
                </div>
              </div>
            </div>
          </div>
          <span class="col-1"></span>
          <span class="card-text col-1 badge badge-success">R$ {{ product.price }}</span>
          <span class="card-text col-1 badge badge-info">{{ product.category.name }}</span>
          <p
            class="card-text alert alert-light"
            style="font-size: 0.9em;"
          >{{ product.quantity }} unidades disponíveis</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import gql from "graphql-tag";

export const PRODUCTS_QUERY = gql`
  query {
    products {
      data {
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

export default {
  mounted() {
    console.log("ExampleComponent.");
  },
  data: function() {
    return {
      products: [],
      filterQuery: ""
    };
  },
  apollo: {
    products: PRODUCTS_QUERY
  },
  methods: {
    filterRow(product) {
      // console.log(product.name.toString().toLowerCase().includes(this.filterRow.toString().toLowerCase()))
      // console.log('filterRow:')
      // console.log(this.filterQuery.toString().toLowerCase())
      // console.log('product.name:')
      // console.log(product.name.toString().toLowerCase())
      // console.log('includes:')
      // console.log(product.name.toString().toLowerCase().includes(this.filterQuery.toString().toLowerCase()))
      return product.name
        .toString()
        .toLowerCase()
        .includes(this.filterQuery.toString().toLowerCase());
    }
  }
};
</script>