import Vue from 'vue'
import VueRouter from 'vue-router'
import Dishes from '../pages/Dishes.vue'
import Test from '../pages/Test.vue'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Dishes',
    component: Dishes
  },
  {
    path: '/dishes',
    name: 'Test',
    component: Test
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
