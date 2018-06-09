<template>
    <v-card flat primary>
        <v-toolbar flat extended dark>
            <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
            <v-toolbar-title class="white--text">バーチャルYoutuberランキングくん</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-sm-and-down">
                <v-btn flat nuxt replace exact :to="{name:'new-videos'}">
                    新着動画
                </v-btn>
                <v-btn flat nuxt replace exact :to="{name:'one-day-view-ranking'}">
                    ランキング
                </v-btn>
            </v-toolbar-items>
        </v-toolbar>
        <v-navigation-drawer app temporary absolute v-model="drawer"></v-navigation-drawer>
                    <nuxt></nuxt>
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
        font-family: 'Noto Sans Japanese', "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
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
        background: teal;
        content: '';
        height: 265px;
        width: 100%;
        position: absolute;
        left: 0;
        top: 0;
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
    @font-face {
        font-family: 'Noto Sans Japanese';
        font-style: normal;
        font-weight: 100;
        src: url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Thin.woff2) format('woff2'),
        url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Thin.woff) format('woff'),
        url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Thin.otf) format('opentype');
    }

    @font-face {
        font-family: 'Noto Sans Japanese';
        font-style: normal;
        font-weight: 200;
        src: url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Light.woff2) format('woff2'),
        url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Light.woff) format('woff'),
        url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Light.otf) format('opentype');
    }

    @font-face {
        font-family: 'Noto Sans Japanese';
        font-style: normal;
        font-weight: 300;
        src: url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-DemiLight.woff2) format('woff2'),
        url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-DemiLight.woff) format('woff'),
        url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-DemiLight.otf) format('opentype');
    }

    @font-face {
        font-family: 'Noto Sans Japanese';
        font-style: normal;
        font-weight: 400;
        src: local('NotoSansJP-Regular.otf'),
        url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Regular.woff2) format('woff2'),
        url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Regular.woff) format('woff'),
        url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Regular.otf) format('opentype');
    }

    @font-face {
        font-family: 'Noto Sans Japanese';
        font-style: normal;
        font-weight: 500;
        src: url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Medium.woff2) format('woff2'),
        url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Medium.woff) format('woff'),
        url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Medium.otf) format('opentype');
    }

    @font-face {
        font-family: 'Noto Sans Japanese';
        font-style: normal;
        font-weight: 700;
        src: url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Bold.woff2) format('woff2'),
        url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Bold.woff) format('woff'),
        url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Bold.otf) format('opentype');
    }

    @font-face {
        font-family: 'Noto Sans Japanese';
        font-style: normal;
        font-weight: 900;
        src: url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Black.woff2) format('woff2'),
        url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Black.woff) format('woff'),
        url(//fonts.gstatic.com/ea/notosansjapanese/v6/NotoSansJP-Black.otf) format('opentype');
    }
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
</style>
