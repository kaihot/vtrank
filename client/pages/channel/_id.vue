<template>
    <v-content>
        <v-container grid-list-md>
            <v-layout row wrap>
                <v-flex md12 xs12 lg12>
                    <h1 class="display-1 white--text text-xs-center">
                        {{channel.channel_title}}
                    </h1>
                </v-flex>
                <v-flex xs8 md8 lg8>
                    <v-card>
                        <div class="yy" style="">
                            <iframe width="100%" height="100%" src="//www.youtube.com/embed/CcdBKdhLBpk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </v-card>
                </v-flex>
                <v-flex xs4 md4 lg4>
                    <v-card color="white darken-2">
                        <v-card-title primary-title>
                            <div class="headline display-1 text-xs-center">{{channel.channel_title}}<hr class="ma-3" size="1"></div>
                            <div>

                            </div>
                            <p>
                                <v-chip label color="pink" text-color="white">
                                    チャンネル登録者数 {{channel.view_count}} 人
                                </v-chip>
                            </p>
                            <p>
                                <v-chip label color="pink" text-color="white">
                                    総視聴回数 {{channel.subscriber_count}} 回
                                </v-chip>
                            </p>
                        </v-card-title>
                        <v-card-actions>
                            <v-btn flat dark>Listen now</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
    </v-content>
</template>

<style>
    .yy{
    width:100%;              /*横幅いっぱいにwidthを指定*/
    padding-bottom: 56.25%;  /*高さをpaddingで指定(16:9)*/
    height:0px;              /*高さはpaddingで指定するためheightは0に*/
    position: relative;
}
    .yy iframe {
        position: absolute;
        top: 0;
        right: 0;
        width: 100% !important;
        height: 100% !important;
    }
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
    import Tabs from "../../components/tabs";

    export default {
        components: {Tabs},
        data() {
            return {
                drawer: null,

                page:1,
            }
        },
        computed: {
            ...mapState([
                "channel",
                "channel_video"
            ])
        },
        methods:{
        },
        async asyncData({store, params, error}) {

            console.log("aaaaaaaaaa");
            await store.dispatch("GET_CHANNEL", {id: params.id}).catch(() => {
                error({statusCode: 404, message: 'Post1 not found'});
            });

            console.log("wwwwwwwwww");
            await store.dispatch("GET_VIDEO_BY_ID").catch(() => {
                error({statusCode: 404, message: 'Post2 not found'});
            });

        }
    }
</script>

