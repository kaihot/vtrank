import Vue from 'vue'
import Vuetify from 'vuetify'
import colors from 'vuetify/es5/util/colors'

// You can also specify those components you are going to use for "a la carte" build:
// https://github.com/vuetifyjs/nuxt/blob/master/template/plugins/vuetify.js
// https://github.com/vuetifyjs/a-la-carte/blob/master/template/src/main.js

Vue.use(Vuetify, {
    theme: {
        primary: '#121212', // a color that is not in the material colors palette
        accent: '#121212',
        secondary: '#121212',
        info: '#121212',
        error: '#121212',
        success:'#121212',
    }
})