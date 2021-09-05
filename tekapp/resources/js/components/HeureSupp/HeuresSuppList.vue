<template>
    <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">La liste des Heures supplimentaires</h2>

       <v-simple-table>
    <template v-slot:default>
            <thead>
                <tr>
                
                <th class="text-left">Nom & Prénom</th>
                <th class="text-left">Nbr. heures de surveillance</th>
                <th class="text-left">Nbr. heures Conseil de classe</th>
                <th class="text-left">Type</th>
                <th class="text-left">Semaine</th>
                
                
                <th class="text-left">Action</th>
                </tr>
            </thead>
            <tbody v-for="hour in hours" :key="hour.id">
                <tr>
                     
                     <td><p class="font-weight-medium">{{hour.professor.user.fullname}}</p></td>
                     <td><p class="font-weight-medium">{{hour.heure_suivie}}</p></td>
                     <td><p class="font-weight-medium">{{hour.conseil_pfe}}</p></td>
                     <td><p class="font-weight-medium">{{hour.type}}</p></td>
                     <td><p class="font-weight-medium">{{hour.week.name}}</p></td>
                    
                <td><v-btn color="success" fab x-small dark :to="{ name:'/get_heures_supp',params:{id:hour.id}}"><v-icon>mdi-pencil</v-icon></v-btn>
            <v-btn color="red" fab x-small dark @click.prevent="deleteHeures(hour.id)"><v-icon>mdi-delete</v-icon></v-btn>
         </td>
                </tr>
            </tbody>
    </template>
  </v-simple-table>

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
  to="/add_heures_supp"
  
>
  AJOUTER BILAN
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
    name:'hours',
    created()
    {
        this.loadData();
    },
    methods:
    {
        loadData()
        {
            let url = this.url + '/api/hours/get';
            this.axios.get(url).then(response => {
                this.hours = response.data.hours
                console.log(this.hours);
            });
        },
        
      deleteHeures(id)
        {
            let url = this.url + `/api/hours/delete_hour/${id}`;
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
                hours:[]
            }
        },
}


</script>