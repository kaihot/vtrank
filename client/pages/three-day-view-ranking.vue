 <template>
        <v-content>
            <v-container grid-list-md>
                <v-layout row wrap>
                    <v-flex md12 xs12 lg12>
                        <h1 class="title white--text">
                            3日間バーチャルyoutuber再生数ランキング
                        </h1>
                    </v-flex>
                    <v-flex xs12 sm12 md9 lg9>
                        <v-card color="white">
                            <tabs :tab="model"></tabs>
                            <ranking-lists :lists="ranking" :rankingMeta="rankingMeta"></ranking-lists>
                        </v-card>

                    </v-flex>
                    <v-flex xs12 sm12 md3 lg3>
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
                model: 'tab-1'
            }
        },
        head () {
            return {
                title: "バーチャルYoutuberの3日間閲覧数ランキング！",
                meta: [
                    { hid: 'description', name: 'description', content: 'バーチャルYoutuberのランキング一覧' },
                ]
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
             await store.dispatch("GET_THREE_DAY_VIEW_RANKING", {page: query.page}).catch(() => {
                error({statusCode: 404, message: 'Po3232323st not found'});
            });
        }
    }
</script>

<style scoped>

</style>