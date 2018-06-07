<template>
    <v-flex xs10 offset-xs1>
        <v-container grid-list-md text-xs-center>
            <v-layout row wrap align-baseline v-for="(item, index) in lists" :key="index">
                <v-flex xs1>
                    <v-list-tile-avatar color="rankBox" class="justify-center">
                        <div>
                            <span>{{index + 1}}</span>
                        </div>
                    </v-list-tile-avatar>
                </v-flex>
                <v-flex xs1>
                    <v-avatar
                            slot="activator"
                            size="50px"
                    >
                        <img :src="item.thumbnail_default">
                    </v-avatar>
                </v-flex>

                <v-flex xs3>
                    <div class="subheading">{{item.nickname}}</div>
                    <div class="title grey--text text--darken-1 caption">{{item.channel_title}}
                    </div>
                </v-flex>
                <v-flex xs3>
                    <v-card-title primary-title>
                        <v-list-tile-title>{{item.view_count}}view</v-list-tile-title>
                        <v-list-tile-sub-title class="teal--text caption">+ {{item.increase_count}}
                        </v-list-tile-sub-title>
                    </v-card-title>
                </v-flex>
                <v-flex xs4>
                    <v-list three-line>
                        <v-list-tile-content>
                            <v-list-tile-sub-title class="grey--text caption"
                                                   v-html="item.description"></v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list>
                </v-flex>
            </v-layout>
        </v-container>
        <div class="text-xs-center">
            <v-pagination :length="this.rankingMeta.last_page" v-model="rankingMeta.current_page" :total-visible="7" @input="handlePaginate"></v-pagination>
        </div>
    </v-flex>
</template>

<script>
    export default {
        name: "ranking-lists",
        props:["lists", "pageNum", "rankingMeta"],
        data(){
          return{
              page:this.pageNum,
          }
        },
        methods:{
            handlePaginate(page){
                console.log("ada");
                console.log(page);
                window.location.href = `/one-day-view-ranking?page=${page}`;
            }
        },
    }
</script>

<style scoped>

</style>