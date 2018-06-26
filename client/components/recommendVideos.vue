<template>
    <div>
        <div class="headline white--text">おすすめ動画<hr class="mb-1"></div>
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
        <v-flex xs12  v-for="(item, index) in this.recommendVideos" :key="index" @click="openModal(index)">
            <v-card color="blue-grey darken-2" class="white--text">
                <v-card-media :src=item.thumbnail_high height="160px"></v-card-media>
            </v-card>
        </v-flex>
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
    </div>
</template>

<script>
    import {mapState} from 'vuex'

    export default {
        name: "recommend-videos",
        data(){
          return {
              dialog: false,
              modalContent:{
                  title:"",
                  video_id:"",
                  description:""
              }
          }
        },
        methods:{
            openModal(index){
                console.log("cliucccccccdekc");
                this.modalContent = this.recommendVideos[index];
                this.dialog = true;
            },
            getAutoPlayiframe(id){
                return `//www.youtube.com/embed/${id}?autoplay=1`
            }
        },
        computed: {
            ...mapState([
                "recommendVideos"
            ])
        },
        mounted(){
            this.$store.dispatch("GET_RECOMMEND_VIDEOS").catch(() => {
                error({statusCode: 404, message: 'Posteeee not found'});
            });
        }
    }
</script>

<style scoped>
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