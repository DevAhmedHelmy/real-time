require('./bootstrap');
 
import Vue from 'vue'
import vuetify from '../plugins/vuetify' // path to vuetify export
import router from './Router/routes';


Vue.component('AppHome', require('./components/AppHome').default);
new Vue({
    el:'#app',
  vuetify,
  router:router,
})
