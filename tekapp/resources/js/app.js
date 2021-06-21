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
import HeuresSuppList from '../js/components/HeureSupp/HeuresSuppList'
import EditHeuresSupp from '../js/components/HeureSupp/EditHeuresSupp'
import AddHeuresSupp from '../js/components/HeureSupp/AddHeures'
import ContractsList from '../js/components/Contracts/ContractsList'
import AddContracts from '../js/components/Contracts/AddContracts'
import EditContracts from '../js/components/Contracts/EditContracts'


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

    },
    {
        name:'/get_heures_supp',
        path:'/get_heures_supp/edit/:id?',
        component:EditHeuresSupp

    },
    {
        name:'/get_contracts',
        path:'/get_contracts/edit/:id?',
        component:EditContracts

    },
    {
        name:'/heures_supp',
        path:'/heures_supp',
        component:HeuresSuppList

    },
    {
        name:'/add_heures_supp',
        path:'/add_heures_supp',
        component:AddHeuresSupp

    },

    {
        name:'/contracts',
        path:'/contracts',
        component:ContractsList

    },
    {
        name:'/add_contracts',
        path:'/add_contracts',
        component:AddContracts

    },

];

const router = new VueRouter({mode: 'history' , routes: routes});
const app = new Vue(Vue.util.extend({ router },App)).$mount('#app');

