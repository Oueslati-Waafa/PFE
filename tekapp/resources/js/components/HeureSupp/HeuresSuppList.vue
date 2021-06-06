<template>
    <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">La liste des Heures supplimentaires</h2>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nbr. heures Jury</th>
                <th scope="col">Nbr. heures d'encadrement</th>
                <th scope="col">Nbr. heures Conseil de classe</th>
                <th scope="col">Numéro de semestre </th>
                <th scope="col">Date Création</th>
                <th scope="col">Date modification</th>
                <th scope="col">ID Professeur</th>
                <th scope="col">Nbr. heures de surveillance</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody v-for="h_supplemetaire in h_supplemetaires" :key="h_supplemetaire.id">
                <tr>
                     <td scope="row">{{h_supplemetaire.id}}</td>
                     <td scope="row">{{h_supplemetaire.h_jury}}</td>
                     <td scope="row">{{h_supplemetaire.h_encadrement}}</td>
                     <td scope="row">{{h_supplemetaire.h_conseil}}</td>
                     <td scope="row">{{h_supplemetaire.semester}}</td>
                     <td scope="row">{{h_supplemetaire.created_at}}</td>
                     <td scope="row">{{h_supplemetaire.updated_at}}</td>
                     <td scope="row">{{h_supplemetaire.professor_id}}</td>
                     <td scope="row">{{h_supplemetaire.h_surveillance}}</td>
                     <td><button class="btn btn-danger btn-sm" @click.prevent="deleteHeures(h_supplemetaire.id)">Supprimer</button></td>
                    <td><router-link :to="{ name:'/get_heures_supp',params:{id:h_supplemetaire.id}}" class="btn btn-primary btn-sm">Modifier</router-link></td>
                </tr>
            </tbody>


        </table>
        <router-link to="/add_heures_supp"> <button class="btn btn-success btn-sm" >Ajouter</button></router-link>
    </div>
</template>

<script>
export default {
    name:'h_supplemetaires',
    created()
    {
        this.loadData();
    },
    methods:
    {
        loadData()
        {
            let url = this.url + '/api/heures_supp/get';
            this.axios.get(url).then(response => {
                this.h_supplemetaires = response.data
                console.log(this.h_supplemetaires);
            });
        },
        
      deleteHeures(id)
        {
            let url = this.url + `/api/heures_supp/delete_heure_sup/${id}`;
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
            console.log('Heure list component mounted ');
        },
        data() {
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                h_supplemetaires:[]
            }
        },
}


</script>