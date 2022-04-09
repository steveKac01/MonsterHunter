<template>
  <div class="footer">
   <footer>
  <div><img :src="require(`/src/assets/img/logo.webp`)"  alt=""></div>
  <div><router-link to="/list">Informations privées </router-link></div>
  <div><div><h4> Navigation</h4></div> 
  <div>    <router-link to="/">Accueil </router-link></div>
  <div>  <router-link to="/list"> Monstres </router-link></div>
  <div>   <router-link to="/admin"> Admin</router-link></div>
     
    

  </div>
   </footer>
  </div>
</template>

<script>
export default {
  name: 'FooterCompo'
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
footer{
padding: 10px 0;
display: grid;
grid-template-columns: repeat(3, 1fr);
grid-template-rows: 1fr;
grid-column-gap: 10px;
grid-row-gap: 0px;
background-color: #006B56;
  
}
footer div{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

footer img{
  width: 50%;
}

 a {
  font-weight: bold;
  color: #FFFFFF;
}

a.router-link-exact-active {
  color: #42b983;
}
h4{
  padding: 10px 20px;
background-color: #42b983;
color:white;

}
</style>
