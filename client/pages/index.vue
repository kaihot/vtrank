<template>
    <v-content>
        <v-container grid-list-md>
            <v-layout row wrap>
                <v-flex sm12 xs9 md9 lg9>
                    <v-card color="white">
                        <v-layout>
                                <v-flex md12 lg12>
                                    <v-card flat>
                                        <h1 id="introduction" class="headline grey--text text-xs-center">
                                            <div>
                                                <p>1day Ranking</p>
                                            </div>
                                        </h1>
                                        <v-card-media src="https://yt3.ggpht.com/2PpglZgu13Ls8Gj2ZSBFrKRRTDEx5dab_7BebNMQfxgY3Ur_sd-bGuod9yFthPU2dAREgqG1sA=w1060-fcrop64=1,00005a57ffffa5a8-nd-c0xffffffff-rj-k-no" height="200px">
                                        </v-card-media>
                                        <v-card-title primary-title>
                                            <div>
                                                <h3 class="headline mb-0">Kangaroo Valley Safari</h3>
                                                <div>Located two hours south of Sydney in the <br>Southern Highlands of New South Wales, ...</div>
                                            </div>
                                        </v-card-title>
                                        <v-card-actions>
                                            <v-btn flat color="orange">Share</v-btn>
                                            <v-btn flat color="orange">Explore</v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </v-flex>
                        </v-layout>
                    </v-card>

                </v-flex>
                <v-flex xs3 md3 lg3>
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
                title: this.title,
                meta: [
                    { hid: 'description', name: 'description', content: 'My custom description' }
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
                "ranking"
            ])
        },
        methods:{
            handlePaginate(page){
                console.log("ada");
                console.log(page);
            }
        },
        async asyncData({store, params, error}) {
            await store.dispatch("GET_RECOMMEND_VIDEOS", {page: 1}).catch(() => {
                error({statusCode: 404, message: 'Posteeee not found'});
            });
        }
    }
</script>

