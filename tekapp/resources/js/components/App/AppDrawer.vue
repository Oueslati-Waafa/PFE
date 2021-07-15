
<template>

<v-navigation-drawer v-model="drawer" permanent color="#F4F5F9" app>
  <v-list-item class="px-2 py-5">
    <v-list-item-title class="text-capitalize" align="center">
      
        <v-img src="/images/logo.png"></v-img>
        
    </v-list-item-title>
  </v-list-item>
  <v-list nav dense>
    <v-list-item-group v-model="selectedItem" color="blue">
      <v-list-item v-for="(item,i) in items" :key="i" :to="item.route" route>
        <v-list-item-icon>
          <v-icon v-text="item.icon"></v-icon>
        </v-list-item-icon>
<v-list-item-content>
  <v-list-item-title v-text="item.text">

  </v-list-item-title>
</v-list-item-content>
      </v-list-item>
    </v-list-item-group>
  </v-list>
<template v-slot:append>
  <div class="pa-2"> 
    <h5 align="center">PFE 2020-2021</h5>
  </div >
</template>
</v-navigation-drawer>
 
</template>

<script>
export default {
  name: 'Navbar',
  data: () =>({
    selectedItem: 0,
    drawer : null ,
    items: [
      {icon: 'fas fa-home',text: 'Dashboard', route:'/'},
      {icon: 'fas fa-money-check-alt',text: 'Paiement', route:'/paiement'},
      {icon: 'fas fa-clock',text: 'Heures Supplimentaires', route:'/heures_supp'},
      {icon: 'fas fa-address-card',text: 'Les contrats', route:'/contracts'},
      {icon: 'fas fa-file',text: 'Les bilans', route:'/bilans'},
    ]
  })
}
</script>

<style>
div >>> .v-list a {
  text-decoration: none;
}
</style>



