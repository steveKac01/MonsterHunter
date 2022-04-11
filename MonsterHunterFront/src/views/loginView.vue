<template>
    <div class="login">
        <div class="card card-container">
            <img id="profile-img" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" class="profile-img-card" />
            <form name="form" @submit.prevent="letsGo()">
                <div class="form-group">
                    <label for="username">Email</label>
                    <input v-validate="'required|min:3|max:20'" v-model="form.email" type="email" class="form-control" name="username" />

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" v-model="form.password" />

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
        </div>  </div>
</template>
<script>
import axios from 'axios';

export default {
    name: 'LoginView',
    data() {
        return {
            form: {
                email: '',
                password: ''
            },
            loading: false,
            message: ''
        };
    },
    created() {
        if (localStorage.getItem("connected") != null) {
            this.$router.push({ name: "home" })
        }
    },
    methods: {
       async letsGo() {
            console.log("connect !")
          
          const test =await axios.post("http://localhost:15000/signIn.php",this.form)
console.log(test)
          if(test.data["username"]!=undefined){
          
          localStorage.setItem("connected", true)
           
            localStorage.setItem("username", test.data["username"])
            localStorage.setItem("token", test.data["token"])

            this.$router.go()
          }
        
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