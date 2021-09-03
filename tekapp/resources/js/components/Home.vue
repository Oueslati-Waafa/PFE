<template>
    <div class="home">
        <div class="container">
        
    <h2 class="text-center p-2 text-white bg-primary mt-5" style="margin-bottom: 1em;">Tableau de bord</h2>
    <v-alert
      border="top"
      colored-border
      type="info"
      elevation="2"
    >
<p class="font-weight-regular">Pour ajouter des semaines il faut d'abord ajouter une session puis des périodes et enfin des semaines. (session->periode->semaine)   </p> </v-alert>
    <v-row>
        <v-col cols="4">
<v-card
    class="mx-auto"
    max-width="344"
    color="light-blue lighten-5"
    outlined>
    <v-list-item three-line>
      <v-list-item-content>
        <v-list-item-title class="text-h5 mb-1">
          Les Sessions
        </v-list-item-title>
        <v-list-item-subtitle class="font-weight-regular">Vous pouvez afficher, modifier, supprimer des sessions</v-list-item-subtitle>
      </v-list-item-content>

    </v-list-item>

    <v-card-actions>
      <v-btn
        outlined
        rounded
        text
        color="primary"
        to="/session"
      >
        Visiter
      </v-btn>
    </v-card-actions>
  </v-card>
        </v-col>
        <v-col cols="4"><v-card
    class="mx-auto"
    max-width="344"
    color="light-blue lighten-5"
    outlined>
    <v-list-item three-line>
      <v-list-item-content>
        <v-list-item-title class="text-h5 mb-1">
          Les Périodes
        </v-list-item-title>
        <v-list-item-subtitle class="font-weight-regular">Vous pouvez afficher, modifier, supprimer des Périodes</v-list-item-subtitle>
      </v-list-item-content>

    </v-list-item>

    <v-card-actions>
      <v-btn
        outlined
        rounded
        text
        color="primary"
        to="/period"
      >
        Visiter
      </v-btn>
    </v-card-actions>
  </v-card></v-col>
          <v-col cols="4"><v-card
    class="mx-auto"
    max-width="344"
    color="light-blue lighten-5"
    outlined>
    <v-list-item three-line>
      <v-list-item-content>
        <v-list-item-title class="text-h5 mb-1">
          Les Semaines
        </v-list-item-title>
        <v-list-item-subtitle class="font-weight-regular">Vous pouvez afficher, modifier, supprimer des Semaines</v-list-item-subtitle>
      </v-list-item-content>

    </v-list-item>

    <v-card-actions>
      <v-btn
        outlined
        rounded
        text
        color="primary"
        to="/week"
      >
        Visiter
      </v-btn>
    </v-card-actions>
  </v-card></v-col>
    </v-row>

    <v-row>
        <v-col cols="4">
            <v-card
    class="mx-auto"
    max-width="344"
    color="light-blue lighten-5"
    outlined>
    <v-list-item three-line>
      <v-list-item-content>
        <v-list-item-title class="text-h5 mb-1">
          Les Professeurs
        </v-list-item-title>
        <v-list-item-subtitle class="font-weight-regular">Vous pouvez afficher, modifier, supprimer des Professuers</v-list-item-subtitle>
      </v-list-item-content>

    </v-list-item>

    <v-card-actions>
      <v-btn
        outlined
        rounded
        text
        color="primary"
        to="/professor"
      >
        Visiter
      </v-btn>
    </v-card-actions>
  </v-card>
        </v-col>
        <v-col cols="4">
            <v-card
    class="mx-auto"
    max-width="344"
    color="light-blue lighten-5"
    outlined>
    <v-list-item three-line>
      <v-list-item-content>
        <v-list-item-title class="text-h5 mb-1">
          Les Heures Supplémentaire
        </v-list-item-title>
        <v-list-item-subtitle class="font-weight-regular">Vous pouvez afficher, modifier, supprimer des heures supplimentaires pour les professeurs</v-list-item-subtitle>
      </v-list-item-content>

    </v-list-item>

    <v-card-actions>
      <v-btn
        outlined
        rounded
        text
        color="primary"
        to="/users"
      >
        Visiter
      </v-btn>
    </v-card-actions>
  </v-card>
        </v-col>
        <v-col cols="4">
            <v-card
    class="mx-auto"
    max-width="344"
    color="light-blue lighten-5"
    outlined>
    <v-list-item three-line>
      <v-list-item-content>
        <v-list-item-title class="text-h5 mb-1">
          Paiement
        </v-list-item-title>
        <v-list-item-subtitle class="font-weight-regular">Vous pouvez afficher, modifier, supprimer des Paiement</v-list-item-subtitle>
      </v-list-item-content>

    </v-list-item>

    <v-card-actions>
      <v-btn
        outlined
        rounded
        text
        color="primary"
        to="/paiement"
      >
        Visiter
      </v-btn>
    </v-card-actions>
  </v-card>
        </v-col>
    </v-row>
       
        </div>
    </div>
</template>

<script>
export default {
    name:'Home',
    data: () =>
    ({
        tab:null,
        text:'center',
        fill: true,
        padding:8,
        radius:10,
        value: [0,2,5,9,5,10,3,5,0,0,1,8,2,9,0],
        width:2,
        lineCap:'round',
        autoLineWidth:false,
        fills:false,

    })
}
</script>

<style scoped lang="sass">
.v-card.on-hover.theme--dark
background-color:rgba(#FFF,0.8)
>.v-card__text

</style>
<style scoped >
.border{
    border-right: 1px;
}
</style>