window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.moment = require('moment');

window.Vue = require('vue');
import router from './router'
import vuetify from './vuetify'
import store from './vuex'

Vue.component('app', require('./App.vue').default);

const app = new Vue({
    router,
    vuetify,
    store,
    el: '#app',
});