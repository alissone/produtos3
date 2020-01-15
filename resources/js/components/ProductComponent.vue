<template>
    <div class="pb-4" style="margin: 1em;">
        <h3>Produtos</h3>
        <div class="card" style="margin-bottom: 0.5em;" v-for="product in products" :key="product.id">
            <div class="mb-xl-5 d-inline-block">
                <div class="card-body">
                    <h4 class="card-title">{{ product.name }}</h4>
                    <div class="card-columns">
                        <p class="card-text">
                            R$ {{ product.price }}
                        </p>
                        <p class="card-text">
                            Qtd.: {{ product.quantity }}
                        </p>
                        <p class="card-text">
                            Categoria: {{ getCategoryFromID(product.category_id) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                products: [],
                categories: [],
                category_names: {},
                product: {
                    id: '',
                    price: '',
                    quantity: '',
                    category_id: '',
                },
                product_id: '',
                pagination: {},
            }
        },
        created(){
            this.getProducts();
            this.getCategories();
            this.buildCategoryMap();
        },
        methods: {
            getProducts() {
                fetch('products')
                .then(response => response.json())
                .then(response =>
                this.products = response.data)
            },
            getCategories() {
                fetch('categories')
                .then(response => response.json())
                .then(response => {
                // console.log(reponse);
                this.categories = response.data})
            },
            buildCategoryMap(){
                this.category_names = {};

                console.log(JSON.stringify(this.categories))
                for (var i=0 ; i < this.categories.length ; i++) {
                    console.log((this.categories[0].name))
                    // this.category_names[this.categories[i].id] = (this.categories[i].name);
                }
                // console.log(category_names)
            },
            getCategoryFromID(id){
                return this.category_names[id];
            }
        },
    }
</script>
