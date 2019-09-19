import VueRouter from 'vue-router';
window.Vue = require('vue');

Vue.use(VueRouter);

let routes = [
    // {
    //     path: '/',
    //     component: require('../components/AppHome.vue').default
    // },
    {
        path: '/login',
        component: require('../components/login/Login.vue').default
    },
    {
        path: '/signup',
        component: require('../components/login/Signup.vue').default
    },
    // {
    //     path: '/profile',
    //     component: require('./views/dashboard/Profile.vue').default
    // },
    // {
    //     path: '/developer',
    //     component: require('./views/dashboard/Developer.vue').default
    // },
]

export default new VueRouter({
    mode: 'history',
    routes
});