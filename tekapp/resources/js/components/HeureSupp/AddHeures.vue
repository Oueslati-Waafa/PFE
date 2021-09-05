 <template>
<div>
<div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Affectation des heures supplimentaires aux professeurs</h2>

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
                
                   <label for="" class="font-weight-regular">Nom & prénom</label>
                   <input type="hidden" v-model="professor">
                   <v-select v-model="professor" class="font-weight-regular" :items="professors"  item-text="user.fullname" item-value="id" label="Selectionner un enseignant" solo></v-select>

                    <label for="" class="font-weight-regular">Nbr. d'heures de surveillance </label>
                    <v-text-field type="text" id="h_jury" v-model="hours.heure_suivie"  placeholder="Entrer les heures jury"></v-text-field>
                
                    <label for="" class="font-weight-regular">Nbr. d'heure de participation au conseil/PFE</label>
                    <v-text-field type="text" id="h_encadrement" v-model="hours.conseil_pfe"  placeholder="Entrer la h_encadrement"></v-text-field>
               
                    <label for="" class="font-weight-regular">Jour/Soir</label>
                    <v-text-field type="text" id="h_conseil" v-model="hours.type"  placeholder="Entrer l'h_conseil"></v-text-field>
               
                   <label for="" class="font-weight-regular">Les Semaines</label>
                   <input type="hidden" v-model="week">
                   <v-select v-model="week" class="font-weight-regular" :items="weeks"  item-text="name" item-value="id" label="Selectionner une Semaine" solo></v-select>

                       
<v-row align="center" justify="space-around">
    <v-col>
<v-btn 
  rounded 
  block 
  color="blue darken-3" 
  dark 
  large 
  @click="saveHeures()"
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
  to="/heures_supp"
>
  ANNULER
</v-btn>
</v-col>
</v-row>
              </form>
          </div>
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
        return{
            url: document.head.querySelector('meta[name="url"]').content,
            hours:[],
            heure_suivie : '',
            conseil_pfe : '',
            type : '',
            professors : [],
            professor : null,
            currentProfessor : null,
            weeks : [],
            week : null,
            currentWeek : null,
            errors: []
        }
        
    },

    created()
    {
        this.fetchProfessorData();
        this.fetchWeekData();
    },

        methods : 
    {
        saveHeures()
        {
            this.errors = [];
            if(!this.professor)
            {
                this.errors.push('le professeur est requis');
            }
            if(!this.hours.heure_suivie)
            {
                this.errors.push('le nombre dheures de surveillance est requis');
            }
            if(!this.hours.conseil_pfe)
            {
                this.errors.push('le nombre dheures de participation au conseil/pfe  est requis');
            }
            if(!this.hours.type)
            {
                this.errors.push('le type est requis');
            }
            if(!this.week)
            {
                this.errors.push('la semaine est requis');
            }
        

            if (!this.errors.length)
            {
                let formData = new FormData();
                formData.append('professor_id',this.professor);
                formData.append('heure_suivie',this.hours.heure_suivie);
                formData.append('conseil_pfe',this.hours.conseil_pfe);
                formData.append('type',this.hours.type);
                formData.append('week_id',this.week);
                

                let url = this.url + '/api/hours/save_hour';
                this.axios.post(url,formData).then((response) => {
                    if(response.status)
                    {
                      this.$utils.showSuccess('success', response.message);
                      this.$router.push({
                          name:'/heures_supp'});
                    }
                    else {
                    this.$utils.showError('Error', response.message);
                    }
                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });  
            }
        },

        fetchProfessorData()
        {
            ajax.get('/professor/get').then(response =>
            {
                this.currentProfessor = null;
                this.professors = response.data.professors;
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
        }
    },
    mounted: function()
    {
        console.log('add hours component loaded');
    }
}
</script>

<style>

</style>