 <template>
        <v-content>
            <v-dialog v-model="dialog" max-width="800px" scrollable hide-overlay>
                <v-card color="grey lighten-2">
                    <v-card-title>
                        <!--<div class="title mb-2">{{this.modalContent.title}}</div>-->
                        <div class="yy" style="">
                            <!--<iframe width="100%" height="100%" :src="getAutoPlayiframe(this.modalContent.video_id)" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>-->
                        </div>
                    </v-card-title>
                    <v-card-text>
                        aa
                        <!--{{this.modalContent.description}}-->
                        <!--<v-chip outline color="teal lighten-3" v-for="(tag, i) in this.modalContent.tags" :key="i">{{tag}}</v-chip>-->
                    </v-card-text>
                    <v-card-actions>
                        <v-btn color="primary" flat @click.stop="dialog=false">Close</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
            <v-container grid-list-md>
                <v-layout row wrap>
                    <v-flex sm12 md12 xs12 lg12>
                        <h1 class="title white--text">
                            新着動画
                        </h1>
                        <hr size="1" class="ma-1 white--text">
                    </v-flex>
                    <v-flex sm12 xs12 md9 lg9>
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
                            <v-flex fill-height xs6 sm6 md4 lg4 v-for="(video, index) in videos" :key="index" @click.stop="dialog=true">
                                <v-card raised>
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
                                <v-pagination :length="this.videosMeta.last_page" v-model="videosMeta.current_page" :total-visible="7" @input="handlePaginate"></v-pagination>
                            </div>
                        </v-card>
                </v-flex>
                    <v-flex sm12 xs12 md3 lg3>
                        <recommend-videos/>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-content>
    </template>
<script>
    import {mapState} from 'vuex'
    import Tabs from "../components/tabs";
    import RankingLists from "../components/rankingLists";
    import RecommendVideos from "../components/recommendVideos";

    export default {
        components: {
            RecommendVideos,
            RankingLists,
            Tabs
        },
        data() {
            return {
                model: 'tab-1',
                dialog:false
            }
        },
        head () {
            return {
                title: "バーチャルYoutuber最新動画一覧！",
                meta: [
                    { hid: 'description', name: 'description', content: 'バーチャルYoutuberの最新の動画をお届けしています。' },
                ]
            }
        },
        computed: {
            ...mapState([
                "videos",
                "videosMeta"
            ])
        },
        methods:{
            handlePaginate(page){
                console.log($nuxt.$route.path);
                console.log(page);
                window.location.href = `${$nuxt.$route.path}?page=${page}`;
            }
        },
        async asyncData({query, store, params, error}) {
            console.log(query);
             await store.dispatch("GET_NEW_VIDEOS", {page: query.page}).catch(() => {
                error({statusCode: 404, message: 'Posteeee not found'});
            });
        }
    }
</script>

<style scoped>

</style>