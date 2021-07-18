<template>
    <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">La liste des Bilans</h2>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
        <th class="text-left">#</th>
        <th class="text-left">Date de bilan</th>
        <th class="text-left">Nom de professeur</th>
        <th class="text-left">Cours</th>
        <th class="text-left">Actions</th>
        </tr>
      </thead>
      <tbody v-for="bilan_module in bilan_modules" :key="bilan_module.id">
        <tr>
         <td><p class="font-weight-medium">{{bilan_module.id}}</p></td>
         <td><p class="font-weight-medium">{{bilan_module.dateBM}}</p></td>
         <td><p class="font-weight-medium">{{bilan_module.professor_id }}</p></td>
         <td><p class="font-weight-medium">{{bilan_module.course_id}}</p></td>
         <td><v-btn color="success" fab x-small dark :to="{ name:'/get_bilan',params:{id:bilan_module.id}}"><v-icon>mdi-pencil</v-icon></v-btn>
            <v-btn color="red" fab x-small dark @click.prevent="deleteBilan(bilan_module.id)"><v-icon>mdi-delete</v-icon></v-btn>
         </td>
         
        </tr>
      </tbody>
    </template>
  </v-simple-table>


     <v-btn
      depressed
      color="success"
      to="/add_bilan"
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
    name:'bilan_modules',
    
    created()
    {
        this.loadData();
    },
    methods:
    {
        loadData()
        {
            let url = this.url + '/api/bilans/get';
            this.axios.get(url).then(response => {
                this.bilan_modules = response.data
                console.log(this.bilan_modules);
            });
        },
        
      deleteBilan(id)
        {
            let url = this.url + `/api/bilans/delete_bilan/${id}`;
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
            console.log('Bilan component mounted ');
        },
      
        data() {
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                bilan_modules:[],
                
            }
        },
}


</script>