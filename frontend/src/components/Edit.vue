<template>
    <div class="container">
        <div class="card">
            <div class="card-content">
                <div class="row center-align">
                    <h4>Edit</h4>
                </div>
                <div class="divider"></div>
                <form @submit.prevent="edit">
                    <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">badge</i>
                        <input v-model="user.name" id="user" type="text" class="validate">
                        <label for="user">Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">assignment_ind</i>
                        <input v-model="user.last_name" id="last_name" type="text" class="validate">
                        <label for="password">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">contact_mail</i>
                        <input v-model="user.dni" id="dni" type="text" class="validate">
                        <label for="dni">DNI</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">more_time</i>
                        <input v-model="user.age" id="age" type="text" class="validate">
                        <label for="age">Age</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">work</i>
                        <input v-model="user.profession" id="profession" type="text" class="validate">
                        <label for="profession">Profession</label>
                    </div>
                </div>
                <div class="card-action action-btn">
                    <div>
                        <button type="button" @click="$router.push('/home')" class="waves-effect waves-light btn">
                            <i class="material-icons left">arrow_back</i>
                            Back
                        </button>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Edit
                        <i class="material-icons right">drive_file_rename_outline</i>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        edit() {
            this.$http.patch('/api/edit', {
                id: this.user.id,
                name: this.user.name,
                last_name: this.user.last_name,
                dni: this.user.dni,
                age: this.user.age,
                profession: this.user.profession
            })
            .then(res => {
                this.$swal({
                    position: 'center',
                    icon: 'success',
                    title: res.data.success,
                    showConfirmButton: false,
                    timer: 1500
                })
            })
            .catch(err => console.error(err))
        }
    },
    computed: {
        user() {
            return this.$store.getters.getUser(this.$route.params.id)
        }
    }
}
</script>

<style scoped>
  .action-btn {
    display: flex;
    justify-content: space-between;
  }
  .container {
      width: 50%;
      margin-top: 2rem;
  }
</style>