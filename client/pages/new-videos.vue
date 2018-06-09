 <template>
        <v-content>
            <v-container grid-list-md>
                <v-layout row wrap>
                    <v-flex md12 xs12 lg12>
                        <h1 class="title white--text">
                            新着動画
                        </h1>
                        <hr size="1" class="ma-1 white--text">
                    </v-flex>
                    <v-flex xs9 md9 lg9>
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
                            <v-flex fill-height xs4 md4 lg4 v-for="(video, index) in videos" :key="index">
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
                    <v-flex xs3 md3 lg3>
                        <v-flex xs12>
                            <div class="headline white--text">おすすめ動画<hr class="mb-1" size="1"></div>

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
<script>
    import {mapState} from 'vuex'
    import Tabs from "../components/tabs";
    import RankingLists from "../components/rankingLists";

    export default {
        components: {
            RankingLists,
            Tabs
        },
        data() {
            return {
                model: 'tab-1'
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