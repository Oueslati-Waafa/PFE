
<template>
    <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">La liste des Contrats</h2>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
        <th scope="col">#</th>
                <th class="text-left">Nom de professeur</th>
                <th class="text-left">Date de début</th>
                <th class="text-left">Date de fin</th>
                <th class="text-left">Type </th>
                <th class="text-left">MF</th>
                <th class="text-left">RC</th>
                <th class="text-left">Action</th>
        </tr>
      </thead>
      <tbody v-for="contract in contracts" :key="contract.id">
        <tr>
         <td><p class="font-weight-medium">{{contract.id}}</p></td>
         <td><p class="font-weight-medium">{{contract.professor_id }}</p></td>
         <td><p class="font-weight-medium">{{contract.date_debut}}</p></td>
         <td><p class="font-weight-medium">{{contract.date_fin}}</p></td>
         <td><p class="font-weight-medium">{{contract.type}}</p></td>
         <td><p class="font-weight-medium">{{contract.MF}}</p></td>
         <td><p class="font-weight-medium">{{contract.RC}}</p></td>
         <td><v-btn color="success" fab x-small dark :to="{ name:'/get_contract',params:{id:contract.id}}"><v-icon>mdi-pencil</v-icon></v-btn>
            <v-btn color="red" fab x-small dark @click.prevent="deleteContract(contract.id)"><v-icon>mdi-delete</v-icon></v-btn>
         </td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>

 <v-btn depressed color="success" to="/add_contract"> <v-icon left>mdi-plus</v-icon>Ajouter</v-btn>

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
                   console.log('error')
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