<template>
  <div class="row">
    <table>
        <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>
                Last Name
                <i @click="order('last_name')" class="material-icons prefix waves-effect">swap_vert</i>
              </th>
              <th>DNI</th>
              <th>
                Age
                <i @click="order('age')" class="material-icons prefix waves-effect">swap_vert</i>
              </th>
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
                  <button @click="edit(user.id)" class="btn-floating btn-large waves-effect waves-light">
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
  data() {
    return {
      asc: false
    }
  },
  created() {
    this.$store.dispatch('users', { order: 'id', asc: 'asc' })
  },
  methods: {
    deleteUser(id) {
      this.$swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
      })
      .then(res => {
        if (res.isConfirmed) {
          this.$store.dispatch('delete', { id })
        }
      })
    },
    edit(id) { 
      this.$router.push({ 
        name: 'edit', params: { 
          id
        }
      })
    },
    order(param) {
      this.asc = ! this.asc;

      this.$store.dispatch('users', { order: param, asc: this.asc ? 'asc' : 'desc' })
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
i:hover {
  color: #888888;
}

.btn-table { 
  display: flex;
  justify-content: space-around;
}
</style>
