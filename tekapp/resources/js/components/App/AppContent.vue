<template>
  <v-content app>
    <v-container
      fluid
      style="padding: 0"
    >
      <t-loading-dialog />
      <t-snackbar />
      <router-view v-if="ready" />
    </v-container>
  </v-content>
</template>

<script>
  import TLoadingDialog from '../../Reusable/TLoadingDialog'
  import TSnackbar from '../../Reusable/TSnackbar'

  export default {
    name: 'AdminAppContent',
    components: {TSnackbar, TLoadingDialog},
    props: [],
    data() {
      return {
        ready: false,
        dispatchers: [
          {
            dispatcherName: 'setDateNow',
            onLoadingText: 'date',
          },
          {
            dispatcherName: 'setCurrentSession',
            onLoadingText: 'current session',
          },
          {
            dispatcherName: 'SET_BRANCHES',
            onLoadingText: 'branches',
          },
          {
            dispatcherName: 'SET_PROFESSORS',
            onLoadingText: 'professors',
          },
          {
            dispatcherName: 'SET_MODULES',
            onLoadingText: 'modules',
          },
          {
            dispatcherName: 'SET_DEPARTMENTS',
            onLoadingText: 'departments',
          },
          {
            dispatcherName: 'SET_STUDENTS',
            onLoadingText: 'students',
          },
          {
            dispatcherName: 'setSessions',
            onLoadingText: 'sessions',
          },
          {
            dispatcherName: 'setDisponibilityPlans',
            onLoadingText: 'disponibility plans',
          },
          {
            dispatcherName: 'SET_CLASSES',
            onLoadingText: 'classes of this session',
          },
          {
            dispatcherName: 'SET_COURSES',
            onLoadingText: 'courses',
          },
          {
            dispatcherName: 'SET_ADMINS',
            onLoadingText: 'administrators',
          },
          {
            dispatcherName: 'SET_MATERIALS',
            onLoadingText: 'materials',
          },
          {
            dispatcherName: 'SET_CLASSROOMS',
            onLoadingText: 'classrooms',
          },
          {
            dispatcherName: 'setSettings',
            onLoadingText: 'settings',
          },
          {
            dispatcherName: 'setCycles',
            onLoadingText: 'cycles',
          },
          {
            dispatcherName: 'setCycleBranches',
            onLoadingText: 'cycles',
          },
          {
            dispatcherName: 'setDegrees',
            onLoadingText: 'degrees',
          },
        ],
      }
    },
    computed: {},
    mounted() {
      this.loadInitialData()
    },
    methods: {
      loadInitialData() {
        let promise = this.$store.dispatch(this.dispatchers[0].dispatcherName)
        for (let i = 1; i < this.dispatchers.length; i++) {
          let currentDispatcher = this.dispatchers[i]
          promise = promise
              .then(() => {
                this.$_loading_setMessage(currentDispatcher.onLoadingText)
                return this.$store.dispatch(currentDispatcher.dispatcherName)
              })
              .catch(() => {
                this.$_loading_close()
                this.$_toast_showErrorMsg(`Error occured when loading ${currentDispatcher.onLoadingText}`)
              })
        }
        promise.then(() => {
          this.onReady()
        })
      },
      onReady() {
        console.log('%cTEK APP READY FOR USE', 'color: blue')
        this.$_loading_close()
        this.ready = true
      },

    },
  }
</script>

<style>
    .session-absence-indicator {
        text-align: center;
        display: inline-block;
        padding: 8px;
        color: white;
    }
</style>