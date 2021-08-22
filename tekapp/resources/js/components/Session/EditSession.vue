<template>
  <div>
<div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Modifier les Sessions</h2>

      <div class="card-body">
          <div class="col-md-6 offset-md-3">
              <form id="validateForm" @submit.prevent="updateSession" enctype="multipart/form-data" novalidate> 
              <div  class="alert alert-danger" v-if="errors.length">
                  <ul class="mb-0">
                      <li v-for="(error,index) in errors" :key="index">
                          {{error}}
                      </li>
                  </ul>

              </div>
                
                   <label for="" class="font-weight-regular">Titre de la session</label>
                    <v-text-field id="name " v-model="session.name " placeholder="Entrer le Prix des Heures du name"></v-text-field>
                
                 
                    <label for="" class="font-weight-regular">Type de la session</label>
                    <v-text-field id="type" v-model="session.type" placeholder="Entrer le Prix des Heures du type"></v-text-field>
                
                
                    <label for="" class="font-weight-regular">Date de la début de session</label>
                    <v-text-field id="start_date" v-model="session.start_date" placeholder="Entrer la date de la début de session"></v-text-field>
                
                    <label for="" class="font-weight-regular">Date de la fin de session</label>
                    <v-text-field id="start_date" v-model="session.end_date" placeholder="Entrer la date de la fin de session"></v-text-field>
                

               
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
    loadData()
        {
            let url = this.url+`/api/session/get_session/${this.$route.params.id}`;
            this.axios.get(url).then((response )=>{
                this.session=response.data;
                console.log(this.session);
            });
        },
        
 
updateSession()
        { this.errors = [];
            if(!this.session.name)
            {
                this.errors.push('titre de session est requis');
            }
            if(!this.session.type)
            {
                this.errors.push('type de session est requis');
            }
            if(!this.session.start_date)
            {
                this.errors.push('date de début de la session est requis');
            }
            if(!this.session.end_date)
            {
                this.errors.push('date de fin de la session est requis');
            }
           
            if (!this.errors.length)
            {
                let formData = new FormData();
                formData.append('name',this.session.name);
                formData.append('type',this.session.type);
                formData.append('start_date',this.session.start_date);
                formData.append('end_date',this.session.end_date);
                
              
                let url = this.url + `/api/session/save_session/${this.$route.params.id}`;
                this.axios.post(url,formData).then((response) => {
                    if(response.status)
                    {
                      this.$utils.showSuccess('success', response.message);
                      this.$router.push({
                          name:'/session'
                      });
                      
                    }
                    else {
                    this.$utils.showError('Error', response.message);
                    }
                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });  
            }
        },
       
    },
    created()
    {
        this.loadData();
    },
    mounted: function()
    {
        console.log('Edit session component loaded');
    }
}
</script>
