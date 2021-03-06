/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueSweetalert2 from 'vue-sweetalert2';
window.Swal = require('sweetalert2');
Vue.use(VueSweetalert2)
import Vuetify from '../plugins/vuetify'
//import VueResource from 'vue-resource';
import VueAxios from 'vue-axios';
import axios from 'axios';
import utils from './helpers/utilities';
Vue.prototype.$utils= utils

Vue.use(VueAxios,axios);
import Vuex from 'vuex'

Vue.use(Vuex)

Vue.use(Vuetify)

import router from './router'
import store from './store'
import i18n from './i18n'
import Vue from 'vue';


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('appdrawer-component', require('./App.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// file: ./tests/setup.js




const app = new Vue({
    vuetify:Vuetify,
    router,
    store,
    i18n,
    el: '#app',
});
