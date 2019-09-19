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
        name:'login',
        component: require('../components/login/Login.vue').default
    },
    {
        path: '/logout',
        name:'logout',
        component: require('../components/login/Logout.vue').default
    },
    {
        path: '/signup',
        name:'signup',
        component: require('../components/login/Signup.vue').default
    },
    {
        path: '/forum',
        name:'forum',
        component: require('../components/forum/Forum.vue').default
    },
    // {
    //     path: '/developer',
    //     component: require('./views/dashboard/Developer.vue').default
    // },
]

export default new VueRouter({
    mode: 'history',
    routes
});