 <template>
  <div>
<div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Modifier des contrats</h2>

      <div class="card-body">
          <div class="col-md-6 offset-md-3">
              <form id="validateForm" @submit.prevent="updateContracts" enctype="multipart/form-data" novalidate> 
              <div  class="alert alert-danger" v-if="errors.length">
                  <ul class="mb-0">
                      <li v-for="(error,index) in errors" :key="index">
                          {{error}}
                      </li>
                  </ul>

              </div>
               
                    <label for="" class="font-weight-regular">Nom de professeur </label>
                    <v-text-field type="text" id="professor_id " v-model="contract.professor_id "  placeholder="Entrer l'ID de professeur"></v-text-field>
              
                    <label for="" class="font-weight-regular">Date de début</label>
                    <v-text-field type="text" id="date_debut" v-model="contract.date_debut"  placeholder="Entrer la date debut"></v-text-field>
                
                    <label for="" class="font-weight-regular">Date de fin</label>
                    <v-text-field type="text" id="date_fin" v-model="contract.date_fin"  placeholder="Entrer l'date fin"></v-text-field>
             
                    <label for="" class="font-weight-regular">Type</label>
                    <v-text-field type="text" id="type"  v-model="contract.type"  placeholder="Entrer le type"></v-text-field>
                
                
                    <label for="" class="font-weight-regular">MF</label>
                    <v-text-field type="text" id="MF" v-model="contract.MF"  placeholder="Entrer le MF"></v-text-field>
                
                
                    <label for="" class="font-weight-regular">RC</label>
                    <v-text-field type="text" id="RC" v-model="contract.RC"  placeholder="Entrer l'RC"></v-text-field>
               
               
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
    loadData()
        {
            let url = this.url+`/api/contracts/get_contracts/${this.$route.params.id}`;
            this.axios.get(url).then((response )=>{
                this.contract=response.data;
                console.log(this.contract);
            });
        },
        
 
updateContracts()
        { this.errors = [];
            if(!this.contract.professor_id)
            {
                this.errors.push('proffesor id est requis');
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
              
                let url = this.url + `/api/contracts/save_contracts/${this.$route.params.id}`;
                this.axios.post(url,formData).then((response) => {
                    if(response.status)
                    {
                      this.$utils.showSuccess('success', response.message);
                      this.$router.push({
                          name:'/contracts'
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
        console.log('Edit Contracts component loaded');
    }
}
</script>
