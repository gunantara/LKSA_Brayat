
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
//support vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index"
const store = new Vuex.Store(
    storeData
)

//import VueResource from "vue-resource"
//Vue.use(VueResource);

//Laravel Vue Pagination
//Vue.component('pagination', require('laravel-vue-pagination'));

//Using VForm library
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//importing the Gate of User Access
import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);

//importing vue Router globally for webroute
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import { routes } from './routes';

//importing moment.js
import moment from 'moment';

//importing progress bar
import VueProgressBar from 'vue-progressbar'
//and used it 
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
})

//importing sweatalert notification
import swal from 'sweetalert2'
window.swal = swal;
//and used it
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.toast = toast;

//route any path in web with history in laravel
const router = new VueRouter({
    mode: 'history',
    routes
})

//adding filter for uppercase each word 
Vue.filter('Uptext', function (text) {
    return text.charAt(0).toUpperCase() + text.slice(1);
});

//adding filter for timestamp
Vue.filter('myDate', function (date) {
    return moment(date).format('MMMM Do YYYY');
});

//create custom even for http request
window.Fire = new Vue();



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    store,
});
