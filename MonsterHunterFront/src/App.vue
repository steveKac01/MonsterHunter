<template>
  <div id="app">
   <HeaderCompo/>

 
  <router-view/>


<FooterCompo/>
  </div>
</template>


<script>
import FooterCompo from "/src/components/FooterCompo.vue";
import HeaderCompo from "/src/components/HeaderCompo.vue";


export default{
components:{
  
    FooterCompo,HeaderCompo
}
}

</script>

<style>
body{
  background-color: #cccccc;
}
#app {
  
  background-color: white;
  margin:  2% 12%;
border: #009879 1px solid;
box-shadow: 5px 7px 15px -2px rgba(0,0,0,0.36);
color: white;
font-weight: bolder;
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;

}


</style>
