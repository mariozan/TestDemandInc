/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';

// import VueRouter from 'vue-router';
window.Vue = require('vue').default;
import pagination from 'laravel-vue-pagination';

// Vue.use(pagination);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('pagination', pagination);
Vue.component('list-blogs-component', require('./components/ListBlogsComponent.vue').default);
Vue.component('create-blog-component', require('./components/CreateBlogComponent.vue').default);
Vue.component('create-answer-component', require('./components/CreateAnswerComponent.vue').default);
Vue.component('list-answers-component', require('./components/ListAnswersComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const routes = [
//     {
//         'path': '/', component:  require('./components/ExampleComponent.vue').default,
//         'path': '/new-blog', component:  require('./components/CreateBlogComponent.vue').default
//     }
// ]

// const router = new VueRouter({
//     routes: routes,
//     mode: "history"
// })

const app = new Vue({
    // router
}).$mount('#app')
