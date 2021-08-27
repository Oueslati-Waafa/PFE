 <template>
<div>
<div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Ajouter un paiement</h2>
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
                
                    <label for="" class="font-weight-regular">Somme Brut</label>
                    <v-text-field type="text" id="sommeBrut" v-model="paiement.sommeBrut"  placeholder="Entrer la somme brute"></v-text-field>
               
                    <label for="" class="font-weight-regular">Retenue</label>
                    <v-text-field type="text" id="retenue" v-model="paiement.retenue"  placeholder="Entrer la retenue"></v-text-field>
                
                    <label for="" class="font-weight-regular">Avance</label>
                    <v-text-field type="text" id="avance" v-model="paiement.avance"  placeholder="Entrer l'avance"></v-text-field>
                
                    <label for="" class="font-weight-regular">.Net à payer</label>
                    <v-text-field type="text" id="net" v-model="paiement.net_a_payer"  placeholder="Entrer le net à payer"></v-text-field>
                
                    <label for="" class="font-weight-regular">ID contrat</label>
                    <v-text-field type="text" id="contrat" v-model="paiement.contract_id"  placeholder="Entrer lID du contrat"></v-text-field>
                
                    <label for="" class="font-weight-regular">ID professeur</label>
                    <v-text-field type="text" id="professeur"  v-model="paiement.professor_id"  placeholder="Entrer le nom du professeur"></v-text-field>
               
                    <label for="" class="font-weight-regular">Date de paiement</label>
                    <v-text-field type="text" id="datepaiement" v-model="paiement.datepaiement"  placeholder="Entrer la date de paiement"></v-text-field>
                
<v-row align="center" justify="space-around">
    <v-col>
<v-btn 
  rounded 
  block 
  color="blue darken-3" 
  dark 
  large 
  @click="savePaiement()"
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
  to="/paiement"
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