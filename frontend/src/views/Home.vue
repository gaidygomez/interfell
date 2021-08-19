<template>
  <div class="about">
    <nav>
      <div class="nav-wrapper">
        <a href="#" class="brand-logo"></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li></li>
          <li></li>
          <li>
            <button @click="logout" class="btn waves-effect waves-light" title="Logout">
              <i class="material-icons prefix">
                logout
              </i>
              Logout
            </button>
          </li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <router-link to="/home/create" class="btn-floating btn-large waves-effect waves-light" title="create">
        <i class="material-icons">add</i>
      </router-link>
      <div class="input-field s4 col">
        <i class="material-icons prefix">search</i>
        <input v-model="profession" @keydown="search" type="text" id="profession" class="validate">
        <label for="profession">Profession</label>
      </div>
    </div>
    <div class="row">
      <div class="col s12">
        <form @submit.prevent="searchDni" class="input-field s4 col offset-s8">
            <i class="material-icons prefix">search</i>
            <input @blur="research" v-model="dni" type="text" id="dni" class="validate">
            <label for="dni">DNI</label>
        </form>
      </div>
    </div>
    <router-view />
  </div>
</template>

<script>

export default {
  data() {
    return {
      profession: '',
      dni: ''
    }
  },
  methods: {
    logout() {
      this.$store.dispatch('logout')
    },
    search() {
      this.$store.dispatch('search', { profession: this.profession })
    },
    searchDni() {
      this.$http.get('/api/dni', {
        params: {
          dni: this.dni
        }
      })
      .then((res) => {
        this.$store.commit('users', { users: res.data })
      }).catch((err) => {
        console.error(err)
      });
    },
    research() {
      this.$store.dispatch('users', { order: 'id', asc: 'asc' })
    }
  }
}
</script>

<style scoped>
nav {
  background-color: #26a69a;  
}

.row {
  margin-top: 1.5rem;
  display: flex;
}

.btn { 
  -webkit-box-shadow: none;
  box-shadow: none;
  height: 4rem;
}
</style>