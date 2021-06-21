 <template>
<div>
<div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Affectation des heures supplimentaires aux professeurs</h2>

      <div class="card-body">
          <div class="col-md-6 offset-md-3">
              <form id="validateForm" @submit.prevent="updateHeures" enctype="multipart/form-data" novalidate> 
              <div  class="alert alert-danger" v-if="errors.length">
                  <ul class="mb-0">
                      <li v-for="(error,index) in errors" :key="index">
                          {{error}}
                      </li>
                  </ul>

              </div>
                <div class="form-group">
                    <label for="">Nbr. d'heures jury </label>
                    <input type="text" id="h_jury" v-model="heure_supp.h_jury" class="form-control" placeholder="Entrer la somme brute">
                </div>
                <div class="form-group">
                    <label for="">Nbr. d'heure d'encadrement</label>
                    <input type="text" id="h_encadrement" v-model="heure_supp.h_encadrement" class="form-control" placeholder="Entrer la h_encadrement">
                </div>
                <div class="form-group">
                    <label for="">Nbr. d'heures conseil</label>
                    <input type="text" id="h_conseil" v-model="heure_supp.h_conseil" class="form-control" placeholder="Entrer l'h_conseil">
                </div>
                <div class="form-group">
                    <label for="">Numéro de semstre</label>
                    <input type="text" id="semester" v-model="heure_supp.semester" class="form-control" placeholder="Entrer le net à payer">
                </div>
                <div class="form-group">
                    <label for="">ID professeur</label>
                    <input type="text" id="professor_id" v-model="heure_supp.professor_id" class="form-control" placeholder="Entrer lID du contrat">
                </div>
                <div class="form-group">
                    <label for="">Nbr. d'heures de surveillance</label>
                    <input type="text" id="h_surveillance"  v-model="heure_supp.h_surveillance" class="form-control" placeholder="Entrer le nom du professeur">
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
            heure_supp:{},
            h_jury : '',
            h_encadrement : '',
            h_conseil : '',
            semester : '',
            professor_id : '',
            h_surveillance : '',
            errors: []
        }
        
    },
    methods : 
    {
    loadData()
        { 
            let url = this.url+`/api/heures_supp/get_heure_supp/${this.$route.params.id}`;
            this.axios.get(url).then((response )=>{
                this.heure_supp=response.data;
                console.log(this.heure_supp);
            });
        },
        

updateHeures()
        {
            this.errors = [];
            if(!this.heure_supp.h_jury)
            {
                this.errors.push('nombre dheure jury est requis');
            }
            if(!this.heure_supp.h_encadrement)
            {
                this.errors.push('h_encadrement est requis');
            }
            if(!this.heure_supp.h_conseil)
            {
                this.errors.push('h_conseil est requis');
            }
            if(!this.heure_supp.semester)
            {
                this.errors.push('net à payer est requis');
            }
            if(!this.heure_supp.professor_id)
            {
                this.errors.push('Contract ID est requis');
            }
            if(!this.heure_supp.h_surveillance)
            {
                this.errors.push('h_surveillance   est requis');
            }
        

            if (!this.errors.length)
            {
                let formData = new FormData();
                formData.append('h_jury',this.heure_supp.h_jury);
                formData.append('h_encadrement',this.heure_supp.h_encadrement);
                formData.append('h_conseil',this.heure_supp.h_conseil);
                formData.append('semester',this.heure_supp.semester);
                formData.append('professor_id',this.heure_supp.professor_id);
                formData.append('h_surveillance',this.heure_supp.h_surveillance);
              
                let url = this.url + `/api/heures_supp/save_heure_supp/${this.$route.params.id}`;
                this.axios.post(url,formData).then((response) => {
                    if(response.status)
                    {
                      this.$utils.showSuccess('success', response.message);
                      this.$router.push({
                          name:'/heures_supp'
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
        console.log('Edit Heures supplimentaires component loaded');
    }
}
</script>
