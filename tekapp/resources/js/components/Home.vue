<template>
    <div class="home">
        <v-toolbar class="mt-5" flat>
            <v-toolbar-title>
                <span class="caption">Dashboard></span>
            </v-toolbar-title>

        </v-toolbar>
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