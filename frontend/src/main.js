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

api.interceptors.request.use(
  config => {
      let accessToken = localStorage.getItem('token');
      if (accessToken) {
          config.headers = Object.assign({
              Authorization: `Bearer ${accessToken}`
          }, config.headers);
      }
      return config;
  },
  error => {
      return Promise.reject(error);
  }
);

api.interceptors.response.use(
  response => {
    if (response.status === 200 || response.status === 201 || response.status === 204) {
      return Promise.resolve(response);
    } else {
      return Promise.reject(response);
    }
})

Vue.use(Swal)

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
