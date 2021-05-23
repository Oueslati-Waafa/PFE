<template>
  <v-footer
    app
    class="app-footer"
  >
    <img
      class="tekup-logo"
      src="/images/system/logo-footer.png"
    >
    <span>
      @{{ adminName | fullName }}
    </span>
    <span>
      {{ currentAcademicYear }}
    </span>
    <v-spacer/>
    <span>
      {{ date }}
    </span>
    <connectivity-state/>
  </v-footer>
</template>

<script>
  import ConnectivityState from '../../Reusable/ConnectivityState'

  export default {
    name: 'AppFooter',
    components: {ConnectivityState},
    props: [],
    data() {
      return {}
    },
    computed: {
      date() {
        if (this._dateNow) {
          return this.$moment(this._dateNow).format('dddd Do MMMM YYYY, kk:mm:ss')
        }
        return ''
      },
      currentAcademicYear() {
        if (this.$store.getters.getSession)
          return this.$store.getters.getSession.name
      },
      adminName() {
        return this.$store.getters.user
      },
    },
    mounted() {
    },
    methods: {},
  }
</script>

<style scoped>
  .tekup-logo {
    height: 25px;
    padding-left: 8px;
  }

  .app-footer * {
    margin-left: 15px;
  }
</style>