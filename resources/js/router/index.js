import Vue from 'vue'
import VueRouter from 'vue-router'
import Dishes from '../pages/Dishes.vue'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
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
