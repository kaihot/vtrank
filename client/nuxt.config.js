require('dotenv').config();

module.exports = {
    /*
    ** Headers of the page
    */
    head: {
        title: 'client',
        meta: [
            {charset: 'utf-8'},
            {name: 'viewport', content: 'width=device-width, initial-scale=1'},
            {hid: 'description', name: 'description', content: 'Nuxt.js project'}
        ],
        link: [
            {rel: 'icon', type: 'image/x-icon', href: '/favicon.ico'}
        ]
    },
    /*
    ** Customize the progress bar color
    */
    loading: {color: '#3B8070'},
    /*
    ** Build configuration
    */
    modules: [
        '@nuxtjs/vuetify',
        "@nuxtjs/axios"
    ],
    plugins: [
        '~/plugins/vuetify'
    ],
    vuetify: {
        // Vuetify の設定はここに書く
        theme: {
            primary: '#3f51b5',
            secondary: '#b0bec5',
            accent: '#8c9eff',
            error: '#b71c1c'
        }
    },
    axios: {
        credentials: true,
        baseURL:process.env.FRONT_API_URL,
    },
    
    build: {
        /*
        ** Run ESLint on save
        */
        extend(config, {isDev, isClient}) {
            if (isDev && isClient) {
                config.module.rules.push({
                    enforce: 'pre',
                    test: /\.(js|vue)$/,
                    loader: 'eslint-loader',
                    exclude: /(node_modules)/
                })
            }
        }
    }
}
