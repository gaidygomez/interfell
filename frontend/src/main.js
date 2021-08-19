import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import api from './axios/api'
import Swal from 'vue-sweetalert2'

import 'sweetalert2/dist/sweetalert2.min.css';

Vue.config.productionTip = false
Vue.prototype.$http = api

const token = localStorage.getItem('token')

if (token) {
  Vue.prototype.$http.defaults.headers.common['Authorization'] = `Bearer ${token}`
}

Vue.use(Swal)

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
