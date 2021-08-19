<template>
  <div class="row">
    <table>
        <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Last Name</th>
              <th>DNI</th>
              <th>Age</th>
              <th>Profession</th>
              <th></th>
          </tr>
        </thead>
        <tbody>
            <tr v-for="(user, key) in users" :key="key">
              <td> {{ key + 1 }} </td>
              <td> {{ user.name || 'Empty' }} </td>
              <td> {{ user.last_name || 'Empty' }} </td>
              <td> {{ user.dni || 'Empty' }} </td>
              <td> {{ user.age || 'Empty' }} </td>
              <td> {{ user.profession || 'Empty' }} </td>
              <td>
                <div class="btn-table">
                  <button class="btn-floating btn-large waves-effect waves-light">
                    <i class="material-icons prefix">create</i>
                  </button>
                  <button @click="deleteUser(user.id)" class="btn-floating btn-large waves-effect waves-light red">
                    <i class="material-icons prefix">clear</i>
                  </button>
                </div>
              </td>
            </tr>
        </tbody>
      </table>
  </div>
</template>

<script>
export default {
  name: 'Index',
  created() {
    this.$store.dispatch('users')
  },
  methods: {
    deleteUser() {
      this.$swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
      })
      .then(res => {
        console.log(res)
      })
    }
  },
  computed: {
    users() {
      return this.$store.getters.getUsers
    }
  }
}
</script>

<style scoped>
.btn-table { 
  display: flex;
  justify-content: space-around;
}
</style>
