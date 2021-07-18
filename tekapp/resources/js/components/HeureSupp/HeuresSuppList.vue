<template>
    <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">La liste des Heures supplimentaires</h2>

       <v-simple-table>
    <template v-slot:default>
            <thead>
                <tr>
                <th class="text-left">#</th>
                <th class="text-left">Nbr. heures Jury</th>
                <th class="text-left">Nbr. heures d'encadrement</th>
                <th class="text-left">Nbr. heures Conseil de classe</th>
                <th class="text-left">Numéro de semestre </th>
                <th class="text-left">ID Professeur</th>
                <th class="text-left">Nbr. heures de surveillance</th>
                <th class="text-left">Action</th>
                </tr>
            </thead>
            <tbody v-for="h_supplemetaire in h_supplemetaires" :key="h_supplemetaire.id">
                <tr>
                     <td><p class="font-weight-medium">{{h_supplemetaire.id}}</p></td>
                     <td><p class="font-weight-medium">{{h_supplemetaire.h_jury}}</p></td>
                     <td><p class="font-weight-medium">{{h_supplemetaire.h_encadrement}}</p></td>
                     <td><p class="font-weight-medium">{{h_supplemetaire.h_conseil}}</p></td>
                     <td><p class="font-weight-medium">{{h_supplemetaire.semester}}</p></td>
                     <td><p class="font-weight-medium">{{h_supplemetaire.professor_id}}</p></td>
                     <td><p class="font-weight-medium">{{h_supplemetaire.h_surveillance}}</p></td>
                    
                <td><v-btn color="success" fab x-small dark :to="{ name:'/get_heures_supp',params:{id:h_supplemetaire.id}}"><v-icon>mdi-pencil</v-icon></v-btn>
            <v-btn color="red" fab x-small dark @click.prevent="deleteHeures(h_supplemetaire.id)"><v-icon>mdi-delete</v-icon></v-btn>
         </td>
                </tr>
            </tbody>
    </template>
  </v-simple-table>

          <v-btn
      depressed
      
      color="success"
      to="/add_heures_supp"
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
    name:'h_supplemetaires',
    created()
    {
        this.loadData();
    },
    methods:
    {
        loadData()
        {
            let url = this.url + '/api/heures_supp/get';
            this.axios.get(url).then(response => {
                this.h_supplemetaires = response.data
                console.log(this.h_supplemetaires);
            });
        },
        
      deleteHeures(id)
        {
            let url = this.url + `/api/heures_supp/delete_heure_sup/${id}`;
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
            console.log('Heure list component mounted ');
        },
        data() {
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                h_supplemetaires:[]
            }
        },
}


</script>