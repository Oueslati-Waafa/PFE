import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//import views
import PaimementList from './components/Paiement/PaiementList';
import BilanList from './components/Bilan/BilanList';
import ContractList from './components/Contracts/ContractsList';
import HeureSuppList from './components/HeureSupp/HeuresSuppList';
import PrixHeures from './components/PrixHeures/PrixHeuresList.vue';
import ProfessorList from './components/ProfessorsList.vue';
import Home from './components/Home.vue';

import AddBilan from './components/Bilan/AddBilan.vue';
import AddContract from './components/Contracts/AddContracts.vue';
import AddPaiement from './components/Paiement/AddPaiement.vue';
import AddHeureSupp from './components/HeureSupp/AddHeures.vue';
import AddSession from './components/Session/AddSession.vue';
import AddPriod from './components/Period/AddPeriod.vue';
import AddWeek from './components/Week/AddWeek.vue';
import EditSession from './components/Session/EditSession.vue';
import EditPeriod from './components/Period/EditPeriod.vue';
import EditWeek from './components/Week/EditWeek';

import EditPaiement from './components/Paiement/EditPaiement.vue';
import EditHeureSupp from './components/HeureSupp/EditHeuresSupp.vue';
import EditContract from './components/Contracts/EditContracts.vue';
import EditBilan from './components/Bilan/EditBilan.vue';
import AddPrixHeures from './components/PrixHeures/AddPrixHeures.vue';
import EditPrix from './components/PrixHeures/EditPrix.vue';
import SessionList from './components/Session/SessionList';
import PeriodList from './components/Period/PeriodList';
import WeekList from './components/Week/WeekList';
import UserList from './components/User/UserList';


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
        name:'/users',
        path: '/users', 
        component: UserList ,
    },
    { 
        name:'/professor',
        path: '/professor', 
        component: ProfessorList ,
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
        name:'/prix_heures',
        path: '/prix_heures', 
        component: PrixHeures ,
    },
    { 
        name:'/session',
        path: '/session', 
        component: SessionList ,
    },
    { 
        name:'/period',
        path: '/period', 
        component: PeriodList ,
    },
    { 
        name:'/week',
        path: '/week', 
        component: WeekList ,
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
        path: '/get_bilan/edit/:id?', 
        component: EditBilan ,
    },
    { 
        name:'/get_contract',
        path: '/get_contract/edit/:id?', 
        component: EditContract ,
    },
    { 
        name:'/get_heures_supp',
        path: '/get_heures_supp/edit/:id?', 
        component: EditHeureSupp ,
    },
    { 
        name:'/get_paiement',
        path: '/get_paiement/edit/:id?', 
        component: EditPaiement ,
    },
    { 
        name:'/add_prix_heures',
        path: '/add_prix_heures', 
        component: AddPrixHeures ,
    },
    { 
        name:'/get_prix',
        path: '/get_prix/edit/:id?', 
        component: EditPrix,
    },
    { 
        name:'/add_session',
        path: '/add_session', 
        component: AddSession ,
    },
    { 
        name:'/get_session',
        path: '/get_session/edit/:id?', 
        component: EditSession ,
    },
    { 
        name:'/add_period',
        path: '/add_period', 
        component: AddPriod ,
    },
    { 
        name:'/get_period',
        path: '/get_period/edit/:id?', 
        component: EditPeriod ,
    },
    { 
        name:'/add_week',
        path: '/add_week', 
        component: AddWeek ,
    },
    { 
        name:'/get_week',
        path: '/get_week/edit/:id?', 
        component: EditWeek ,
    },
  ];

  export default new VueRouter({
    routes
  })