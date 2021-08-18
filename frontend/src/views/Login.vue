<template>
<div class="col s12 m6 offset-s3 offset-m3">
    <div class="card">
        <div class="card-content">
            <div class="row center-align">
                <h4>Login</h4>
            </div>
            <div class="divider"></div>
            <form @submit.prevent="login">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">person</i>
                        <input v-model="user" id="user" type="text" class="validate">
                        <label for="user">Username</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input v-model="password" id="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="card-action action-btn">
                    <div>
                        <router-link to="/signup" class="waves-effect waves-light btn">
                        <i class="material-icons left">
                            create
                        </i>
                        Signup
                        </router-link>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Login
                        <i class="material-icons right">vpn_key</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</template>

<script>
  export default {
    data() {
      return {
        user: '',
        password: ''
      }
    },
    methods: {
      login() {
        this.$http.get('/sanctum/csrf-cookie')
          .then(() => {
            this.$http.post('/api/login', {
              username: this.user,
              password: this.password
            })
              .then(res => {
                  this.$store.commit('login', { token: res.data.access_token })
                  
                  this.$router.push('/home')
              })
              .catch(err => console.log(err))
          })
          .catch(err => console.error(err))
      }
    }
  }

</script>

<style scoped>
  .action-btn {
    display: flex;
    justify-content: space-between;
  }
</style>