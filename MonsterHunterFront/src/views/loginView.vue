<template>
    <div class="login">
        <div class="card card-container">
            <img id="profile-img" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" class="profile-img-card" />
            <form name="form" @submit.prevent="letsGo()">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input v-model="form.email" type="email" class="form-control" id="email" name="username" />

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password"  autocomplete="new-password" class="form-control" id="password" name="password" v-model="form.password" />

                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">
                        <span v-show="loading" class="spinner-border spinner-border-sm"></span>
                        <span>Login</span>
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
import axios from 'axios';

export default {
    name: 'LoginView',
    data: () => ({
        
            form: {
                email: '',
                password: ''
            },
            loading: false,
            message: ''
        
    }),
    created() {
        if (localStorage.getItem("token") != null) {
            this.$router.push({ name: "home" })
        }
    },
    methods: {
        async letsGo() {
            //Doit valider deux étapes

            if (this.validateEmail() && this.validatePassword()) {
                const test = await axios.post("http://dhqm1449.odns.fr/steve/MonsterHunterBack/public/signIn.php", this.form)

                if (test.data["username"] != undefined) {

                    localStorage.setItem("username", test.data["username"])
                    localStorage.setItem("token", test.data["token"])
                    localStorage.setItem("isAdmin", test.data["isAdmin"])
                    this.$router.go()
                }
            }
        }, validateEmail() {
            if (this.form.email != "") {
                console.log(this.form.email) //todo
            }
            return true;
        },
        validatePassword() {
            return true;
        }

    }
};
</script>
<style scoped>
label {
    display: block;
    margin-top: 10px;
}

.card-container.card {
    max-width: 350px !important;
    padding: 40px 40px;
}

.card {
    background-color: #f7f7f7;
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

.profile-img-card {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

.login {
    color: black;
}

button {
    margin-top: 10px;
}
</style>