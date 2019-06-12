import Vue from 'vue'
import VueRouter from 'vue-router'

import Top from './pages/Top'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Top',
    component: Top
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router