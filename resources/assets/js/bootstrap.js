window.Vue = require('vue');
window._ = require('lodash');
import VueRouter from 'vue-router';
import Vuelidate from 'vuelidate';
import VueSimplemde from 'vue-simplemde'
import 'simplemde/dist/simplemde.min.css'
 
Vue.component('vue-simplemde', VueSimplemde)

Vue.use(Vuelidate);
Vue.use(VueRouter);

import User from './Helper/User';
window.User = User;
 window.EventBus = new Vue();
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
 

window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]');
axios.defaults.headers.common = {'Authorization': `bearer ${localStorage.getItem('token')}}`}
export default axios;

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
