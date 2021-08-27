<template>
  <div>
<div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Ajouter des contrats</h2>

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
                
                    <label for="" class="font-weight-regular">Date de bilan </label>
                    <v-text-field id="dateBM " v-model="bilan_module.dateBM " placeholder="Entrer la date de bilan"></v-text-field>
                
                 
                    <label for="" class="font-weight-regular">Cours</label>
                    <v-text-field id="course_id" v-model="bilan_module.course_id" placeholder="Entrer le nom du cours"></v-text-field>
                
                
                    <label for="" class="font-weight-regular">Nom de professeur</label>
                    <v-text-field id="professor_id" v-model="bilan_module.professor_id" placeholder="Entrer e nom du professeur"></v-text-field>
                
<v-row align="center" justify="space-around">
    <v-col>
<v-btn 
  rounded 
  block 
  color="blue darken-3" 
  dark 
  large 
  @click="saveBilan()"
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
  to="/bilan"
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
            bilan_module:{},
            dateBM : '',
            course_id : '',
            professor_id : '',
            errors: []
        }
        
    },

        methods : 
    {
        saveBilan()
        {
            this.errors = [];
            if(!this.bilan_module.dateBM)
            {
                this.errors.push('date de bilan est requis');
            }
               if(!this.bilan_module.course_id)
            {
                this.errors.push('cours est requis');
            }
            if(!this.bilan_module.professor_id)
            {
                this.errors.push('nom de professeur est requis');
            }
         
            
            if (!this.errors.length)
            {
                let formData = new FormData();
                formData.append('dateBM',this.bilan_module.dateBM);
                formData.append('course_id',this.bilan_module.course_id);
                formData.append('professor_id',this.bilan_module.professor_id);
                
           
            
                let url = this.url + '/api/bilans/save_bilan';
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
    mounted: function()
    {
        console.log('add bilan component loaded');
    }

}

</script>

<style>

</style>