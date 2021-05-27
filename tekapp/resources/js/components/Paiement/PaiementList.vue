<template>
    <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">Page Paiement</h2>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Somme Brut</th>
                <th scope="col">Retenue</th>
                <th scope="col">Avance</th>
                <th scope="col">Net à payer</th>
                <th scope="col">Date creation</th>
                <th scope="col">Date modification</th>
                <th scope="col">ID Contrat</th>
                <th scope="col">ID Professeur</th>
                <th scope="col">Date de paiement</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody v-for="paiement in paiements" :key="paiement.id">
                <tr>
                     <td scope="row">{{paiement.id}}</td>
                     <td scope="row">{{paiement.sommeBrut}}</td>
                     <td scope="row">{{paiement.retenue}}</td>
                     <td scope="row">{{paiement.avance}}</td>
                     <td scope="row">{{paiement.net_a_payer}}</td>
                     <td scope="row">{{paiement.created_at}}</td>
                     <td scope="row">{{paiement.updated_at}}</td>
                     <td scope="row">{{paiement.contract_id}}</td>
                     <td scope="row">{{paiement.professor_id}}</td>
                     <td scope="row">{{paiement.datepaiement}}</td>
                     <td><button class="btn btn-danger btn-sm" @click.prevent="deletePaiement(paiement.id)">Supprimer</button></td>
                    <td><router-link :to="{ name:'/get_paiement',params:{id:paiement.id}}" class="btn btn-primary btn-sm">Modifier</router-link></td>
                </tr>
            </tbody>


        </table>
        <router-link to="/add_paiement"> <button class="btn btn-success btn-sm" >Ajouter</button></router-link>
    </div>
</template>

<script>
export default {
    name:'Paiement',
    created()
    {
        this.loadData();
    },
    methods:
    {
        loadData()
        {
            let url = this.url + '/api/paiement/getPaiment';
            this.axios.get(url).then(response => {
                this.paiements = response.data
                console.log(this.paiements);
            });
        },
        deletePaiement(id)
        {
            let url = this.url + `/api/paiement/delete_paiement/${id}`;
            this.axios.delete(url).then(response =>{
                if (response.status)
                {
                    this.$utils.showSuccess('success',response.message);
                    this.loadData();
                }
                else {
                    this.$utils.showError('Error', response.message);
                    }
            });
        }
        },
        mounted()
        {
            console.log('paimenetList componen mounted ');
        },
        data() {
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                paiements:[]
            }
        },
}

</script>