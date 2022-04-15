<template>
  <div>
    <nav :style="{ backgroundImage: `url(${require('/src/assets/img/banner.webp')})` }">
      <div class="header-container">
        <div class="logo" @click="goToHome()"><img :src="require(`/src/assets/img/logo.webp`)" alt=""></div>
        <div>
          <h1>MONSTER HUNTER WIKKI</h1>
        </div>
        <div v-if="isConnected()" class="login" >
           <img id="profile-img" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" class="profile-img-card" />
         <h4>Bienvenue {{getName()}}</h4>
         <p class="log-out" @click="logOut()"> Se déconnecter</p>
          </div>
           <div v-else class="login">
        
          <div>
            <font-awesome-icon icon="fa-sign-in-alt" />
            <router-link to="/login"> Se connecter</router-link>
          </div>
          <div>
            <font-awesome-icon icon="fa-user-plus" />
            <router-link to="/register">Nouveau compte</router-link>
          </div>
        </div>
      </div>
      <div class="links">
        <router-link to="/">Accueil </router-link> |
        <router-link to="/admin"> Monstres </router-link>
       <!-- <router-link v-if="isAdmin()" to="/admin"> | Admin</router-link>-->
      </div>
    </nav>

    <div class="intro">
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis architecto magnam neque porro. Exercitationem,
      non aperiam nihil possimus magni velit odio sit quod culpa sint nulla nisi odit dignissimos atque fugiat unde
      ullam! Sunt sed veritatis nisi. Mollitia similique et enim neque recusandae, assumenda quo, sed dolorem id
      consectetur nostrum laboriosam ratione maiores. Unde architecto consequuntur hic debitis laboriosam labore
      temporibus error, ab ipsum, tempore quibusdam? Fugiat tenetur voluptates odio, nemo obcaecati sapiente commodi
      labore quia. Dicta esse, ipsa omnis, aliquid distinctio at placeat expedita, minus perspiciatis a tempore iure
      magnam ad similique est consectetur deleniti ex qui. Temporibus optio suscipit possimus sequi porro totam vel et
      quo mollitia iste, aliquid magni libero consequuntur incidunt minima qui blanditiis eveniet est.
    </div></div>

</template>




<script>


export default {
  name: "HeaderCompo",
  methods: {
    goToHome() {
      this.$router.push({ name: "home" })
    },logOut(){

       // localStorage.removeItem('connected')
        localStorage.removeItem('username')
        localStorage.removeItem('token')
        localStorage.removeItem('isAdmin')


        this.$router.go()
    },
    getName()
    {
      return localStorage.getItem('username').charAt(0).toUpperCase()+ localStorage.getItem('username').slice(1)
    },
    isConnected()
    {
     if(localStorage.getItem('username')!=null && localStorage.getItem('token')!=null)
     {       
       return true
     }else{
       return false
     }
    },
    isAdmin()
    {
  if(localStorage.getItem('isAdmin')==1)
     {
       return true 
     }else{
       return false
     }
    }
  }

}
</script>


<style scoped>
nav {
  background-size: cover;
}

.header-container {
  display: flex;
  justify-content: space-between;
  padding: 0 5%;
}

.links {
  text-align: center;
  background-color: rgba(0, 0, 0, 0.345);
  padding: 8px 0;
}

nav a {
  font-weight: bold;
  color: #FFFFFF;
}

nav a.router-link-exact-active {
  color: #42b983;
}

.intro {
  background-color: #009879;
  padding: 3% 2%;
  text-align: left;
}

.login {
  display: flex;
  flex-direction: column;
  justify-content: flex-end;

}

.login div {
  padding-bottom: 15px;
}

.logo {
  cursor: pointer;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding-top: 25px;
}
h4{
  margin:0;
}
h1 {
  padding: 5%;
  background-color: rgba(0, 0, 0, 0.486);
}
.log-out{
  cursor: pointer;
  text-decoration: underline;
  font-size: 0.8em;

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
</style>