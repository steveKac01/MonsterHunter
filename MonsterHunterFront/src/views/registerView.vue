<template>
    <div class="register">
        <div class="card card-container">
            <img id="profile-img" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" class="profile-img-card" />
            <form name="form" @submit.prevent="submit()">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input v-model="form.username" type="text" autocomplete="username" class="form-control" name="name" id="name"/>

                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input v-model="form.email" autocomplete="email" type="email" class="form-control" name="email" id="email"/>

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" autocomplete="new-password" class="form-control" name="password" id="password" v-model="form.password" />

                </div>
                <div class="form-group">
                    <label for="password2">Confirm password</label>
                    <input type="password" autocomplete="new-password" class="form-control" name="password2" id="password2" v-model="form.password2" />

                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">
                        <span v-show="loading" class="spinner-border spinner-border-sm"></span>
                        <span>Register</span>
                    </button>
                </div>
                <div class="form-group">
                    <div v-if="message" class="alert alert-danger" role="alert">{{ message }}</div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios"

export default {
    name: "registerView",
    data: () => ({

        form: {
            username: "",
            email: "",
            password: "",
            password2:""
        },
         loading: false,
            message: ''

    })
    , methods: {

        async submit() {

            if(this.validateEmail() && this.validateName && this.validatePassword())
            {

             console.log("Ok submit")
             const test = await axios.post("http://dhqm1449.odns.fr/steve/MonsterHunterBack/public/signUp.php", this.form)
             //wait the server responses if the username is(no time for that !)
             //all good
             this.$router.push({name:"login"})
            console.log(test)
            }
        },
        validateName() {
            return true
        },
        validateEmail() {
            return true
        },
        validatePassword() {
            return true
        }

    }
}


</script>

<style scoped>
label {
    display: block;
    margin-top: 10px;
}
.register
{
    margin-top: 15px;
    color: black;
}
h1 {
    color: black;
}
button {
    margin: 10px 0;
}
</style>