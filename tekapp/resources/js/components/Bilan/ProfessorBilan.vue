<template>

    <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">Bilan</h2>
        
        <form v-for="CourseHourProfessor in course_hour_professors.slice(0,1)" :key="CourseHourProfessor.id">
          <v-row>
            <v-col>
                <v-text-field class="font-weight-medium" v-model="course_hour_professors[0].professor.user.fullname"  label="Nom & prenom" filled disabled></v-text-field>
            </v-col>
            <v-col>
                <v-text-field class="font-weight-medium" v-model="course_hour_professors[0].professor.user.cin"  label="CIN" filled disabled></v-text-field>
            </v-col>
        </v-row>
         <v-row>
            <v-col >
                <v-text-field class="font-weight-medium" v-model="course_hour_professors[0].professor.cnrps"  label="CNRPS" filled disabled></v-text-field>
            </v-col>
            <v-col >
                <v-text-field class="font-weight-medium" v-model="course_hour_professors[0].professor.grade" label="Grade" filled disabled></v-text-field>
            </v-col>
        </v-row>
        </form>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
        <th class="text-left">ID Bilan</th>
        <th class="text-left">Matière</th>
        <th class="text-left">Semaine</th>
        <th class="text-left">Nbr. d'heure d'enseignement</th>
        <th class="text-left">Actions</th>
        </tr>
      </thead>
      <tbody v-for="CourseHourProfessor in course_hour_professors" :key="CourseHourProfessor.id">
        <tr>
         <td><p class="font-weight-medium">{{CourseHourProfessor.id}}</p></td>
         <td><p class="font-weight-medium">{{CourseHourProfessor.course.name}}</p></td>
         <td><p class="font-weight-medium">{{CourseHourProfessor.week.name}}</p></td>
         <td><p class="font-weight-medium">{{CourseHourProfessor.nbr_hour_course}}</p></td>
         <td><v-btn color="success" fab x-small dark :to="{ name:'/get_bilan',params:{id:CourseHourProfessor.professor_id}}"><v-icon>mdi-pencil</v-icon></v-btn>
            <v-btn color="red" fab x-small dark @click.prevent="deleteBilan(CourseHourProfessor.id)"><v-icon>mdi-delete</v-icon></v-btn>
         </td>
         
        </tr>
      </tbody>
    </template>
  </v-simple-table>

    </div>

</template>

<script>
export default {
name:'course_hour_professors',


    data() {
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                course_hour_professors:[],
                button:null,
            }
        },
    created()
    {
        this.loadData();
        this.getId()  
    },

    methods:
    {

      getId()
      {
        const url = window.location.href;
        const lastParam = url.split("/").slice(-1)[0];
        this.button = lastParam;
        console.log(this.button);
      },

      loadData()
        {
          let url = this.url+`/api/bilans/get_bilan_professor/${this.$route.params.id}`
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
      
        getId()
      {
        const url = window.location.href;
        const lastParam = url.split("/").slice(-1)[0];
        console.log(lastParam);
      },

}


</script>