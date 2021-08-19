<template>
    <div class="container">
        <div class="card">
            <div class="card-content">
                <div class="row center-align">
                    <h4>Edit</h4>
                </div>
                <div class="divider"></div>
                <form>
                    <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">person</i>
                        <input id="user" type="text" class="validate">
                        <label for="user">Username</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input id="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="card-action action-btn">
                    <div>
                        <button @click="$router.back()" class="waves-effect waves-light btn">
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
    mounted() {
        console.log(this.$router)
    },
    computed: {
        users() {
            return this.$store.getters.getUser(this.$router.params.id)
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