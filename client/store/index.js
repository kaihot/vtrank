import Vuex from 'vuex'

const store = () => new Vuex.Store({
    state: {
        ranking:[],
        rankingMeta:[]
    },
    mutations: {
    },
    getters:{
    },
    actions: {
        GET_ONE_DAY_VIEW_RANKING({state, commit}, {page}){
            page = page || 1;
            console.log(`api/vt/one-day-ranking?page=${page}`);
            return this.$axios.$get(`api/vt/one-day-ranking?page=${page}`)
                .then((response) => {
                    console.log(response);
                    state.ranking = response.data
                    state.rankingMeta = response.meta
                }).catch((error) => {
                    console.log(error);
                    throw new Error("a");
                });
        },
        GET_ONE_DAY_SUBSCRIBE_RANKING({state, commit}, {page}){
            page = page || 1;
            console.log(`api/vt/one-day-ranking?page=${page}`);
            return this.$axios.$get(`api/vt/one-day-subscribe-ranking?page=${page}`)
                .then((response) => {
                    console.log(response);
                    state.ranking = response.data
                    state.rankingMeta = response.meta
                }).catch((error) => {
                    console.log(error);
                    throw new Error("a");
                });
        },

        GET_THREE_DAY_VIEW_RANKING({state, commit}, {page}){
            page = page || 1;
            console.log(`api/vt/three-day-ranking?page=${page}`);
            return this.$axios.$get(`api/vt/three-day-ranking?page=${page}`)
                .then((response) => {
                    console.log(response);
                    state.ranking = response.data
                    state.rankingMeta = response.meta
                }).catch((error) => {
                    console.log(error);

                    throw new Error("a");
                });
        },
        GET_THREE_DAY_SUBSCRIBE_RANKING({state, commit}, {page}){
            page = page || 1;
            return this.$axios.$get(`api/vt/three-day-subscribe-ranking?page=${page}`)
                .then((response) => {
                    console.log(response);
                    state.ranking = response.data
                    state.rankingMeta = response.meta
                }).catch((error) => {
                    console.log(error);

                    throw new Error("a");
                });
        },
        GET_SEVEN_DAY_VIEW_RANKING({state, commit}, {page}){
            page = page || 1;
            console.log(`api/vt/seven-day-ranking?page=${page}`);
            return this.$axios.$get(`api/vt/seven-day-ranking?page=${page}`)
                .then((response) => {
                    //console.log(response);
                    state.ranking = response.data
                    state.rankingMeta = response.meta
                }).catch((error) => {
                    throw new Error("a");
                });
        },

        GET_NEW_VIDEOS({state, commit}, {page}){
            page = page || 1;
            return this.$axios.$get(`api/vt/video/recent?page=${page}`)
                .then((response) => {
                    //console.log(response);
                    state.videos = response.data
                    state.videosMeta = response.meta
                }).catch((error) => {
                    throw new Error("a");
                });
        },
    }
});

export default store
