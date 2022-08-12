// window.axios = require('axios');
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) {}
// require('./bootstrap');


import Vue from 'vue';
window.Vue = require('vue').default;


import VueRouter from 'vue-router';
Vue.use(VueRouter);

import vuetify from '../plugins/vuetify';

import routes from './router';

import Toasted from 'vue-toasted';
Vue.use(Toasted)


// Vue.component('navigation', require('./components/Navigation.vue').default);
Vue.component('header-page', require('./components/Header.vue').default);
Vue.component('sidebar-page', require('./components/Sidebar.vue').default);
Vue.component('content-page', require('./components/Content.vue').default);


const app = new Vue({
    el: '#app',
    vuetify,
    router: new VueRouter(routes),
});
