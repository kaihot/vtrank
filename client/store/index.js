import Vuex from 'vuex'

const store = () => new Vuex.Store({
    state: {
        oneDayRanking:[],
        rankingMeta:[]
    },
    mutations: {
    },
    getters:{
    },
    actions: {
        GET_ONE_DAY_VIEW_RANKING({state, commit}, {page}){
            console.log(`api/vt/one-day-ranking?page=${page}`);
            return this.$axios.$get(`api/vt/one-day-ranking?page=${page}`)
                .then((response) => {
                    //console.log(response);
                    state.oneDayRanking = response.data
                    state.rankingMeta = response.meta
                }).catch((error) => {
                    throw new Error("a");
                });
        },
    }
});

export default store
