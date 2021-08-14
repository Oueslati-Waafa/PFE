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
      <tbody v-for="professor in professors" :key="professor.id">
        <tr>
         <td><p class="font-weight-medium">{{professor.id}}</p></td>
         <td><p class="font-weight-medium">{{professor.grade}}</p></td>
         <td><p class="font-weight-medium">{{professor.cin_delivered_at }}</p></td>
         <td><p class="font-weight-medium">{{professor.cnrps}}</p></td>
         <td><p class="font-weight-medium">{{professor.cnss}}</p></td>
         <td><v-btn depressed color="primary">Saisir les heures de travail </v-btn></td>
         
        </tr>
      </tbody>
    </template>
  </v-simple-table>

    </div>
</template>

<script>
export default {
    name:'professors',
    
    created()
    {
        this.loadData();
    },
    methods:
    {
        loadData()
        {
            let url = this.url + '/api/professor/get';
            this.axios.get(url).then(response => {
                this.professors = response.data
                console.log(this.professors);
            });
        },
        
        },
        mounted()
        {
            console.log('Professors component mounted ');
        },
      
        data() {
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                professors:[],
                
            }
        },
}


</script>