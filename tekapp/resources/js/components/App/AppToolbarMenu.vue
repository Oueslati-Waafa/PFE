<template>
    <v-menu
            v-if="ready"
            bottom
            :min-width="200"
            :nudget-bottom="100"
    >
        <v-avatar slot="activator" size="35">
            <img
                    class="user-image"
                    :src="userImage"
            />
        </v-avatar>
        <v-list
                dense
        >
            <v-subheader style="font-weight: bold;">
                {{user | fullName}}
            </v-subheader>
            <v-list-tile>
                <v-list-tile-title>
                    {{$t('settings')}}
                </v-list-tile-title>
            </v-list-tile>
            <v-divider/>
            <v-list-tile @click="logout">
                <v-list-tile-title>
                    {{$t('logout')}}
                </v-list-tile-title>
            </v-list-tile>
        </v-list>
    </v-menu>
</template>

<script>
  export default {
    name: 'AdminAppToolbarMenu',
    props: [],
    data() {
      return {
        ready: false,
        user: null,
      }
    },
    mounted() {
      this.getUser()
    },
    methods: {
      getUser() {
        const user = this.$store.getters.user
        if (user) {
          this.ready = true
          this.user = user
        }
      },
      logout() {
        this.$store.dispatch('LOGOUT')
      },
    },
    computed: {
      userImage() {
        return this.user.image.url
      },
    },
  }
</script>

<style scoped lang="stylus">
    .user-image 
      border 2px solid #202add
     
</style>