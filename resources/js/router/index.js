import Vue from 'vue'
import VueRouter from 'vue-router'
import Admin from '../pages/Admin.vue'
import Menu from '../components/Menu.vue'

Vue.use(VueRouter)

const routes = [
    {
        path: '/admin',
        component: Admin,
        children: [
            {
                path: '',
                component: Menu
            }
        ]
    }
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router
