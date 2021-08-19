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
    <router-view />
  </div>
</template>

<script>

export default {
  methods: {
    logout() {
      this.$store.dispatch('logout')
    }
  }
}
</script>

<style scoped>
nav {
  background-color: #26a69a;  
}

.btn { 
  -webkit-box-shadow: none;
  box-shadow: none;
  height: 4rem;
}
</style>