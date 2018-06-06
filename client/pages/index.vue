<template>
<div style="width: 100%;">
        <v-flex xs10 offset-xs1 md12 lg12>
        <v-breadcrumbs>
            <v-icon slot="divider">chevron_right</v-icon>
            <v-breadcrumbs-item
                    v-for="item in items"
                    :key="item.text"
                    :disabled="item.disabled"
            >
                {{ item.text }}
            </v-breadcrumbs-item>
        </v-breadcrumbs>
        </v-flex>

        <div class="newVideo pa-3" style="width: 100%;">
            <h2 class="display-1 pb-3">Recommend New Video</h2>
            <v-layout row wrap>
                <v-flex xs12 sm3 v-for="(item, index) in 4" :key="index" class="px-2">
                    <v-card>
                        <v-card-media
                                class="white--text"
                                height="100px"
                                src="https://i.ytimg.com/vi/X606uvPSDgA/hqdefault.jpg"
                        >
                            <v-container fill-height fluid>
                                <v-layout fill-height>
                                    <v-flex xs12 align-end flexbox>
                                        <span class="headline">Top 10 Australian beaches</span>
                                    </v-flex>
                                </v-layout>
                            </v-container>
                        </v-card-media>
                        <hr>
                        <v-card-title>
                            <div>
                                <span class="grey--text">キズナアイ</span><br>
                            </div>
                        </v-card-title>
                    </v-card>
                </v-flex>
            </v-layout>
        </div>

        <v-flex xs10 offset-xs1>
        <v-tabs
                slot="extension"
                v-model="model"
                centered
                slider-color="indigo"
        >
            <v-tab :href="`#tab-1`">
                今日
            </v-tab>
            <v-tab :href="`#tab-2`">
                今週
            </v-tab>
            <v-tab :href="`#tab-3`">
                今月
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

                <v-flex xs2>
                    <v-card-title primary-title>
                        <v-list-tile-title>{{item.nickname}}</v-list-tile-title>
                        <v-list-tile-sub-title class="grey--text caption">{{item.channel_title}}</v-list-tile-sub-title>
                    </v-card-title>
                </v-flex>
                <v-flex xs3>
                    <v-card-title primary-title>
                        <v-list-tile-title>{{item.view_count}}view</v-list-tile-title>
                        <v-list-tile-sub-title class="teal--text caption">+ {{item.increase_count}}</v-list-tile-sub-title>
                    </v-card-title>
                </v-flex>
                <v-flex xs4>
                    <v-list three-line>
                        <v-list-tile-content>
                            <v-list-tile-sub-title class="grey--text caption" v-html="item.description"></v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list>
                </v-flex>
            </v-layout>
        </v-container>




        <v-tabs-items v-model="model">
            <v-tab-item
                    v-for="i in 3"
                    :key="i"
                    :id="`tab-${i}`"
            >
                <v-list two-line>
                    <template v-for="(item, index) in items">
                        <v-list-tile :key="index" avatar>
                            <v-list-tile-avatar color="rankBox">
                                <div>
                                    <span>{{index+1}}</span>
                                </div>
                            </v-list-tile-avatar>
                            <v-list-tile-avatar>
                                <img :src="item.avatar">
                            </v-list-tile-avatar>
                            <v-list-tile-content>
                                <v-list-tile-title v-html="item.title"></v-list-tile-title>
                                <v-list-tile-sub-title v-html="item.subtitle"></v-list-tile-sub-title>
                            </v-list-tile-content>
                            <v-list-tile-content>
                                <v-list-tile-title v-html="item.fanCount"></v-list-tile-title>
                                <v-list-tile-sub-title v-html="item.increase"></v-list-tile-sub-title>
                            </v-list-tile-content>
                            <v-list-tile-content>
                                <v-list-tile-title v-html="item.increaseRate"></v-list-tile-title>
                            </v-list-tile-content>
                            <v-list-tile-content>
                                <v-list-tile-title v-html="item.totalView"></v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                    </template>
                </v-list>
            </v-tab-item>
        </v-tabs-items>
        </v-flex>
</div>
</template>

<style>
    .rankBox{
        background-color: #009688;
        border-radius: 5px !important;
        color: #fff;
    }
    .card__media__background{
        filter:blur(2px);
    }
    .newVideo{
        content: "";
        background-color: #ebedef;
        width: 100%;
        /*//color: #fff;*/
    }
</style>
<script>
    import { mapState } from 'vuex'

    export default {
        data() {
            return {
                drawer: null,
                text: "a",
                model: 'tab-2',
                items: [
                    { fanCount:"1,890,470人", increase:"+34234", increaseRate:"+5%", totalView:"122,225,939 回", text: "aaa", avatar: 'https://yt3.ggpht.com/-bzmyO7U7X7Q/AAAAAAAAAAI/AAAAAAAAAAA/CiCIkYBNVhE/s88-c-k-no-mo-rj-c0xffffff/photo.jpg', title: 'キズナアイ', subtitle: "A.I games" },
                    { fanCount:"1,890,470人", increase:"+34234", increaseRate:"+5%", totalView:"122,225,939 回", text: "bbb", avatar: 'https://yt3.ggpht.com/-bzmyO7U7X7Q/AAAAAAAAAAI/AAAAAAAAAAA/CiCIkYBNVhE/s88-c-k-no-mo-rj-c0xffffff/photo.jpg', title: 'キズナアイ(ゲーム)', subtitle: "A.I games" },
                    { fanCount:"1,890,470人", increase:"+34234", increaseRate:"+5%", totalView:"122,225,939 回", text: "aaccca", avatar: 'https://yt3.ggpht.com/-bzmyO7U7X7Q/AAAAAAAAAAI/AAAAAAAAAAA/CiCIkYBNVhE/s88-c-k-no-mo-rj-c0xffffff/photo.jpg', title: 'ときのそら', subtitle: "A.I games" },
                ]
            }
        },
        computed:{
            ...mapState([
                "oneDayRanking"
            ])
        },
        async asyncData({ store, params, error }){
            await store.dispatch("GET_ONE_DAY_RANKING",{id: params.id}).catch(()=>{
                error({ statusCode: 404, message: 'Post not found' });
            });
        }
    }
</script>

