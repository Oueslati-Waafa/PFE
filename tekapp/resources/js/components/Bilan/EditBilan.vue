
<template>
 <div class="container">
     <h2 class="text-center p-2 text-white bg-primary mt-5">Saisie Bilan</h2>
   <div class="card-body">
          <div class="col-md-6 offset-md-3">
                 <form id="validateForm" enctype="multipart/form-data" novalidate> 
              <div  class="alert alert-danger" v-if="errors.length">
                  <ul class="mb-0">
                      <li v-for="(error,index) in errors" :key="index">
                          {{error}}
                      </li>
                  </ul>

              </div>
<div  v-for="professor in professors" :key="professor.id">
     
            
                <v-text-field class="font-weight-medium" v-model="professor[0].user.fullname"  label="Nom & prenom" filled disabled></v-text-field>

                <v-text-field class="font-weight-medium" v-model="professor[0].user.cin"  label="CIN" filled disabled></v-text-field>
                 
                <v-text-field class="font-weight-medium" v-model="professor[0].cnrps"  label="CNRPS" filled disabled></v-text-field>
      
                <v-text-field class="font-weight-medium" v-model="professor[0].grade" label="Grade" filled disabled></v-text-field>
                <input type="hidden" v-model="professor[0].id">
</div> 
                  
                   <label for="" class="font-weight-regular">Les Matières</label>
                   <input type="hidden" v-model="course">
                   <v-select v-model="course" class="font-weight-regular" :items="courses"  item-text="name" item-value="id" label="Selectionner une Matière" solo></v-select>

                   <label for="" class="font-weight-regular">Les Semaines</label>
                   <input type="hidden" v-model="week">
                   <v-select v-model="week" class="font-weight-regular" :items="weeks"  item-text="name" item-value="id" label="Selectionner une Semaine" solo></v-select>

                    <label for="" class="font-weight-regular">Nombre d'heures d'enseignement</label>
                    <v-text-field type="text" id="nbr_hour_course" v-model="course_hour_professors.nbr_hour_course"  placeholder="Entrer le nombre d'heures enseignées"></v-text-field>


<v-row align="center" justify="space-around">
    <v-col>
<v-btn 
  rounded 
  block 
  color="blue darken-3" 
  dark 
  large 
  @click="updateBilan()"
>
  ENREGISTER
</v-btn>
</v-col>
<v-col>
<v-btn 
  rounded 
  block 
  color="error" 
  dark 
  large 
  to="/week"
>
  ANNULER
</v-btn>
</v-col>
</v-row>
            
      </form>
    </div>
 </div>
</div>
</template>
<script>
import axios from 'axios';

const ajax = axios.create({
  baseURL: 'http://127.0.0.1:8000/api',
  headers: {
    'Content-Type': 'application/json'
  }
});
export default {
name:'professors',

  
  data()
    {
      return {
      url: document.head.querySelector('meta[name="url"]').content,
      professors:[],
      course_hour_professors:[],
      errors:[],
      weeks:[],
      week:null,
      button:null,
      currentWeek: null,    
      courses:[],
      course:null,
      currentCourse: null,           
      nbr_hour_course: '',           
                  }
    },
      
  mounted()
  {
    this.fetchWeekData();
    this.fetchCourseData();
    console.log('component loaded');
  },
  methods:
  {

loadData()
    {
        let url = this.url+`/api/bilans/get_bilan/${this.$route.params.id}`;
        this.axios.get(url).then((response )=>{
            this.course_hour_professors=response.data;
            console.log(this.course_hour_professors);
        });
    },

    loadProfessorData()
    {
        let url = this.url+`/api/professor/get_professor/${this.$route.params.id}`;
        this.axios.get(url).then((response )=>{
            this.professors=response.data;
            console.log(this.professors);
        });
    },
    fetchWeekData()
    {
      ajax.get('/weeks/get').then(response =>
      {
        this.currentWeek = null;
        this.weeks = response.data.weeks;
      });
    },

    fetchCourseData()
     {
      ajax.get('/course/all').then(response =>
      {
        this.currentCourse = null;
        this.courses = response.data.courses;
      });
    },

    updateBilan()
        {
            this.errors = [];

            if(!this.course_hour_professors.nbr_hour_course)
            {
                this.errors.push('le nombre dheures enseignées est requis');
            }
            if(!this.course)
            {
                this.errors.push('la matière est requis');
            }
             if(!this.week)
            {
                this.errors.push('la semaine est requis');
            }
            
            if (!this.errors.length)
            {
                const professorId = window.location.href;
                const lastParam = professorId.split("/").slice(-1)[0];
                this.button = lastParam;
                console.log(this.button);
                let formData = new FormData();
                formData.append('professor_id',this.button);
                formData.append('course_id',this.course);
                formData.append('week_id',this.week);
                formData.append('nbr_hour_course',this.course_hour_professors.nbr_hour_course);
            
                let url = this.url+`/api/bilans/get_bilan/${this.$route.params.id}`;
                this.axios.post(url,formData).then((response) => {
                    if(response.status)
                    {
                      this.$utils.showSuccess('success', response.message);

                      this.$router.push({
                          name:'/bilans'});
                    }
                    else {
                    this.$utils.showError('Error', response.message);
                    }
                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });  
            }
        }
  },
      created()
    {
        this.loadProfessorData();
        this.loadData();
    },
}

</script>
