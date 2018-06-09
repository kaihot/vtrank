<template>
    <v-tabs
            slot="extension"
            v-model="model"
            centered
            slider-color="indigo"
            @input="handleTab"
    >
        <v-tab :to="{name:'one-day-view-ranking'}">
            日間(再生数)
        </v-tab>
        <v-tab :to="{name:'three-day-view-ranking'}">
            3日間(再生数)
        </v-tab>
        <v-tab :to="{name:'one-day-subscribe-ranking'}">
            日間(登録者数)
        </v-tab>
        <v-tab :to="{name:'three-day-subscribe-ranking'}">
            3日間(登録者数)
        </v-tab>
        <v-tab :href="`#tab-2`" disabled>
            今週(再生数)
        </v-tab>
        <v-tab :href="`#tab-5`" disabled>
            今週(登録者数)
        </v-tab>
        <v-tab :href="`#tab-3`" disabled>
            今月(再生数)
        </v-tab>
        <v-tab :href="`#tab-6`" disabled>
            今月(登録者数)
        </v-tab>
    </v-tabs>
</template>

<script>
    export default {
        name: "tabs",
        props:["tab"],
        data(){
            return {
                model: this.tab
            }
        },
        methods:{
            handleTab(){
                console.log("aaaaaawdwdwdwd")
            }
        }
    }
</script>

<style scoped>

</style>