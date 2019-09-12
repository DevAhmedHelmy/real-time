require('./bootstrap');
 
import Vue from 'vue'
import vuetify from '../plugins/vuetify' // path to vuetify export



Vue.component('AppHome', require('../components/AppHome.vue')).default;
new Vue({
    el:'#app',
  vuetify,
})
