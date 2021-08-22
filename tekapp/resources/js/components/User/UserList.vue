<template>
            <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">La liste des Utilisateurs</h2>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
        <th class="text-left">#</th>
        <th class="text-left">Nom & Prénom</th>
        <th class="text-left">Email</th>
        <th class="text-left">Gender</th>
        <th class="text-left">CIN</th>
        <th class="text-left">Type</th>
        </tr>
      </thead>
      <tbody v-for="user in users.data" :key="user.id">
        <tr>
         <td><p class="font-weight-medium">{{user.id}}</p></td>
         <td><p class="font-weight-medium">{{user.fullname}}</p></td>
         <td><p class="font-weight-medium">{{user.email }}</p></td>
         <td><p class="font-weight-medium">{{user.gender}}</p></td>
         <td><p class="font-weight-medium">{{user.cin}}</p></td>
         <td><p class="font-weight-medium">{{user.type}}</p></td>
    
         
        </tr>
      </tbody>
    </template>
  </v-simple-table>
<pagination :data="users" @pagination-change-page="getResults"></pagination>
    </div>
</template>

<script>
export default {
    name:'users',
    
    created()
    {
        this.loadData();
    },
    methods:
    {
        loadData()
        {
            let url = this.url + '/api/user/get';
            this.axios.get(url).then(response => {
                this.users = response.data
            });
        },
        
      getResults(page = 1) {
			axios.get('http://localhost:8000/api/user/get?page=' + page)
				.then(response => {
					this.users = response.data;
				});
		},
        },
        mounted()
        {
            console.log('Prix component mounted ');
            // Fetch initial results
	         	this.getResults();
        },
      
        data() {
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                users:{},
                
            }
        },
}


</script>