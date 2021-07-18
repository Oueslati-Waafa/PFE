<template>
    <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">Page Paiement</h2>

  <v-simple-table>
    <template v-slot:default>
            <thead>
                <tr>
                <th class="text-left">#</th>
                <th class="text-left">Somme Brut</th>
                <th class="text-left">Retenue</th>
                <th class="text-left">Avance</th>
                <th class="text-left">Net à payer</th>
                <th class="text-left">ID Contrat</th>
                <th class="text-left">ID Professeur</th>
                <th class="text-left">Date de paiement</th>
                <th class="text-left">Action</th>
                </tr>
            </thead>
            <tbody v-for="paiement in paiements" :key="paiement.id">
                <tr>
                     <td ><p class="font-weight-medium">{{paiement.id}}</p></td>
                     <td ><p class="font-weight-medium">{{paiement.sommeBrut}}</p></td>
                     <td ><p class="font-weight-medium">{{paiement.retenue}}</p></td>
                     <td ><p class="font-weight-medium">{{paiement.avance}}</p></td>
                     <td ><p class="font-weight-medium">{{paiement.net_a_payer}}</p></td>
                     <td ><p class="font-weight-medium">{{paiement.contract_id}}</p></td>
                     <td ><p class="font-weight-medium">{{paiement.professor_id}}</p></td>
                     <td ><p class="font-weight-medium">{{paiement.datepaiement}}</p></td>
                     <td><v-btn color="success" fab x-small dark :to="{ name:'/get_paiement',params:{id:paiement.id}}"><v-icon>mdi-pencil</v-icon></v-btn>
            <v-btn color="red" fab x-small dark @click.prevent="deletePaiement(paiement.id)"><v-icon>mdi-delete</v-icon></v-btn>
         </td>
                     
         </tr>
            </tbody>
   </template>
  </v-simple-table>

  <v-btn
      depressed
      color="success"
      to="/add_paiement"
    >
      <v-icon left>
        mdi-plus
      </v-icon>
      Ajouter
    </v-btn>

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