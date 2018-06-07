<template>
    <v-tabs
            slot="extension"
            v-model="model"
            centered
            slider-color="indigo"
    >
        <v-tab :href="`#tab-1`">
            日間(再生数)
        </v-tab>
        <v-tab :href="`#tab-2`">
            今週(再生数)
        </v-tab>
        <v-tab :href="`#tab-3`">
            今月(再生数)
        </v-tab>
        <v-tab :href="`#tab-4`">
            日間(登録者数)
        </v-tab>
        <v-tab :href="`#tab-5`">
            今週(登録者数)
        </v-tab>
        <v-tab :href="`#tab-6`">
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
        }
    }
</script>

<style scoped>

</style>