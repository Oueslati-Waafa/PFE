<template>
  <div>
<div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Modifier les périodes</h2>

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
                
                    <label for="" class="font-weight-regular">Titre de la period </label>
                    <v-text-field id="name " v-model="period.name " placeholder="Entrer le Titre de la period"></v-text-field>
                
                
                    <label for="" class="font-weight-regular">Date de la début de period</label>
                    <v-text-field id="start_date" v-model="period.start_date" placeholder="Entrer la Date de la début de period"></v-text-field>
                
                    <label for="" class="font-weight-regular">Date de la fin de period</label>
                    <v-text-field id="end_date" v-model="period.end_date" placeholder="Entrer la Date de la fin de period"></v-text-field>

                   <label for="" class="font-weight-regular">Les sessions</label>
                   <input type="hidden" v-model="session">
                   <v-select v-model="period.session_id" class="font-weight-regular" :items="sessions"  item-text="name" item-value="id" label="Les Sessions" solo></v-select>
<v-row align="center" justify="space-around">
    <v-col>
<v-btn 
  rounded 
  block 
  color="blue darken-3" 
  dark 
  large 
  @click="updatePeriod()"
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
            period:{},
            sessions:[],
            session:null,
            name : '',
            type : '',
            start_date : '',
            end_date : '',
            errors: [],
            currentSession: null,
            
    }
  },
    
  mounted()
  {
    this.fetchData();
    console.log('Edit period component loaded');
  },
  methods:
  {
          loadData()
        {
            let url = this.url+`/api/period/get_period/${this.$route.params.id}`;
            this.axios.get(url).then((response )=>{
                this.period=response.data;
                console.log(this.period);
            });
        },

   
            // update the data given to the database
   updatePeriod()
        {
            this.errors = [];
            if(!this.period.name)
            {
                this.errors.push(' titre de period est requis');
            }
            if(!this.period.start_date)
            {
                this.errors.push('la date de la début de period est requis');
            }
            if(!this.period.end_date)
            {
                this.errors.push('la date de la fin de period est requis');
            }
             if(!this.period.session_id)
            {
                this.errors.push('la session de period est requis');
            }
            
            if (!this.errors.length)
            {
                let formData = new FormData();
                formData.append('name',this.period.name);
                formData.append('start_date',this.period.start_date);
                formData.append('end_date',this.period.end_date);
                formData.append('session_id',this.period.session_id);
            
                let url = this.url + `/api/period/save_period/${this.$route.params.id}`
                this.axios.post(url,formData).then((response) => {
                    if(response.status)
                    {
                      this.$utils.showSuccess('success', response.message);

                      this.$router.push({
                          name:'/period'});
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
      console.log("Value: ", this.session)        
    },
  
    // Return the data as an array for the select component
    fetchData()
    {
      ajax.get('/session/get').then(response =>
      {
        this.currentSession = null;
        this.sessions = response.data.sessions;
      });
    },

  },
      created()
    {
        this.loadData();
    },
}


</script>

<style>

</style>