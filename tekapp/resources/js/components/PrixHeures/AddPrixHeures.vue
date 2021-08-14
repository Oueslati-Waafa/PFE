<template>
  <div>
<div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Saisie des prix des heures</h2>

      <div class="card-body">
          <div class="col-md-6 offset-md-3">
              <form id="validateForm" @submit.prevent="savePrix" enctype="multipart/form-data" novalidate> 
              <div  class="alert alert-danger" v-if="errors.length">
                  <ul class="mb-0">
                      <li v-for="(error,index) in errors" :key="index">
                          {{error}}
                      </li>
                  </ul>

              </div>
                
                    <label for="" class="font-weight-regular">Prix des Heures du Jour </label>
                    <v-text-field id="jour " v-model="prix_heure.jour " placeholder="Entrer le Prix des Heures du Jour"></v-text-field>
                
                 
                    <label for="" class="font-weight-regular">Prix des Heures du Soir</label>
                    <v-text-field id="soir" v-model="prix_heure.soir" placeholder="Entrer le Prix des Heures du Soir"></v-text-field>
                
                
                    <label for="" class="font-weight-regular">Prix des Heures de Suivie</label>
                    <v-text-field id="suivie" v-model="prix_heure.suivie" placeholder="Entrer le prix des heures de suivie"></v-text-field>
                
                    <label for="" class="font-weight-regular">Prix des Heures de Conseil/PFE</label>
                    <v-text-field id="suivie" v-model="prix_heure.conseil_pfe" placeholder="Entrer le Prix des Heures de Conseil/PFE"></v-text-field>

               
                <button class="btn btn-primary mt-4"> Valider </button>
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
            prix_heure:{},
            jour : '',
            soir : '',
            suivie : '',
            conseil_pfe : '',
            errors: []
        }
        
    },

        methods : 
    {
        savePrix()
        {
            this.errors = [];
            if(!this.prix_heure.jour)
            {
                this.errors.push('prix des heures du jour est requis');
            }
               if(!this.prix_heure.soir)
            {
                this.errors.push('prix des heures de soir est requis');
            }
            if(!this.prix_heure.suivie)
            {
                this.errors.push('prix des heures suivie est requis');
            }
            if(!this.prix_heure.conseil_pfe)
            {
                this.errors.push('prix des heures conseil/pfe est requis');
            }
            
            if (!this.errors.length)
            {
                let formData = new FormData();
                formData.append('jour',this.prix_heure.jour);
                formData.append('soir',this.prix_heure.soir);
                formData.append('suivie',this.prix_heure.suivie);
                formData.append('conseil_pfe',this.prix_heure.conseil_pfe);
                
           
            
                let url = this.url + '/api/prix/save_prix';
                this.axios.post(url,formData).then((response) => {
                    if(response.status)
                    {
                        
                      this.$utils.showSuccess('success', response.message);

                      this.$router.push({
                          name:'/prix_heures'});
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
        console.log('add prix component loaded');
    }

}

</script>

<style>

</style>