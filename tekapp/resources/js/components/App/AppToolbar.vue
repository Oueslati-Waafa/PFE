<template>
    <v-toolbar 
        v-if="$vuetify.breakpoint.smAndDown"    
        color="white" :clipped-left="$vuetify.breakpoint.smAndDown" dark app>
        <v-toolbar-side-icon @click.stop="toggleDrawer"></v-toolbar-side-icon>
        <div class="logo-text">
            <!-- <v-avatar
                size="25px"
                >
                <img src="/images/system/tekapp.png" alt="avatar">
            </v-avatar> -->
            <span class="title mx-2 mt-1">TEK APP</span>
        </div>
        <v-spacer/>
        <v-toolbar-items>
            <admin-app-toolbar-menu/>
        </v-toolbar-items>
    </v-toolbar>
</template>

<script>
    import Events from "../../../events/Events";
    import AdminAppToolbarMenu from './AdminAppToolbarMenu'
    
    export default {
        name: "admin-app-toolbar",
        components: {
            AdminAppToolbarMenu
        },
        props: [],
        data() {
            return {
                search: {
                    data: null,
                    el: null,
                    output: null,
                    val: null,
                },
            };
        },
        mounted() {},
        methods: {
    
            toggleDrawer() {
                window.EventBus.$emit(Events.TOGGLE_DRAWER);
            }
        },
        computed: {},
    };
</script>

<style scoped lang="stylus">
    .v-toolbar
        box-shadow -3px 7px 13px 0px rgba(126,123,123,0.14), 0px 4px 15px 0 rgba(225,225,225,0.3), 17px -13px 3px 0 rgba(255,255,255,0) !important
    
    .theme--dark.v-toolbar 
        color #202add

    .v-btn >>> .v-icon 
        color #202add

    .v-avatar img 
        border-radius 10%
        
    .logo-text
        display flex 
        align-items center

</style>