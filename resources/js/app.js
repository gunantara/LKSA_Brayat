/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vuex from 'vuex'
import storeData from "./store/index"
import {
    Form,
    HasError,
    AlertError
} from 'vform';
import Gate from "./Gate";
import VueRouter from 'vue-router'
import {
    routes
} from './routes';
import moment from 'moment';
import VueProgressBar from 'vue-progressbar'
import swal from 'sweetalert2'
import datePicker from 'vue-bootstrap-datetimepicker';
import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';

//import TinyMCE from 'tinymce-vue-2'

//Use TinyMCE editor
//Vue.component('tiny-mce', TinyMCE);

window.Vue = require('vue');
//support vuex
Vue.use(Vuex)
const store = new Vuex.Store(
    storeData
)

//import VueResource from "vue-resource"
//Vue.use(VueResource);

//Laravel Vue Pagination
//Vue.component('pagination', require('laravel-vue-pagination'));

//Using VForm library
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.prototype.$gate = new Gate(window.user);

//importing vue Router globally for webroute
Vue.use(VueRouter)


//and used it 
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
})

//importing sweatalert notification
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
Vue.filter('Uptext', function (value) {
    if (!value) return ''
    value = value.toString()
    return value.charAt(0).toUpperCase() + value.slice(1)
})

//adding filter for timestamp
Vue.filter('myDate', function (date) {
    return moment(date).locale('id').format('LL');
});

//create custom even for http request
window.Fire = new Vue();

//bootstrap for datepicker
Vue.use(datePicker);


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

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);


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
