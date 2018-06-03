<template>
    <v-card flat primary>
        <v-toolbar flat extended>
            <v-toolbar-side-icon @click.stop="drawer = !drawer" primary color="primary"></v-toolbar-side-icon>
            <v-toolbar-title>バーチャルYoutuberランキング</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-sm-and-down">
                <v-btn flat>今日</v-btn>
                <v-btn flat>今週</v-btn>
                <v-btn flat>今月</v-btn>
            </v-toolbar-items>
        </v-toolbar>
        <v-navigation-drawer app temporary absolute v-model="drawer"></v-navigation-drawer>
        <v-layout row pb-2 mx-2 style="background:#fff;">
            <v-flex xs10 offset-xs2>
                <nuxt></nuxt>
            </v-flex>
        </v-layout>


        <v-footer app></v-footer>
    </v-card>
</template>

<script>
    export default {
        data() {
            return {
                drawer: null,
                text: "a",
                model: 'tab-2',
            }
        }
    }
</script>
<style>
    .primary {
        background-color: #009688 !important;
        border-color: #009688 !important;
    }
    html {
        font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        font-size: 16px;
        word-spacing: 1px;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
        -moz-osx-font-smoothing: grayscale;
        -webkit-font-smoothing: antialiased;
        box-sizing: border-box;
    }

    body {
        background-color: #edecec;
    }

    body:before {
        background-image: url("https://i.ytimg.com/vi/QUd6LFDP9qE/maxresdefault.jpg");
        background-size: cover;
        content: '';
        height: 265px;
        width: 100%;
        position: absolute;
        left: 0;
        top: 0;
        filter: blur(5px);
    }

    *, *:before, *:after {
        box-sizing: border-box;
        margin: 0;
    }

    .button--green {
        display: inline-block;
        border-radius: 4px;
        border: 1px solid #3b8070;
        color: #3b8070;
        text-decoration: none;
        padding: 10px 30px;
    }

    .button--green:hover {
        color: #fff;
        background-color: #3b8070;
    }

    .button--grey {
        display: inline-block;
        border-radius: 4px;
        border: 1px solid #35495e;
        color: #35495e;
        text-decoration: none;
        padding: 10px 30px;
        margin-left: 15px;
    }

    .button--grey:hover {
        color: #fff;
        background-color: #35495e;
    }
</style>
