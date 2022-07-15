import { createRouter, createWebHistory } from "vue-router"

import Login from './pages/Login.vue';
import Register from './pages/Register.vue';
import ProductComponent from './components/ProductComponent.vue';

const routes = [
    {
        path : '/login',
        component : Login
    },
    {
        path : '/register',
        component : Register
    },
    {
        path : '/products',
        component : ProductComponent
    }
]

const router = createRouter({
    history : createWebHistory(),
    routes
})

export default router