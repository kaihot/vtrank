import Vuex from 'vuex'

const store = () => new Vuex.Store({
    state: {
        oneDayRanking:[]
    },
    mutations: {
    },
    getters:{
    },
    actions: {
        GET_ONE_DAY_RANKING({state, commit}, {id}){
            return this.$axios.$get(`api/vt/one-day-ranking`)
                .then((response) => {
                    console.log(response);
                    state.oneDayRanking = response.data
                }).catch((error) => {
                    throw new Error("a");
                });
        },
    }
});

export default store
