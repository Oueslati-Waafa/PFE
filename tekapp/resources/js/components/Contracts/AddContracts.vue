<template>
  <div>
<div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Ajouter des contrats</h2>

      <div class="card-body">
          <div class="col-md-6 offset-md-3">
              <form id="validateForm" @submit.prevent="saveContract" enctype="multipart/form-data" novalidate> 
              <div  class="alert alert-danger" v-if="errors.length">
                  <ul class="mb-0">
                      <li v-for="(error,index) in errors" :key="index">
                          {{error}}
                      </li>
                  </ul>

              </div>
                <div class="form-group">
                    <label for="">Nom de professeur </label>
                    <input type="text" id="professor_id " v-model="contract.professor_id " class="form-control" placeholder="Entrer l'ID de professeur">
                </div>
                <div class="form-group">
                    <label for="">Date de début</label>
                    <input type="text" id="date_debut" v-model="contract.date_debut" class="form-control" placeholder="Entrer la date debut">
                </div>
                <div class="form-group">
                    <label for="">Date de fin</label>
                    <input type="text" id="date_fin" v-model="contract.date_fin" class="form-control" placeholder="Entrer l'date fin">
                </div>
                 <div class="form-group">
                    <label for="">Type</label>
                    <input type="text" id="type"  v-model="contract.type" class="form-control" placeholder="Entrer le type">
                </div>
                <div class="form-group">
                    <label for="">MF</label>
                    <input type="text" id="MF" v-model="contract.MF" class="form-control" placeholder="Entrer le MF">
                </div>
                <div class="form-group">
                    <label for="">RC</label>
                    <input type="text" id="RC" v-model="contract.RC" class="form-control" placeholder="Entrer l'RC">
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
            contract:{},
            professor_id : '',
            date_debut : '',
            date_fin : '',
            type : '',
            MF : '',
            RC : '',
            errors: []
        }
        
    },

        methods : 
    {
        saveContract()
        {
            this.errors = [];
            if(!this.contract.professor_id)
            {
                this.errors.push('Somme brut est requis');
            }
            if(!this.contract.date_debut)
            {
                this.errors.push('date_debut est requis');
            }
            if(!this.contract.date_fin)
            {
                this.errors.push('date_fin est requis');
            }
            if(!this.contract.type)
            {
                this.errors.push('type est requis');
            }
            if(!this.contract.MF)
            {
                this.errors.push('MF est requis');
            }
            if(!this.contract.RC)
            {
                this.errors.push('RC est requis');
            }
        

            if (!this.errors.length)
            {
                let formData = new FormData();
                formData.append('professor_id',this.contract.professor_id);
                formData.append('date_debut',this.contract.date_debut);
                formData.append('date_fin',this.contract.date_fin);
                formData.append('type',this.contract.type);
                formData.append('MF',this.contract.MF);
                formData.append('RC',this.contract.RC);
              
                let url = this.url + '/api/contracts/save_contract';
                this.axios.post(url,formData).then((response) => {
                    if(response.status)
                    {
                      this.$utils.showSuccess('success', response.message);
                      document.getElementById("professor_id").value = '';
                      document.getElementById("date_debut").value = '';
                      document.getElementById("date_fin").value = '';
                      document.getElementById("type").value = '';
                      document.getElementById("MF").value = '';
                      document.getElementById("RC").value = '';
                      this.$router.push({
                          name:'/contracts'});
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
        console.log('add contract component loaded');
    }

}

</script>

<style>

</style>