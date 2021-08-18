import Vue from 'vue'
import Vuex from 'vuex'
import VuexPersistence from 'vuex-persist'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    token: localStorage.getItem('token') || '',
    auth: false
  },
  mutations: {
    login(state, payload) {
      localStorage.setItem('token', payload.token)

      state.auth = true
    }
  },
  actions: {
  },
  getters: {
    isAuth: state => {
      return state.auth
    }
  },
  modules: {
  },
  plugins: [new VuexPersistence().plugin]
})
