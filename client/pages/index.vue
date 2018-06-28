<template>
    <v-content>
        <v-container grid-list-md>
            <v-layout row wrap>
                <v-flex sm12 xs12 md9 lg9>
                    <v-card color="white">
                        <v-layout row wrap>
                            <v-flex sm12 md12 lg12 v-for="(channel, index) in top" :key="index">
                                <v-card flat>
                                    <nuxt-link :to='{name:channel.nuxtLink}' style="text-decoration: none;">
                                        <h1>
                                            <div class="teal--text text-xs-center">
                                                <p> - {{index}}</p>
                                            </div>
                                        </h1>
                                        <v-card-media :src="channel.banner" height="200px"></v-card-media>
                                        <v-card-title primary-title>
                                            <v-layout row wrap align-baseline justify-space-between mb-2>
                                                <v-flex xs3 sm1 md2 lg1>
                                                    <v-avatar slot="activator" size="50px">
                                                        <img :src="channel.thumbnail_default">
                                                    </v-avatar>
                                                </v-flex>
                                                <v-flex xs6 sm3 md4 lg3>
                                                    <div class="subheading">{{channel.nickname}}</div>
                                                    <div class="title grey--text text--darken-1 caption">
                                                        {{channel.channel_title}}
                                                    </div>
                                                </v-flex>
                                                <v-flex xs6 sm3 md4 lg3>
                                                    <v-list-tile-title>{{channel.view_count}} view</v-list-tile-title>
                                                    <v-list-tile-sub-title class="teal--text caption"
                                                                           v-if="channel.item_identify==`view`">+
                                                        {{channel.increase_count}}
                                                    </v-list-tile-sub-title>
                                                </v-flex>
                                                <v-flex xs6 sm3 md4 lg3>
                                                    <v-list-tile-title>{{channel.subscriber_count}} subscribe
                                                    </v-list-tile-title>
                                                    <v-list-tile-sub-title class="teal--text caption"
                                                                           v-if="channel.item_identify==`subscribe`">+
                                                        {{channel.increase_count}}
                                                    </v-list-tile-sub-title>
                                                </v-flex>
                                            </v-layout>
                                        </v-card-title>
                                    </nuxt-link>

                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn flat color="orange" :to='{name:channel.nuxtLink}'
                                               style="text-decoration: none;">もっと見る
                                        </v-btn>
                                    </v-card-actions>
                                </v-card>
                            </v-flex>
                        </v-layout>
                    </v-card>

                </v-flex>
                <v-flex xs12 sm12 md3 lg3>
                    <recommend-videos/>
                </v-flex>
            </v-layout>
        </v-container>
    </v-content>
</template>

<style>
    .rankBox {
        background-color: #009688;
        border-radius: 5px !important;
        color: #fff;
    }

    .pagination__item--active{
        color: #fff !important;
    }
    .pagination__navigation{
        box-shadow: none !important;
    }
    .pagination__item{
        box-shadow: none !important;
    }

    .newVideo {
        content: "";
        background-color: #ebedef;
        width: 100%;
        /*//color: #fff;*/
    }
</style>
<script>
    import {mapState} from 'vuex'
    import Tabs from "../components/tabs";
    import RecommendVideos from "../components/recommendVideos";

    export default {
        head () {
            return {
                title: "バーチャルYoutuber人気ランキング一覧",
                meta: [
                    { hid: 'description', name: 'description', content: 'バーチャルYoutuberの最新の人気ランキングをお届けしています。' },
                ]
            }
        },
        components: {
            RecommendVideos,
            Tabs},
        data() {
            return {
                drawer: null,
            }
        },
        computed: {
            ...mapState([
                "top"
            ])
        },
        methods:{
            handlePaginate(page){
                console.log("ada");
                console.log(page);
            }
        },
        async asyncData({store, params, error}) {
            await store.dispatch("GET_TOP_CHANNEL", {page: 1}).catch(() => {
                error({statusCode: 404, message: 'Posteeee not found'});
            });
        }
    }
</script>

