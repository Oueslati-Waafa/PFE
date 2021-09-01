<template>

    <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">La liste des Bilans</h2>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
        <th class="text-left">#</th>
        <th class="text-left">Nom et prenom</th>
        <th class="text-left">CIN</th>
        <th class="text-left">CNRPS</th>
        <th class="text-left">Grade</th>
        <th class="text-left">Matière</th>
        <th class="text-left">Semaine</th>
        <th class="text-left">Nbr. d'heure</th>
        <th class="text-left">Nbr. d'heure supplimentaire</th>
        <th class="text-left">Actions</th>
        </tr>
      </thead>
      <tbody v-for="CourseHourProfessor in course_hour_professors" :key="CourseHourProfessor.id">
        <tr>
         <td><p class="font-weight-medium">{{CourseHourProfessor.id}}</p></td>
         <td><p class="font-weight-medium">{{CourseHourProfessor.professor.user.fullname}}</p></td>
         <td><p class="font-weight-medium">{{CourseHourProfessor.professor.user.cin }}</p></td>
         <td><p class="font-weight-medium">{{CourseHourProfessor.professor.cnrps}}</p></td>
         <td><p class="font-weight-medium">{{CourseHourProfessor.professor.grade}}</p></td>
         <td><p class="font-weight-medium">{{CourseHourProfessor.course.name}}</p></td>
         <td><p class="font-weight-medium">{{CourseHourProfessor.week.name}}</p></td>
         <td><p class="font-weight-medium">{{CourseHourProfessor.nbr_hour_course}}</p></td>
         <td><p class="font-weight-medium">{{CourseHourProfessor.hour.heure_suivie}}</p></td>
         <td><v-btn color="success" fab x-small dark :to="{ name:'/get_bilan',params:{id:CourseHourProfessor.id}}"><v-icon>mdi-pencil</v-icon></v-btn>
            <v-btn color="red" fab x-small dark @click.prevent="deleteBilan(CourseHourProfessor.id)"><v-icon>mdi-delete</v-icon></v-btn>
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
    name:'course_hour_professors',
    
    created()
    {
        this.loadData();
    },

    methods:
    {
      loadData()
        {
          let url = this.url + '/api/bilans/get';
          axios.get(url).then(response => {
            this.course_hour_professors = response.data.course_hour_professors;
            console.log(this.course_hour_professors);
          }).catch(error => {
            console.log(error)
          });
      },
      
    },
    mounted()
        {
            console.log('bilans component mounted ');
        },
      
        data() {
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                course_hour_professors:[],
                
            }
        },
}


</script>