<template>
    <!--<v-flex>-->
    <v-container>
        <nuxt-link v-for="(item, index) in lists" :key="index" :to='{name:"channel-id",params:{id:item.channel_id}}'
                   style="text-decoration: none;">
            <v-layout row wrap align-baseline justify-center mb-2>
                <v-flex xs2 sm1 md1 lg1>
                    <v-list-tile-avatar color="rankBox" class="">
                        <div>
                            <span>{{index + 1}}</span>
                        </div>
                    </v-list-tile-avatar>
                </v-flex>
                <v-flex xs3 sm1 md2 lg1>
                    <v-avatar
                            slot="activator"
                            size="50px"
                    >
                        <img :src="item.thumbnail_default">
                    </v-avatar>
                </v-flex>

                <v-flex xs6 sm3 md4 lg3>
                    <div class="subheading">{{item.nickname}}</div>
                    <div class="title grey--text text--darken-1 caption">{{item.channel_title}}
                    </div>
                </v-flex>
                <v-flex xs6 sm3 md4 lg3>
                    <!--<v-card-title primary-title>-->
                    <!--<v-list-tile-title>{{item.view_count}}view</v-list-tile-title>-->
                    <!--<v-list-tile-sub-title class="teal&#45;&#45;text caption">+ {{item.increase_count}}</v-list-tile-sub-title>-->
                    <!--</v-card-title>-->
                    <v-list-tile-title>{{item.view_count}}view</v-list-tile-title>
                    <v-list-tile-sub-title class="teal--text caption">+ {{item.increase_count}}</v-list-tile-sub-title>
                </v-flex>
                <v-flex hidden-md-and-down lg4>
                    <v-list three-line>
                        <v-list-tile-content>
                            <v-list-tile-sub-title class="grey--text caption"
                                                   v-html="item.description"></v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list>
                </v-flex>
            </v-layout>
        </nuxt-link>
        <v-layout>
            <v-flex xs12 text-xs-center>
                <v-pagination :length="this.rankingMeta.last_page" v-model="rankingMeta.current_page" :total-visible="5"
                              @input="handlePaginate"></v-pagination>
            </v-flex>
        </v-layout>
    </v-container>
    <!--</v-flex>-->
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
                window.location.href = `${$nuxt.$route.path}?page=${page}`;
            }
        },
    }
</script>

<style scoped>

</style>