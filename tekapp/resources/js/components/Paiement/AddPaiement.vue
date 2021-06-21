 <template>
<div>
<div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Ajouter un paiement</h2>
      <div class="card-body">
          <div class="col-md-6 offset-md-3">
              <form id="validateForm" @submit.prevent="savePaiement" enctype="multipart/form-data" novalidate> 
              <div  class="alert alert-danger" v-if="errors.length">
                  <ul class="mb-0">
                      <li v-for="(error,index) in errors" :key="index">
                          {{error}}
                      </li>
                  </ul>

              </div>
                <div class="form-group">
                    <label for="">Somme Brut</label>
                    <input type="text" id="sommeBrut" v-model="paiement.sommeBrut" class="form-control" placeholder="Entrer la somme brute">
                </div>
                <div class="form-group">
                    <label for="">Retenue</label>
                    <input type="text" id="retenue" v-model="paiement.retenue" class="form-control" placeholder="Entrer la retenue">
                </div>
                <div class="form-group">
                    <label for="">Avance</label>
                    <input type="text" id="avance" v-model="paiement.avance" class="form-control" placeholder="Entrer l'avance">
                </div>
                <div class="form-group">
                    <label for="">.Net à payer</label>
                    <input type="text" id="net" v-model="paiement.net_a_payer" class="form-control" placeholder="Entrer le net à payer">
                </div>
                <div class="form-group">
                    <label for="">ID contrat</label>
                    <input type="text" id="contrat" v-model="paiement.contract_id" class="form-control" placeholder="Entrer lID du contrat">
                </div>
                <div class="form-group">
                    <label for="">ID professeur</label>
                    <input type="text" id="professeur"  v-model="paiement.professor_id" class="form-control" placeholder="Entrer le nom du professeur">
                </div>
                <div class="form-group">
                    <label for="">Date de paiement</label>
                    <input type="text" id="datepaiement" v-model="paiement.datepaiement" class="form-control" placeholder="Entrer la date de paiement">
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
            paiement:{},
            sommeBrut : '',
            retenue : '',
            avance : '',
            net_a_payer : '',
            contract_id : '',
            professor_id : '',
            datepaiement : '',
            errors: []
        }
        
    },
    methods : 
    {
        savePaiement()
        {
            this.errors = [];
            if(!this.paiement.sommeBrut)
            {
                this.errors.push('Somme brut est requis');
            }
            if(!this.paiement.retenue)
            {
                this.errors.push('retenue est requis');
            }
            if(!this.paiement.avance)
            {
                this.errors.push('Avance est requis');
            }
            if(!this.paiement.net_a_payer)
            {
                this.errors.push('net à payer est requis');
            }
            if(!this.paiement.contract_id)
            {
                this.errors.push('Contract ID est requis');
            }
            if(!this.paiement.professor_id)
            {
                this.errors.push('Professor ID  est requis');
            }
            if(!this.paiement.datepaiement)
            {
                this.errors.push('Date est requis');
            }

            if (!this.errors.length)
            {
                let formData = new FormData();
                formData.append('sommeBrut',this.paiement.sommeBrut);
                formData.append('retenue',this.paiement.retenue);
                formData.append('avance',this.paiement.avance);
                formData.append('net_a_payer',this.paiement.net_a_payer);
                formData.append('contract_id',this.paiement.contract_id);
                formData.append('professor_id',this.paiement.professor_id);
                formData.append('datepaiement',this.paiement.datepaiement);
                let url = this.url + '/api/paiement/save_paiement';
                this.axios.post(url,formData).then((response) => {
                    if(response.status)
                    {
                      this.$utils.showSuccess('success', response.message);
                    this.$router.push({
                          name:'/paiement'});
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
        console.log('add paiement component loaded');
    }
}
</script>

<style>

</style>