import Vue from 'vue'
import Vuex from 'vuex'
import VuexPersistence from 'vuex-persist'
import api from '@/axios/api.js'
import router from '../router/index'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    token: localStorage.getItem('token') || '',
    auth: false,
    users: []
  },
  mutations: {
    login(state, payload) {
      state.auth = true

      state.token = payload.token
    },
    logout(state) {
      localStorage.clear()

      state.auth = false

      state.token = ''
    },
    users(state, { users }) {
      state.users = users
    }
  },
  actions: {
    login(context, payload) {
      api.get('/sanctum/csrf-cookie')
          .then(() => {
            api.post('/api/login', {
              username: payload.user,
              password: payload.password
            })
              .then(res => {
                  localStorage.setItem('token', res.data.access_token)

                  context.commit('login', { token: res.data.access_token })
                  
                  router.push('/home')
              })
              .catch(err => console.log(err))
          })
          .catch(err => console.error(err))
    },
    register() {
      api.get('/sanctum/csrf-cookie')
        .then(() => {
          api.post('/api/register', {
            username: this.user,
            password: this.password,
            password_confirmation: this.confirmation
          })
          .then(() => {
            router.push('/')
          }).catch((err) => {
            console.error(err.response)
          });
        }).catch((err) => {
          console.error(err)
        });
    },
    logout(context) {
      api.get('/sanctum/csrf-cookie')
        .then(() => {
          api.post('/api/logout', {}, {
            headers: {
              'Authorization': `Bearer ${context.state.token}`
            }
          })
            .then(() => {
              context.commit('logout')

              router.push('/')
            })
            .catch(err => console.error(err))
        })
        .catch(err => console.error(err))
    },
    users({commit}) {
      api.get('/api/users')
        .then(res => commit('users', { 
          users: res.data
        }))
        .catch(err => console.error(err))
    }
  },
  getters: {
    isAuth: state => {
      return state.auth
    },
    getUsers: state => {
      return state.users
    }
  },
  modules: {
  },
  plugins: [new VuexPersistence().plugin]
})
