import Vue from 'vue'
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        rations: [],
    },
    mutations: {
        async addRations(state, dates) {
            const params = {
                'dateFrom': dates.dateFrom,
                'dateTo': dates.dateTo
            };
            const response = await axios.post('/api/rations', params).catch(error => console.log(error));
            response.data.forEach(function(item, i, arr) {
                state.rations.push(item);
            });
            var res = await axios.post('/api/rations', params).catch(error => console.log(error));
            res.data.forEach(function(item, i, arr) {
                state.rations.push(item);
            });
            // console.log(state.rations);
        },

    },
    actions: {
        hasRation(ration) {
            // console.log(ration);
        },
    }
})

export default store