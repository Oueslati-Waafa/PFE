<template>
            <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">La liste des Semaines Universitaires</h2>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
        <th class="text-left">#</th>
        <th class="text-left">Type de période</th>
        <th class="text-left">Date de début de periode</th>
        <th class="text-left">Date de fin de periode</th>
        <th class="text-left">Date de début de semaine</th>
        <th class="text-left">Date de fin de semaine</th>
        <th class="text-left">Actions</th>
        </tr>
      </thead>
      <tbody v-for="week in weeks" :key="week.id">
        <tr> 
         <td><p class="font-weight-medium">{{week.id}}</p></td>
         <td><p class="font-weight-medium">{{week.period.name}}</p></td>
         <td><p class="font-weight-medium">{{week.period.start_date}}</p></td>
         <td><p class="font-weight-medium">{{week.period.end_date}}</p></td>
         <td><p class="font-weight-medium">{{week.date_debut}}</p></td>
         <td><p class="font-weight-medium">{{week.date_fin}}</p></td>
         <td><v-btn color="success" fab x-small dark :to="{ name:'/get_week',params:{id:week.id}}"><v-icon>mdi-pencil</v-icon></v-btn>
            <v-btn color="red" fab x-small dark @click.prevent="deletePeriod(week.id)"><v-icon>mdi-delete</v-icon></v-btn>
         </td>
         
        </tr>
      </tbody>
    </template>
  </v-simple-table>
  <!--<pagination :data="sessions" @pagination-change-page="getResults"></pagination>-->
  


     <v-btn
      depressed
      color="success"
      to="/add_week"
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
    name:'weeks',
    
    created()
    {
        this.loadData();
    },
    methods:
    {
        loadData()
        {
         let url = this.url + '/api/weeks/get';
          axios.get(url).then(response => {
            this.weeks = response.data.weeks;
            console.log(this.weeks);
          }).catch(error => {
            console.log(error)
          });
      },

        
      deletePeriod(id)
        {
            let url = this.url + `/api/weeks/delete_week/${id}`;
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
            console.log('weeks component mounted ');
        },
      
        data() {
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                weeks:[],
                
            }
        },
}


</script>