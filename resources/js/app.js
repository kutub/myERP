/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('exampleComponent', require('./components/ExampleComponent.vue').default);
Vue.component('createOrder', require('./components/createOrder.vue').default);
Vue.component('credited', require('./components/Credited.vue').default);
Vue.component('CustomerBuying', require('./components/CustomerBuying.vue').default);
Vue.component('CustomerCredit', require('./components/CustomerCredit.vue').default);
Vue.component('Invoice', require('./components/Invoice.vue').default);
Vue.component('Memo', require('./components/memo.vue').default);
Vue.component('CustomerList', require('./components/customerList.vue').default);
Vue.component('manageStock', require('./components/ManageStock.vue').default);

Vue.component('companyProfile', require('./components/company/companyProfile.vue').default);
Vue.component('companyList', require('./components/company/companyList.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    methods: {
       
    }
});
