<template>
    <v-tabs
            slot="extension"
            v-model="model"
            centered
            slider-color="indigo"
            @input="handleTab"
    ><v-tab nuxt replace exact :to="{name:'one-day-view-ranking'}">
            日間(再生数)
        </v-tab>
        <v-tab nuxt replace exact :to="{name:'three-day-view-ranking'}">
            3日間(再生数)
        </v-tab>
        <v-tab :href="`#tab-4`">
            日間(登録者数)
        </v-tab>
        <v-tab :href="`#tab-2`">
            今週(再生数)
        </v-tab>
        <v-tab :href="`#tab-5`">
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