import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//import views
import PaimementList from './components/Paiement/PaiementList';
import BilanList from './components/Bilan/BilanList';
import ContractList from './components/Contracts/ContractsList';
import HeureSuppList from './components/HeureSupp/HeuresSuppList';
import Home from './components/Home.vue';

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    { 
        name:'/paiement',
        path: '/paiement', 
        component: PaimementList ,
    },
    { 
        name:'/bilans',
        path: '/bilans', 
        component: BilanList ,
    },
    { 
        name:'/contracts',
        path: '/contracts', 
        component: ContractList ,
    },
    { 
        name:'/heures_supp',
        path: '/heures_supp', 
        component: HeureSuppList ,
    },
  ];

  export default new VueRouter({
    routes
  })