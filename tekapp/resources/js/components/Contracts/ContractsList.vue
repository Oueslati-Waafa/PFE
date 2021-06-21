<template>
    <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">La liste des Contrats</h2>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nom de professeur</th>
                <th scope="col">Date de début</th>
                <th scope="col">Date de fin</th>
                <th scope="col">Type </th>
                <th scope="col">Date Création</th>
                <th scope="col">Date modification</th>
                <th scope="col">MF</th>
                <th scope="col">RC</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody v-for="contract in contracts" :key="contract.id">
                <tr>
                     <td scope="row">{{contract.id}}</td>
                     <td scope="row">{{contract.professor_id }}</td>
                     <td scope="row">{{contract.date_debut}}</td>
                     <td scope="row">{{contract.date_fin}}</td>
                     <td scope="row">{{contract.type}}</td>
                     <td scope="row">{{contract.created_at}}</td>
                     <td scope="row">{{contract.updated_at}}</td>
                     <td scope="row">{{contract.MF}}</td>
                     <td scope="row">{{contract.RC}}</td>
                     <td><button class="btn btn-danger btn-sm" @click.prevent="deleteContract(contract.id)">Supprimer</button></td>
                    <td><router-link :to="{ name:'/get_contracts',params:{id:contract.id}}" class="btn btn-primary btn-sm">Modifier</router-link></td>
                </tr>
            </tbody>


        </table>
        <router-link to="/add_contracts"> <button class="btn btn-success btn-sm" >Ajouter</button></router-link>
    </div>
</template>

<script>
export default {
    name:'contracts',
    created()
    {
        this.loadData();
    },
    methods:
    {
        loadData()
        {
            let url = this.url + '/api/contracts/get';
            this.axios.get(url).then(response => {
                this.contracts = response.data
                console.log(this.contracts);
            });
        },
        
      deleteContract(id)
        {
            let url = this.url + `/api/contracts/delete_contract/${id}`;
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
            console.log('Contracts component mounted ');
        },
        data() {
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                contracts:[]
            }
        },
}


</script>