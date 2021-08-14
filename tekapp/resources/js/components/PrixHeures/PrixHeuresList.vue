<template>
            <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">La liste des Prix des Heures</h2>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
        <th class="text-left">#</th>
        <th class="text-left">Heures du Jour</th>
        <th class="text-left">Heures du Soir</th>
        <th class="text-left">Heures de suivie</th>
        <th class="text-left">Heures de Conseil/PEF</th>
        <th class="text-left">Actions</th>
        </tr>
      </thead>
      <tbody v-for="prix_heure in prix_heures" :key="prix_heure.id">
        <tr>
         <td><p class="font-weight-medium">{{prix_heure.id}}</p></td>
         <td><p class="font-weight-medium">{{prix_heure.jour}}</p></td>
         <td><p class="font-weight-medium">{{prix_heure.soir }}</p></td>
         <td><p class="font-weight-medium">{{prix_heure.suivie}}</p></td>
         <td><p class="font-weight-medium">{{prix_heure.conseil_pfe}}</p></td>
         <td><v-btn color="success" fab x-small dark :to="{ name:'/get_prix',params:{id:prix_heure.id}}"><v-icon>mdi-pencil</v-icon></v-btn>
            <v-btn color="red" fab x-small dark @click.prevent="deletePrix(prix_heure.id)"><v-icon>mdi-delete</v-icon></v-btn>
         </td>
         
        </tr>
      </tbody>
    </template>
  </v-simple-table>


     <v-btn
      depressed
      color="success"
      to="/add_prix_heures"
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
    name:'prix_heures',
    
    created()
    {
        this.loadData();
    },
    methods:
    {
        loadData()
        {
            let url = this.url + '/api/prix/get';
            this.axios.get(url).then(response => {
                this.prix_heures = response.data
                console.log(this.prix_heures);
            });
        },
        
      deletePrix(id)
        {
            let url = this.url + `/api/prix/delete_prix/${id}`;
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
            console.log('Prix component mounted ');
        },
      
        data() {
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                prix_heures:[],
                
            }
        },
}


</script>