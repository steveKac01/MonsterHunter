<template>
    <div>
         <nav 
         :style="{ backgroundImage: `url(${require('/src/assets/img/banner.webp')})` }"
>
    
      <router-link to="/">Accueil </router-link> |
      <router-link to="/list"> Monstres </router-link> |
      <router-link to="/admin"> Admin</router-link>
    </nav>

    <div class="intro">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi architecto maiores sunt tenetur obcaecati odio! Cum, exercitationem, harum voluptas culpa accusamus fugiat, rerum modi repellat fuga veniam cumque similique iusto.
    </div>
    </div>

</template>




<script>

export default{
    name:"HeaderCompo"

}
</script>


<style scoped>

nav {
  padding: 100px 0 5px 0;
  background-size: cover;
display: flex;
justify-content: center;

}

nav a {
  font-weight: bold;
  color: #FFFFFF;
}

nav a.router-link-exact-active {
  color: #42b983;
}

.intro{
  background-color: #009879;  
padding:5% 2%;

}

</style>