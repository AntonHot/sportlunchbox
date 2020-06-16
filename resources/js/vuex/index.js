import Vue from 'vue'
import Vuex from 'vuex';
import menuModules from './modules/menu'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        menuModules
    }
})
