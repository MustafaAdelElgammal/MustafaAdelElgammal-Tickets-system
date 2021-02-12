require('./bootstrap');

import Myheader from './components/myheader.vue';
import Mysidebar from './components/mysidebar.vue';
import userslist from './components/users/List.vue';
// import router from './router';

window.Vue = require('vue');
import VueRouter from 'vue-router'

Vue.use(VueRouter);
// Vue.use(router);
import axios from 'axios';
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios)

const router = new VueRouter({
    mode: 'history',
    base: __dirname,
    routes: [
      { path: '/users/list', component: userslist },
    ]
  });

const app = new Vue({
    router,
    el: '#app',
    components:{
        Myheader,
        Mysidebar,
        userslist
    }
});

