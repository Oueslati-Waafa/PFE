<template>
  <div>
<div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Saisie des prix des heures</h2>

      <div class="card-body">
          <div class="col-md-6 offset-md-3">
              <form id="validateForm"  enctype="multipart/form-data" novalidate> 
              <div  class="alert alert-danger" v-if="errors.length">
                  <ul class="mb-0">
                      <li v-for="(error,index) in errors" :key="index">
                          {{error}}
                      </li>
                  </ul>

              </div>
                
                    <label for="" class="font-weight-regular">Titre de la session </label>
                    <v-text-field id="name " v-model="session.name " placeholder="Entrer le Titre de la session"></v-text-field>
                
                 
                    <label for="" class="font-weight-regular">Type de la session</label>
                    <v-text-field id="type" v-model="session.type" placeholder="Entrer le type de la session"></v-text-field>
                
                
                    <label for="" class="font-weight-regular">Date de la début de session</label>
                    <v-text-field id="start_date" v-model="session.start_date" placeholder="Entrer la Date de la début de session"></v-text-field>
                
                    <label for="" class="font-weight-regular">Date de la fin de session</label>
                    <v-text-field id="start_date" v-model="session.end_date" placeholder="Entrer la Date de la fin de session"></v-text-field>

<v-row align="center" justify="space-around">
    <v-col>
<v-btn 
  rounded 
  block 
  color="blue darken-3" 
  dark 
  large 
  @click="saveSession()"
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
  to="/session"
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
export default {
data()
    {
        return{
            url: document.head.querySelector('meta[name="url"]').content,
            session:{},
            name : '',
            type : '',
            start_date : '',
            end_date : '',
            errors: []
        }
        
    },

        methods : 
    {
        saveSession()
        {
            this.errors = [];
            if(!this.session.name)
            {
                this.errors.push(' titre de session est requis');
            }
               if(!this.session.type)
            {
                this.errors.push(' type de session est requis');
            }
            if(!this.session.start_date)
            {
                this.errors.push('la date de la début de session est requis');
            }
            if(!this.session.end_date)
            {
                this.errors.push('la date de la fin de session est requis');
            }
            
            if (!this.errors.length)
            {
                let formData = new FormData();
                formData.append('name',this.session.name);
                formData.append('type',this.session.type);
                formData.append('start_date',this.session.start_date);
                formData.append('end_date',this.session.end_date);
                
           
            
                let url = this.url + '/api/session/save_session';
                this.axios.post(url,formData).then((response) => {
                    if(response.status)
                    {
                        
                      this.$utils.showSuccess('success', response.message);

                      this.$router.push({
                          name:'/session'});
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
        console.log('add session component loaded');
    }

}

</script>

<style>

</style>