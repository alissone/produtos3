import { ApolloClient } from 'apollo-client'
import { createHttpLink } from 'apollo-link-http'
import { InMemoryCache } from 'apollo-cache-inmemory'

// HTTP connection to the API
const httpLink = createHttpLink({
    // You should use an absolute URL here
    uri: 'http://localhost:8000/graphql',
})

// Cache implementation
const cache = new InMemoryCache()

// Create the apollo client
const apolloClient = new ApolloClient({
    link: httpLink,
    cache,
})

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('product-list-component', require('./components/ProductListComponent.vue').default);
Vue.component('products', require('./components/ProductComponent.vue').default);
Vue.component('navbar', require('./components/Navbar.vue').default);
Vue.component('ProductForm', require('./components/ProductForm.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue'
import VueApollo from 'vue-apollo'

Vue.use(VueApollo)

import Vuetify from 'vuetify'

Vue.config.productionTip = false
Vue.use(Vuetify)
export default new Vuetify({})

const apolloProvider = new VueApollo({
    defaultClient: apolloClient,
})


const app = new Vue({
    el: '#app',
    apolloProvider,
    vuetify: new Vuetify(),
});

{ /* <ProductForm v-model="dialog" v-show="isVisibleModal(product.id)"></ProductForm> */ } { /* <ProductForm v-model="dialog" title="Criar" :product="product"></ProductForm> */ }