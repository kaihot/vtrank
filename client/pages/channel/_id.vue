<template>
    <v-content>
        <v-container grid-list-md>
            <v-layout row wrap>
                <v-flex md12 xs12 lg12>
                    <h1 class="display-1 white--text text-xs-center">
                        {{channel.channel_title}}
                    </h1>
                </v-flex>
                <v-flex xs12 md8 lg8>
                    <v-card v-if="channel_video.length > 0">
                        <div class="yy" style="">
                            <iframe width="100%" height="100%" :src="getAutoPlayiframe(channel_video[0].video_id)" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </v-card>
                </v-flex>
                <v-flex xs12 md4 lg4>
                    <v-card color="white darken-2">
                        <v-card-title primary-title>
                            <div class="headline display-1 text-xs-center">{{channel.channel_title}}<hr class="ma-3" size="1"></div>
                            <div>

                            </div>
                            <p>
                                <v-chip label color="pink" text-color="white">
                                    チャンネル登録者数 {{channel.view_count}} 人
                                </v-chip>


                                <v-chip label color="pink" text-color="white">
                                    総視聴回数 {{channel.subscriber_count}} 回
                                </v-chip>


                                <v-chip label color="pink" text-color="white">
                                    総投稿数 {{channel.video_count}} 本
                                </v-chip>
                            </p>
                        </v-card-title>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
        <v-container grid-list-md>
            <v-layout row wrap>
                <v-card color="white">
                    <!--<v-layout row wrap align-baseline>-->

                    <!--<v-flex md3 lg3  v-for="iaa in 30" :key="iaa">-->
                    <!--<v-card color="blue-grey darken-2" class="white&#45;&#45;text">-->
                    <!--<v-card-media src="https://i.ytimg.com/vi/MuFxkZMtv_M/hqdefault.jpg"></v-card-media>-->
                    <!--</v-card>-->
                    <!--</v-flex>-->

                    <!--</v-layout>-->
                    <v-container grid-list-md text-xs-center>
                        <v-layout row wrap>
                            <v-flex fill-height xs6 md4 lg4 v-for="(video, index) in channel_video" :key="index" @click="openModal(index)">
                                <v-card raised >
                                    <v-card-media
                                            class="white--text"
                                            height="160px"
                                            :src="video.thumbnail_high"
                                    >
                                    </v-card-media>
                                    <v-card-title>
                                        <div>
                                            <span>{{video.title}}</span><br>
                                            <p class="grey--text text-xs-right mb-0">{{video.youtuber.nickname}}</p>
                                        </div>
                                    </v-card-title>
                                </v-card>
                            </v-flex>
                        </v-layout>
                    </v-container>
                    <div class="text-xs-center">
                        <v-pagination :length="this.channelVideoMeta.last_page" v-model="channelVideoMeta.current_page"
                                      :total-visible="7" @input="handlePaginate"></v-pagination>
                    </div>
                </v-card>
            </v-layout>
        </v-container>
        <v-dialog v-model="dialog" max-width="800px" hide-overlay>
            <v-card color="grey lighten-2">
                <v-card-title>
                    <div class="title mb-2">{{this.modalContent.title}}</div>
                    <div class="yy" style="">
                        <iframe width="100%" height="100%" :src="getAutoPlayiframe(this.modalContent.video_id)" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </v-card-title>
                <v-card-text>
                    {{this.modalContent.description}}
                    <v-chip outline color="teal lighten-3" v-for="(tag, i) in this.modalContent.tags" :key="i">{{tag}}</v-chip>
                </v-card-text>
                <v-card-actions>
                    <v-btn color="primary" flat @click.native="dialog=false">Close</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
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
</style>
<script>
    import {mapState} from 'vuex'
    import Tabs from "../../components/tabs";

    export default {
        components: {Tabs},
        data() {
            return {
                dialog: false,
                modalContent:{
                    title:"",
                    video_id:"",
                    description:""
                }
            }
        },
        computed: {
            ...mapState([
                "channel",
                "channel_video",
                "channelVideoMeta"
            ])
        },
        methods:{
            openModal(index){
                this.modalContent = this.channel_video[index];
                this.dialog = true;
            },
            handlePaginate(page){
                console.log($nuxt.$route.path);
                console.log(page);
                window.location.href = `${$nuxt.$route.path}?page=${page}`;
            },
            getAutoPlayiframe(id){
                return `//www.youtube.com/embed/${id}?autoplay=1`
            }
        },
        async asyncData({query, store, params, error}) {

            console.log("aaaaaaaaaa");
            await store.dispatch("GET_CHANNEL", {id: params.id}).catch(() => {
                error({statusCode: 404, message: 'Post1 not found'});
            });

            console.log("wwwwwwwwww");
            await store.dispatch("GET_VIDEO_BY_ID",{page: query.page}).catch(() => {
                error({statusCode: 404, message: 'Post2 not found'});
            });

        }
    }
</script>

