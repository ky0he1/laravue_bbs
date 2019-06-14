import Vue from 'vue'
import VueRouter from 'vue-router'

import Top from './pages/Top'
import PostsDetail from './pages/PostsDetail'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Top',
    component: Top
  },
  {
    path: '/posts/:id',
    name: 'PostsDetail',
    component: PostsDetail
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router