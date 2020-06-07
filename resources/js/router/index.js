import Vue from 'vue'
import VueRouter from 'vue-router'
import Admin from '../pages/Admin.vue'
import Dishes from '../pages/Dishes.vue'

Vue.use(VueRouter)
    const routes = [
    {
        path: '/',
        name: 'Admin',
        component: Admin
    },
    {
        path: '/dishes',
        name: 'Dishes',
        component: Dishes
    },
    {
        path: '/users',
        name: 'Dishes',
        component: Dishes
    },
    {
        path: '/menu',
        name: 'Dishes',
        component: Dishes
    },
    {
        path: '/contacts',
        name: 'Dishes',
        component: Dishes
    },
    {
        path: '/orders',
        name: 'Dishes',
        component: Dishes
    },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
