<template>
  <div>
<div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Ajouter des contrats</h2>

      <div class="card-body">
          <div class="col-md-6 offset-md-3">
              <form id="validateForm" @submit.prevent="updateBilan" enctype="multipart/form-data" novalidate> 
              <div  class="alert alert-danger" v-if="errors.length">
                  <ul class="mb-0">
                      <li v-for="(error,index) in errors" :key="index">
                          {{error}}
                      </li>
                  </ul>

              </div>
                <div class="form-group">
                    <label for="">Date de bilan </label>
                    <input type="text" id="dateBM " v-model="bilan_module.dateBM " class="form-control" placeholder="Entrer la date de bilan">
                </div>
                 <div class="form-group">
                    <label for="">Cours</label>
                    <input type="text" id="course_id" v-model="bilan_module.course_id" class="form-control" placeholder="Entrer le nom du cours">
                </div>
                <div class="form-group">
                    <label for="">Nom de professeur</label>
                    <input type="text" id="professor_id" v-model="bilan_module.professor_id" class="form-control" placeholder="Entrer e nom du professeur">
                </div>

               
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
            bilan_module:{},
            dateBM : '',
            course_id : '', 
            professor_id : '',
            errors: []
        }
        
    },

    methods : 
    {
    loadData()
        {
            let url = this.url+`/api/bilans/get_bilan/${this.$route.params.id}`;
            this.axios.get(url).then((response )=>{
                this.bilan_module=response.data;
                console.log(this.bilan_module);
            });
        },
        
 
updateBilan()
        { this.errors = [];
            if(!this.bilan_module.dateBM)
            {
                this.errors.push('dateBM id est requis');
            }
            if(!this.bilan_module.course_id)
            {
                this.errors.push('course_id est requis');
            }
            if(!this.bilan_module.professor_id)
            {
                this.errors.push('professor_id est requis');
            }
           
            if (!this.errors.length)
            {
                let formData = new FormData();
                formData.append('dateBM',this.bilan_module.dateBM);
                formData.append('course_id',this.bilan_module.course_id);
                formData.append('professor_id',this.bilan_module.professor_id);
                
              
                let url = this.url + `/api/bilans/save_bilan/${this.$route.params.id}`;
                this.axios.post(url,formData).then((response) => {
                    if(response.status)
                    {
                      this.$utils.showSuccess('success', response.message);
                      this.$router.push({
                          name:'/bilan'
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
        console.log('Edit Bilan component loaded');
    }
}
</script>
