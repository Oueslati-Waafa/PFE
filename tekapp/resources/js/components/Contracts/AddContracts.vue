<template>
  <div>
<div class="container">
      <h2 class="text-center p-2 text-white bg-primary mt-5">Ajouter des contrats</h2>

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

              
                   <label for="" class="font-weight-regular">Nom & prénom</label>
                   <input type="hidden" v-model="professor">
                   <v-select v-model="professor" class="font-weight-regular" :items="professors"  item-text="user.fullname" item-value="id" label="Selectionner un enseignant" solo></v-select>
                
                
                    <label for="" class="font-weight-regular">Date de début</label>
                    <v-text-field type="text" id="date_debut" v-model="contract.date_debut" placeholder="Entrer la date debut"></v-text-field>
           
                
                    <label for="" class="font-weight-regular">Date de fin</label>
                    <v-text-field type="text" id="date_fin" v-model="contract.date_fin" placeholder="Entrer l'date fin"></v-text-field>
                
                 
                    <label for="" class="font-weight-regular">Type</label>
                    <v-text-field type="text" id="type"  v-model="contract.type"  placeholder="Entrer le type"></v-text-field>
                
                
                    <label for="" class="font-weight-regular">MF</label>
                    <v-text-field type="text" id="MF" v-model="contract.MF" placeholder="Entrer le MF"></v-text-field>
               
                    <label for="" class="font-weight-regular">RC</label>
                    <v-text-field type="text" id="RC" v-model="contract.RC" placeholder="Entrer l'RC"></v-text-field>
          
               
<v-row align="center" justify="space-around">
    <v-col>
<v-btn 
  rounded 
  block 
  color="blue darken-3" 
  dark 
  large 
  @click="saveContract()"
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
  to="/contracts"
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
import axios from 'axios';

const ajax = axios.create({
  baseURL: 'http://127.0.0.1:8000/api',
  headers: {
    'Content-Type': 'application/json'
  }
});
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
            errors: [],
            professors : [],
            professor : null,
            currentProfessor : null,
        }
        
    },
    created()
    {
        this.fetchProfessorData();
    },

        methods : 
    {
       fetchProfessorData()
        {
            ajax.get('/professor/get').then(response =>
            {
                this.currentProfessor = null;
                this.professors = response.data.professors;
                console.log(this.professors);
            });
        },
        
        saveContract()
        {
            this.errors = [];
            if(!this.professor)
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
                formData.append('professor_id',this.professor);
                formData.append('date_debut',this.contract.date_debut);
                formData.append('date_fin',this.contract.date_fin);
                formData.append('type',this.contract.type);
                formData.append('MF',this.contract.MF);
                formData.append('RC',this.contract.RC);
              
                let url = this.url + '/api/contracts/save_contracts';
                this.axios.post(url,formData).then((response) => {
                    if(response.status)
                    {
                        
                      this.$utils.showSuccess('success', response.message);

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