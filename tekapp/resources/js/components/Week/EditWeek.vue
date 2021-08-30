<template>
  <div>
<div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Saisie des semaines</h2>

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

              <label for="" class="font-weight-regular">Date de début de semaine</label>
                    <v-text-field id="start_date" v-model="week.date_debut" placeholder="Entrer la Date de début de semaine"></v-text-field>
                
                    <label for="" class="font-weight-regular">Date de fin de semaine</label>
                    <v-text-field id="start_date" v-model="week.date_fin" placeholder="Entrer la Date de fin de semaine"></v-text-field>

                   <label for="" class="font-weight-regular">La date de début de periode</label>
                   <input type="hidden" v-model="period">
                   <v-select v-model="period" class="font-weight-regular" :items="periods"  item-text="start_date" item-value="id" label="La Période" solo></v-select>
<v-row align="center" justify="space-around">
    <v-col>
<v-btn 
  rounded 
  block 
  color="blue darken-3" 
  dark 
  large 
  @click="updateWeek()"
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
  to="/period"
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
    return {
        
       url: document.head.querySelector('meta[name="url"]').content,
            week:{},
            periods:[],
            period:null,
            date_debut : '',
            date_fin : '',
            errors: [],
            currentPeriod: null,
            
    }
  },
    
  mounted()
  {
    this.fetchData();
    console.log('Edit weeks component loaded');
  },
  methods:
  {
          loadData()
        {
            let url = this.url+`/api/weeks/get_week/${this.$route.params.id}`;
            this.axios.get(url).then((response )=>{
                this.week=response.data;
                console.log(this.week);
            });
        },

   
            // update the data given to the database
   updateWeek()
        {
            this.errors = [];
            if(!this.week.date_debut)
            {
                this.errors.push('la date de  début est requis');
            }
            if(!this.week.date_fin)
            {
                this.errors.push('la date de fin est requis');
            }
             if(!this.week.period_id)
            {
                this.errors.push('la period est requis');
            }
            
            if (!this.errors.length)
            {
                let formData = new FormData();
                formData.append('date_debut',this.week.date_debut);
                formData.append('date_fin',this.week.date_fin);
                formData.append('period_id',this.week.period_id);
            
                let url = this.url + `/api/weeks/save_week/${this.$route.params.id}`
                this.axios.post(url,formData).then((response) => {
                    if(response.status)
                    {
                      this.$utils.showSuccess('success', response.message);

                      this.$router.push({
                          name:'/week'});
                    }
                    else {
                    this.$utils.showError('Error', response.message);
                    }
                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });  
            }
        },


    directToSession() {
      console.log("Value: ", this.period)        
    },
  
    // Return the data as an array for the select component
    fetchData()
    {
      ajax.get('/period/get').then(response =>
      {
        this.currentPeriod = null;
        this.periods = response.data.periods;
      });
    },

  },
      created()
    {
        this.loadData();
    },
}


</script>
