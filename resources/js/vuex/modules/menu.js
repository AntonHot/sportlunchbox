import constants from '../../constants.js'

export default {
    state: {
        rations: [],
        week: [],
    },
    getters: {
        rationsCurrentWeek(state) {
            return state.rations.filter(ration => state.week.includes(ration.date));
        },
    },
    mutations: {
        addRations(state, rations) {
            rations.forEach((ration) => {
                state.rations.push(ration);
            });
        },
        setWeek(state) {
            const keys = Object.keys(constants.WEEKDAYS_INDEX);
            state.week = keys.map(key => (getDayCurrentWeek(constants.WEEKDAYS_INDEX[key])));
        },
    },
    actions: {
        async getRations({commit, state}) {
            const params = {
                dateFrom: state.week[constants.WEEKDAYS_INDEX['monday']],
                dateTo: state.week[constants.WEEKDAYS_INDEX['friday']],
            };
            const response = await axios.post('/api/rations', params).catch(error => console.log(error));
            commit('addRations', response.data);
        },
    },
}

function getDayCurrentWeek(dayIndex, format = constants.DATE_FORMAT) {
    let date = new Date();
    let currentDay = date.getDay();
    let diff = date.getDate() - currentDay + (currentDay == 0 ? -6 : 1);
    date.setDate(diff + dayIndex);
    return window.moment(date).format(format);
}
