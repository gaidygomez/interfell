import Vue from 'vue'
import store from '../store/index'
import VueRouter from 'vue-router'
import Signup from '../views/Signup.vue'
import Login from '../views/Login.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Login',
    component: Login
  },
  {
    path: '/signup',
    name: 'Signup',
    component: Signup
  },
  {
    path: '/home',
    name: 'Home',
    component: () => import('../views/Home.vue'),
    meta: {
      auth: true
    }
  },
  {
    path: '*',
    component: () => import('../views/NotFound.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach((to, from, next) => {
  if(to.matched.some(record => record.meta.auth)) {
    if (! store.getters.isAuth) {
      next({
        path: '/'
      })
    } else {
      next()
    }
  } else {
    next()
  }
})

export default router
