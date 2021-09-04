<template>
  <div class="container">
     <h2 class="text-center p-2 text-white bg-primary mt-5">Modifier Bilan</h2>
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
                  <input type="hidden" name="professor_id" v-model="course_hour_professors.professor_id"><br>

                    <label for="" class="font-weight-regular">Nom & Prénom </label>
                    <v-text-field class="font-weight-regular" id="fullname " v-model="course_hour_professors.professor.user.fullname " disabled></v-text-field>
                     
                    <label for="" class="font-weight-regular"> CIN </label>
                    <v-text-field class="font-weight-regular" id="cin " v-model="course_hour_professors.professor.user.cin " disabled></v-text-field>

                    <label for="" class="font-weight-regular"> CNRPS </label>
                    <v-text-field class="font-weight-regular" id="cnrps " v-model="course_hour_professors.professor.cnrps " disabled></v-text-field>

                    <label for="" class="font-weight-regular"> GRADE </label>
                    <v-text-field class="font-weight-regular" id="grade" v-model="course_hour_professors.professor.grade " disabled></v-text-field>

                   <label for="" class="font-weight-regular">Les Matières</label>
                   <input type="hidden" v-model="course">
                   <v-select v-model="course_hour_professors.course_id" class="font-weight-regular" :items="courses"  item-text="name" item-value="id" label="Selectionner une Matière" solo></v-select>

                   <label for="" class="font-weight-regular">Les Semaines</label>
                   <input type="hidden" v-model="week">
                   <v-select v-model="course_hour_professors.week_id" class="font-weight-regular" :items="weeks"  item-text="name" item-value="id" label="Selectionner une Semaine" solo></v-select>


                    <label for="" class="font-weight-regular"> Nombre d'heures enseignées </label>
                    <v-text-field class="font-weight-regular" id="grade" v-model="course_hour_professors.nbr_hour_course"></v-text-field>



                  <v-row align="center" justify="space-around">
                    <v-col>
                     <v-btn rounded block color="blue darken-3"  dark large @click="updateBilan()"> ENREGISTER</v-btn>
                    </v-col>
                    <v-col>
                     <v-btn  rounded block color="error" dark large to="/week">ANNULER</v-btn>
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
   data()
    {
      return {
      url: document.head.querySelector('meta[name="url"]').content,
      course_hour_professors:[],
      errors:[],
      weeks:[],
      week:null,
      courses:[],
      course:null,
      button:null,
      currentWeek: null,    
      currentCourse: null,           
      nbr_hour_course: '',           
      }
    },

  created()
  {
    this.loadData();
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
        axios.get(url).then(response => {
            this.course_hour_professors = response.data.course_hour_professors;
            console.log(this.course_hour_professors);
          }).catch(error => {
            console.log(error)
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
            if(!this.course_hour_professors.course_id)
            {
                this.errors.push('la matière est requis');
            }
             if(!this.course_hour_professors.week_id)
            {
                this.errors.push('la semaine est requis');
            }
            
            if (!this.errors.length)
            {
                
                let formData = new FormData();
                formData.append('professor_id',this.course_hour_professors.professor_id);
                formData.append('course_id',this.course_hour_professors.course_id);
                formData.append('week_id',this.course_hour_professors.week_id);
                formData.append('nbr_hour_course',this.course_hour_professors.nbr_hour_course);
            
                let url = this.url+`/api/bilans/save_bilan/${this.$route.params.id}`;
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


}
</script>