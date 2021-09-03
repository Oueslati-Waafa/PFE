<template>
            <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">La liste des Périodes Universitaires</h2>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
        <th class="text-left">#</th>
        <th class="text-left">Titre de la Période</th>
        <th class="text-left">Date de début de période</th>
        <th class="text-left">Date de cloture de période</th>
        <th class="text-left">La session</th>
        <!--<th class="text-left">La Session</th>-->
        <th class="text-left">Actions</th>
        </tr>
      </thead>
      <tbody v-for="period in periods" :key="period.id">
        <tr>
         <td><p class="font-weight-medium">{{period.id}}</p></td>
         <td><p class="font-weight-medium">{{period.name}}</p></td>
         <td><p class="font-weight-medium">{{period.start_date}}</p></td>
         <td><p class="font-weight-medium">{{period.end_date}}</p></td>
         <td><p class="font-weight-medium">{{period.session.name}}</p></td>
         <td><v-btn color="success" fab x-small dark :to="{ name:'/get_period',params:{id:period.id}}"><v-icon>mdi-pencil</v-icon></v-btn>   
            <v-btn color="red" fab x-small dark @click.prevent="deletePeriod(period.id)"><v-icon>mdi-delete</v-icon></v-btn>
         </td>
         
        </tr>
      </tbody>
    </template>
  </v-simple-table>
  <!--<pagination :data="sessions" @pagination-change-page="getResults"></pagination>-->
  


    <br>
<br>

<v-row align="center" justify="space-around">
  <v-col></v-col>
    <v-col>
<v-btn 
  rounded 
  block 
  color="blue darken-3" 
  dark 
  large 
  to="add_period"
>
  AJOUTER PERIODE
</v-btn>
</v-col>

<v-col>
<v-btn 
  rounded 
  block 
  color="error" 
  dark 
  large 
  to="/"
>
  ANNULER
</v-btn>
</v-col>
<v-col></v-col>
</v-row>
    </div>
</template>

<script>
export default {
    name:'periods',
    
    created()
    {
        this.loadData();
    },
    methods:
    {
        loadData()
        {

          let url = this.url + '/api/period/get';
          axios.get(url).then(response => {
            this.periods = response.data.periods;
            console.log(this.periods);
          }).catch(error => {
            console.log(error)
          });
           
      },

        
      deletePeriod(id)
        {
            let url = this.url + `/api/period/delete_period/${id}`;
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
            console.log('period component mounted ');
        },
      
        data() {
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                periods:[],
                
            }
        },
}


</script>