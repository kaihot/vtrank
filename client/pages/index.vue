<template>
    <div>
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
            <v-layout row wrap align-baseline>
                <v-flex xs1>
                    <v-list-tile-avatar color="rankBox" class="justify-center">
                        <div>
                            <span>1</span>
                        </div>
                    </v-list-tile-avatar>
                </v-flex>
                <v-flex xs1>
                    <v-avatar
                            slot="activator"
                            size="50px"
                    >
                        <img
                                src="https://yt3.ggpht.com/-bzmyO7U7X7Q/AAAAAAAAAAI/AAAAAAAAAAA/CiCIkYBNVhE/s88-c-k-no-mo-rj-c0xffffff/photo.jpg"
                        >
                    </v-avatar>
                </v-flex>

                <v-flex xs2>
                    <v-card-title primary-title>
                            <span>キズナアイ</span><br>
                            <span class="grey--text caption text-xs-right">A.I Games</span>
                    </v-card-title>
                </v-flex>
                <v-flex xs7>
                    <v-card dark color="primary">
                        <v-card-text class="px-0">12</v-card-text>
                    </v-card>
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
    </div>
</template>

<script>
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
        async asyncData({ store, params, error }){
            await store.dispatch("GET_ONE_DAY_RANKING",{id: params.id}).catch(()=>{
                error({ statusCode: 404, message: 'Post not found' });
            });
        }
    }
</script>

<style scoped>
    .rankBox{
        background-color: #009688;
        border-radius: 5px !important;
        color: #fff;
    }
</style>
