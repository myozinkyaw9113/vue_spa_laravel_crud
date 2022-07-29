require('./bootstrap');

import { createApp } from 'vue';
import App from './App.vue'
import router from './router.js'
import store from './store/store.js';
import i18n from './plugins/i18n.js';


const app = createApp(App)
app.use(i18n)
app.use(router)
app.use(store)
app.mount('#app')
export default app

