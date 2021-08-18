<template>
<div class="col s12 m6 offset-s3 offset-m3">
  <div class="card">
    <div class="card-content">
      <div class="center-align row">
        <h4>Sign Up</h4>
      </div>
      <div class="divider"></div>
      <form @submit.prevent="signup">
        <div class="row">
          <div class="input-field s12 col">
            <i class="material-icons prefix">person</i>
            <input v-model="user" type="text" id="user" class="validate">
            <label for="user">Username</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field s12 col">
            <i class="material-icons prefix">lock</i>
            <input v-model="password" type="password" id="password" class="validate">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field s12 col">
            <i class="material-icons prefix">content_copy</i>
            <input v-model="confirmation" type="password" id="password_confirmation" class="validate">
            <label for="password_confirmation">Password Confirmation</label>
          </div>
        </div>
        <div class="card-action action-btn">
          <div>
            <router-link to="/" class="waves-effect waves-light btn">
              <i class="material-icons left">arrow_back</i>
              Back
            </router-link>
          </div>
          <button class="btn waves-effect waves-light" type="submit" name="action">
            Signup
            <i class="material-icons right">create</i>
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
      password: '',
      confirmation: ''
    }
  },
  methods: {
    signup() {
      this.$http.get('/sanctum/csrf-cookie')
        .then(() => {
          this.$http.post('/api/register', {
            username: this.user,
            password: this.password,
            password_confirmation: this.confirmation
          })
          .then(() => {
            this.$router.push('/')
          }).catch((err) => {
            console.error(err.response)
          });
        }).catch((err) => {
          console.error(err)
        });
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