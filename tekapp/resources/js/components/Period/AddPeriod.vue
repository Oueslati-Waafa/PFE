<template>
  <div>
<div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Saisie des prix des heures</h2>

      <div class="card-body">
          <div class="col-md-6 offset-md-3">
              <form id="validateForm" @submit.prevent="saveperiod" enctype="multipart/form-data" novalidate> 
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
                    <v-text-field id="start_date" v-model="period.end_date" placeholder="Entrer la Date de la fin de period"></v-text-field>

                   <label for="" class="font-weight-regular">Les sessions</label>
                   <v-select class="font-weight-regular" :items="sessions"  item-text="name" item-value="id" label="Les Sessions" solo></v-select>
               
                <button class="btn btn-primary mt-4"> Valider </button>
              </form>
          </div>
      </div>
</div>  
</div>
</template>

<script>
export default {
created()
    {
let url = this.url + '/api/session/get';
          axios.get(url).then(response => {
            this.sessions = response.data.sessions;
            console.log(this.sessions);
          }).catch(error => {
            console.log(error)
          });
    },
data()
    {
        return{
            url: document.head.querySelector('meta[name="url"]').content,
            period:[],
            sessions:[],
            name : '',
            type : '',
            start_date : '',
            end_date : '',
            errors: [],
            
        }
        
    },

        methods : 
    {
        savePeriod()
        {
            this.errors = [];
            if(!this.period.name)
            {
                this.errors.push(' titre de period est requis');
            }
               if(!this.period.type)
            {
                this.errors.push(' type de period est requis');
            }
            if(!this.period.start_date)
            {
                this.errors.push('la date de la début de period est requis');
            }
            if(!this.period.end_date)
            {
                this.errors.push('la date de la fin de period est requis');
            }
            
            if (!this.errors.length)
            {
                let formData = new FormData();
                formData.append('name',this.period.name);
                formData.append('type',this.period.type);
                formData.append('start_date',this.period.start_date);
                formData.append('end_date',this.period.end_date);
                
           
            
                let url = this.url + '/api/period/save_period';
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
        }
    },
    mounted: function()
    {
        console.log('add period component loaded');
    }

}

</script>

<style>

</style>