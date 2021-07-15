<template>
    <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">La liste des Bilans</h2>

        <!--<table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Date de bilan</th>
                <th scope="col">Nom de professeur</th>
                <th scope="col">Cours</th>
                <th scope="col">Date Création</th>
                <th scope="col">Date modification</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody v-for="bilan_module in bilan_modules" :key="bilan_module.id">
                <tr>
                     <td scope="row">{{bilan_module.id}}</td>
                     <td scope="row">{{bilan_module.dateBM}}</td>
                     <td scope="row">{{bilan_module.professor_id }}</td>
                     <td scope="row">{{bilan_module.course_id}}</td>
                     <td scope="row">{{bilan_module.created_at}}</td>
                     <td scope="row">{{bilan_module.updated_at}}</td>
                     <td><button class="btn btn-danger btn-sm" @click.prevent="deleteBilan(bilan_module.id)">Supprimer</button></td>
                    <td><router-link :to="{ name:'/get_bilan',params:{id:bilan_module.id}}" class="btn btn-primary btn-sm">Modifier</router-link></td>
                </tr>
            </tbody>


        </table>-->
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
        <th class="text-left">#</th>
        <th class="text-left">Date de bilan</th>
        <th class="text-left">Nom de professeur</th>
        <th class="text-left">Cours</th>
        <th class="text-left">Actions</th>
        </tr>
      </thead>
      <tbody v-for="bilan_module in bilan_modules" :key="bilan_module.id">
        <tr>
         <td><p class="font-weight-medium">{{bilan_module.id}}</p></td>
         <td><p class="font-weight-medium">{{bilan_module.dateBM}}</p></td>
         <td><p class="font-weight-medium">{{bilan_module.professor_id }}</p></td>
         <td><p class="font-weight-medium">{{bilan_module.course_id}}</p></td>
         <td><v-icon small class="mr-2">mdi-pencil</v-icon>
         <v-icon small @click.prevent="deleteBilan(bilan_module.id)">mdi-delete</v-icon> </td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>

        <v-btn
              color="primary"
              dark
              class="mb-2"
              to="/add_bilan"
            >
              Ajouter
            </v-btn>
    </div>
</template>

<script>
export default {
    name:'bilan_modules',
    created()
    {
        this.loadData();
    },
    methods:
    {
        loadData()
        {
            let url = this.url + '/api/bilans/get';
            this.axios.get(url).then(response => {
                this.bilan_modules = response.data
                console.log(this.bilan_modules);
            });
        },
        
      deleteBilan(id)
        {
            let url = this.url + `/api/bilans/delete_bilan/${id}`;
            this.axios.delete(url).then(response =>{
                if (response.status)
                {
                    
                    this.loadData();
                }
                else {
                    console.log('error')
                    }
            });
        }
        },
        mounted()
        {
            console.log('Bilan component mounted ');
        },
        data() {
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                bilan_modules:[]
            }
        },
}


</script>