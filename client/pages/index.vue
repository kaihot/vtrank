<template>
    <v-content>
        <v-container grid-list-md>
            <v-layout row wrap>
                <v-flex md12 xs12 lg12>
                    <!--<v-breadcrumbs class="white&#45;&#45;text pa-1">-->
                        <!--<v-icon slot="divider">chevron_right</v-icon>-->
                        <!--<v-breadcrumbs-item v-for="item in items" :key="item.text">-->
                            <!--{{ item.text }}-->
                        <!--</v-breadcrumbs-item>-->
                    <!--</v-breadcrumbs>-->
                    <h1 class="title white--text">
                        日間バーチャルyoutuber再生数ランキング
                    </h1>
                </v-flex>
                <v-flex xs9 md9 lg9>
                    <v-card color="white">
                        <v-flex xs10 offset-xs1>
                            <v-tabs
                                    slot="extension"
                                    v-model="model"
                                    centered
                                    slider-color="indigo"
                            >
                                <v-tab :href="`#tab-1`">
                                    日間(再生数)
                                </v-tab>
                                <v-tab :href="`#tab-2`">
                                    今週(再生数)
                                </v-tab>
                                <v-tab :href="`#tab-3`">
                                    今月(再生数)
                                </v-tab>
                                <v-tab :href="`#tab-4`">
                                    日間(登録者数)
                                </v-tab>
                                <v-tab :href="`#tab-5`">
                                    今週(登録者数)
                                </v-tab>
                                <v-tab :href="`#tab-6`">
                                    今月(登録者数)
                                </v-tab>
                            </v-tabs>
                            <v-container grid-list-md text-xs-center>
                                <v-layout row wrap align-baseline v-for="(item, index) in oneDayRanking" :key="index">
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

                        </v-flex>
                        <div class="text-xs-center">
                            <v-pagination :length="15" v-model="page" :total-visible="7" @input="handlePaginate"></v-pagination>
                        </div>

                    </v-card>

                </v-flex>
                <v-flex xs3 md3 lg3>
                    <v-flex xs12>
                        <div class="headline white--text">おすすめ動画<hr class="mb-1"></div>

                        <v-card color="blue-grey darken-2" class="white--text">
                            <v-card-media src="https://i.ytimg.com/vi/MuFxkZMtv_M/hqdefault.jpg" height="160px"></v-card-media>
                        </v-card>
                    </v-flex>
                    <v-flex xs12>
                        <v-card color="blue-grey darken-2" class="white--text">
                            <v-card-title primary-title>
                                <div class="headline">vTuberまとめました</div>
                                <div>要望などがあればこちらからお願いします。</div>
                            </v-card-title>
                            <v-card-actions>
                            </v-card-actions>
                        </v-card>
                    </v-flex>
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

    export default {
        data() {
            return {
                drawer: null,
                text: "a",
                model: 'tab-1',
                page:1,
                items:[{text:"視聴回数ランキング"},{text:"今日"}]
            }
        },
        computed: {
            ...mapState([
                "oneDayRanking"
            ])
        },
        methods:{
            handlePaginate(page){
                console.log("ada");
                console.log(page);
            }
        },
        async asyncData({store, params, error}) {
            await store.dispatch("GET_ONE_DAY_RANKING", {id: params.id}).catch(() => {
                error({statusCode: 404, message: 'Post not found'});
            });
        }
    }
</script>

