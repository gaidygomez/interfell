<template>
    <div class="container">
        <div class="card">
            <div class="card-content">
                <div class="row center-align">
                    <h4>Create</h4>
                </div>
                <div class="divider"></div>
                <form @submit.prevent="create">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input v-model="username" id="username" type="text" class="validate">
                        <label for="username">Username</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">badge</i>
                        <input v-model="name" id="user" type="text" class="validate">
                        <label for="user">Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">assignment_ind</i>
                        <input v-model="last_name" id="last_name" type="text" class="validate">
                        <label for="password">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">contact_mail</i>
                        <input v-model="dni" id="dni" type="text" class="validate">
                        <label for="dni">DNI</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">more_time</i>
                        <input v-model="age" id="age" type="text" class="validate">
                        <label for="age">Age</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">work</i>
                        <input v-model="profession" id="profession" type="text" class="validate">
                        <label for="profession">Profession</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input v-model="password" id="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">password</i>
                        <input v-model="password_confirmed" id="password_confirm" type="password" class="validate">
                        <label for="password_confirm">Password Confirm</label>
                    </div>
                </div>
                <div class="card-action action-btn">
                    <div>
                        <button type="button" @click="$router.push('/home')" class="waves-effect waves-light btn">
                            <i class="material-icons left">arrow_back</i>
                            Back
                        </button>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Create
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
    data() {
        return {
            username: '',
            name: '',
            last_name: '',
            dni: '',
            age: '',
            profession: '',
            password: null,
            password_confirmed: null
        }
    },
    methods: {
        create() {
            this.$http.post('/api/create', {
                username: this.username,
                name: this.name,
                last_name: this.last_name,
                dni: this.dni,
                age: this.age,
                profession: this.profession,
                password: this.password,
                password_confirmation: this.password_confirmed
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