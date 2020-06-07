window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');
import router from './router'
import vuetify from './vuetify'

Vue.component('app', require('./App.vue').default);

const app = new Vue({
    router,
    vuetify,
    el: '#app',
});
