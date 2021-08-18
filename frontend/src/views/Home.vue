<template>
  <div class="about">
    <nav>
      <div class="nav-wrapper">
        <a href="#" class="brand-logo"></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li></li>
          <li></li>
          <li><a href="collapsible.html">Logout</a></li>
        </ul>
      </div>
    </nav>
    <hello-world />
  </div>
</template>

<script>
import HelloWorld from '../components/HelloWorld.vue'

export default {
  components: {
    HelloWorld
  }
}
</script>

<style scoped>
nav {
  background-color: #26a69a;  
}
</style>