require('./bootstrap');
window.Vue = require('vue');


import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueAxios from 'vue-axios';
import axios from 'axios';
import Vue from 'vue';
Vue.use(VueAxios,axios);

//Views 
import Home from '../js/components/Home';
import PaiementList from '../js/components/Paiement/PaiementList';
import App from './App.vue';
import AddPaiement from '../js/components/Paiement/AddPaiement';
import EditPaiement from '../js/components/Paiement/EditPaiement';


//sweet alert2
import VueSweetalert2 from 'vue-sweetalert2';
window.Swal = require('sweetalert2');
Vue.use(VueSweetalert2);

import utils from './helpers/utilities';
Vue.prototype.$utils = utils



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

    },
    {
        name:'/add_paiement',
        path:'/add_paiement',
        component:AddPaiement

    },
    {
        name:'/get_paiement',
        path:'/get_paiement/edit/:id?',
        component:EditPaiement

    }
];

const router = new VueRouter({mode: 'history' , routes: routes});
const app = new Vue(Vue.util.extend({ router },App)).$mount('#app');

