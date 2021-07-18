import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//import views
import PaimementList from './components/Paiement/PaiementList';
import BilanList from './components/Bilan/BilanList';
import ContractList from './components/Contracts/ContractsList';
import HeureSuppList from './components/HeureSupp/HeuresSuppList';
import Home from './components/Home.vue';

import AddBilan from './components/Bilan/AddBilan.vue';
import AddContract from './components/Contracts/AddContracts.vue';
import AddPaiement from './components/Paiement/AddPaiement.vue';
import AddHeureSupp from './components/HeureSupp/AddHeures.vue';

import EditPaiement from './components/Paiement/EditPaiement.vue';
import EditHeureSupp from './components/HeureSupp/EditHeuresSupp.vue';
import EditContract from './components/Contracts/EditContracts.vue';
import EditBilan from './components/Bilan/EditBilan.vue';


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
    { 
        name:'/add_bilan',
        path: '/add_bilan', 
        component: AddBilan ,
    },
    { 
        name:'/add_contract',
        path: '/add_contract', 
        component: AddContract ,
    },
    { 
        name:'/add_paiement',
        path: '/add_paiement', 
        component: AddPaiement ,
    },
    { 
        name:'/add_heures_supp',
        path: '/add_heures_supp', 
        component: AddHeureSupp ,
    },
    { 
        name:'/get_bilan',
        path: '/get_bilan', 
        component: EditBilan ,
    },
    { 
        name:'/get_contract',
        path: '/get_contract', 
        component: EditContract ,
    },
    { 
        name:'/get_heure_supp',
        path: '/get_heure_supp', 
        component: EditHeureSupp ,
    },
    { 
        name:'/get_paiement',
        path: '/get_paiement', 
        component: EditPaiement ,
    },
  ];

  export default new VueRouter({
    routes
  })