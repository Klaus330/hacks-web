/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

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
Vue.component('statistics', require('./components/StatisticsChart.vue').default);
Vue.component('my-line', require('./components/LineChart.vue').default);
Vue.component('views', require('./components/Views.vue').default);
Vue.component('dep-schedule', require('./components/DepartmentSchedule.vue').default);
Vue.component('login-form', require('./components/LoginForm.vue').default);
Vue.component('register-form', require('./components/RegisterForm.vue').default);
Vue.component('vue-loading-button', require('vue-loading-button').default);
Vue.component('select-form', require('./components/SelectForm.vue').default);
Vue.component('edit-form', require('./components/EditForm.vue').default);
Vue.component('edit-process-form', require('./components/EditProcessForm.vue').default);
Vue.component('edit-page', require('./components/EditPage.vue').default);
Vue.component('edit-process-page', require('./components/EditPage.vue').default);
Vue.component('autocomplete-search', require('./components/Autocomplete.vue').default);
Vue.component('processes-page', require('./components/ProcessesPage.vue').default);
Vue.component('tom-map', require('./components/Map.vue').default);
Vue.component('route-page', require('./components/RoutePage.vue').default);
Vue.component('reviews-container', require('./components/ReviewsContainer.vue').default);
Vue.component('institutions-page', require('./components/InstitutionsContainer.vue').default);
Vue.component('edit-institution-form', require('./components/EditInstitutionForm.vue').default);
Vue.component('edit-institution-page', require('./components/EditInstitutionPage.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
