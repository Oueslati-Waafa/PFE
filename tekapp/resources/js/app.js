require('./bootstrap');
window.Vue = require('vue');

import App from './App.vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueAxios from 'vue-axios';
import axios from 'axios';
import Vue from 'vue';
Vue.use(VueAxios,axios);

import Home from '../js/components/Home';
import PaiementList from '../js/components/Paiement/PaiementList';
const routes = [
    {
        name:'/',
        path:'/',
        component:Home
    },
    {
        name:'/paiement',
        path:'/paiement',
        component:PaiementList

    }
];

const router = new VueRouter({ routes: routes});
const app = new Vue(Vue.util.extend({ router },App)).$mount('#app');

