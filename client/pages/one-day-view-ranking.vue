 <template>
        <v-content>
            <v-container grid-list-md>
                <v-layout row wrap>
                    <v-flex md12 xs12 lg12>
                        <h1 class="title white--text">
                            日間バーチャルyoutuber再生数ランキング
                        </h1>
                    </v-flex>
                    <v-flex xs9 md9 lg9>
                        <v-card color="white">
                            <tabs :tab="model"></tabs>
                            <ranking-lists :lists="ranking" :rankingMeta="rankingMeta"></ranking-lists>
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
                model: 'one-day-view-ranking'
            }
        },
        computed: {
            ...mapState([
                "ranking",
                "rankingMeta"
            ])
        },
        async asyncData({query, store, params, error}) {
            console.log(query);
             await store.dispatch("GET_ONE_DAY_VIEW_RANKING", {page: query.page}).catch(() => {
                error({statusCode: 404, message: 'Posteeee not found'});
            });
        }
    }
</script>

<style scoped>

</style>