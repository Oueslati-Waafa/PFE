<template>
            <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">La liste des Professeur de TEK-UP</h2>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
        <th class="text-left">#</th>
        <th class="text-left">Nom de professeur</th>
        <th class="text-left">Grade</th>
        <th class="text-left">Actions Pour Bilan</th>
        </tr>
      </thead>
      <tbody v-for="professor in professors" :key="professor.id">
        <tr>
         <td><p class="font-weight-medium">{{professor.id}}</p></td>
         <td><p class="font-weight-medium">{{professor.user.fullname}}</p></td>
         <td><p class="font-weight-medium">{{professor.grade}}</p></td>
        <td><v-btn color="primary" fab x-small dark :to="{ name:'/get_bilan_professor',params:{id:professor.id}}"><v-icon>mdi-eye</v-icon></v-btn>
         <v-btn color="success" fab x-small dark :to="{ name:'/add_professor_bilan',params:{id:professor.id}}"><v-icon>mdi-plus</v-icon></v-btn>
        </td>
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
                this.professors = response.data.professors
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