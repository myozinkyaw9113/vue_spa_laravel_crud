require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('loading-component', require('./components/LoadingComponent.vue').default);


const app = new Vue({
    el: '#app',
});
