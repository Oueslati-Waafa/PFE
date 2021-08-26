<template>
            <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">La liste des Sessions Universitaires</h2>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
        <th class="text-left">#</th>
        <th class="text-left">Titre de la session</th>
        <th class="text-left">Type</th>
        <th class="text-left">Date de début de session</th>
        <th class="text-left">Date de cloture de session</th>
        <th class="text-left">L'année Universitaire</th>
        <th class="text-left">Actions</th>
        </tr>
      </thead>
      <tbody v-for="session in sessions" :key="session.id">
        <tr>
         <td><p class="font-weight-medium">{{session.id}}</p></td>
         <td><p class="font-weight-medium">{{session.name}}</p></td>
         <td><p class="font-weight-medium">{{session.type }}</p></td>
         <td><p class="font-weight-medium">{{session.start_date}}</p></td>
         <td><p class="font-weight-medium">{{session.end_date}}</p></td>
         <td><p class="font-weight-medium">{{session.academic_year}}</p></td>
         <td><v-btn color="success" fab x-small dark :to="{ name:'/get_session',params:{id:session.id}}"><v-icon>mdi-pencil</v-icon></v-btn>
            <v-btn color="red" fab x-small dark @click.prevent="deleteSession(session.id)"><v-icon>mdi-delete</v-icon></v-btn>
         </td>
         
        </tr>
      </tbody>
    </template>
  </v-simple-table>
  <!--<pagination :data="sessions" @pagination-change-page="getResults"></pagination>-->
  


     <v-btn
      depressed
      color="success"
      to="/add_session"
    >
      <v-icon left>
        mdi-plus
      </v-icon>
      Ajouter
    </v-btn>

    </div>
</template>

<script>
export default {
    name:'sessions',
    
    created()
    {
        this.loadData();
    },
    methods:
    {
        loadData()
        {
          let url = this.url + '/api/session/get';
          axios.get(url).then(response => {
            this.sessions = response.data.sessions;
            console.log(this.sessions);
          }).catch(error => {
            console.log(error)
          });
      },

        
      deleteSession(id)
        {
            let url = this.url + `/api/session/delete_session/${id}`;
            this.axios.delete(url).then(response =>{
                if (response.status)
                {
                    this.$utils.showSuccess('success',response.message);
                    this.loadData();
                }
                else {
                    this.$utils.showError('Error', response.message);
                    }
            });
        }
        },
        mounted()
        {
            console.log('session component mounted ');
        },
      
        data() {
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                sessions:[],
                
            }
        },
}


</script>