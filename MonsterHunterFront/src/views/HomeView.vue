<template>
  <div class="homea">

<div class="random-intro"><h2>LES MONSTRES DU JOUR</h2></div>
    <div class="random-container">

<div v-for="monster in monsters" :key="monster.id" @click="goToMonster(monster.id)"><figure><img :src="getImgUrl(monster.name)" alt=""><figcaption>{{monster.name}}</figcaption></figure></div>

</div>

</div>

</template>

<script>
import axios from "axios"

export default {
  name: 'HomeView',
data:()=>({
monsters:{

}
}),
methods:{
 getImgUrl(monsterName)
    {
      try{
return require(`../assets/icone/${monsterName}.png`)
      }catch{
        
return "http://triathlondegerardmer.com/wp-content/uploads/2019/02/no-image.jpg"

      
      }
    },
     goToMonster(monsterId){
        this.$router.push({name: 'detail' , params: {monsterId}})
    }
},
async created(){
const dataMonsters = await axios.get("http://localhost:15000/random");
    this.monsters = dataMonsters.data;
}
}
</script>

<style scoped>
.home{
margin: 0 15%;
border: #009879 1px solid;
color: white;
font-weight: bolder;

}
.random-intro{
  background-color: #006B56;
padding: 20px 0;
}
h2{
  margin: 0;
}
.random-container{
padding: 5% 2%;

background-color: white;
display: grid;
grid-template-columns: repeat(2, 1fr);
grid-template-rows: repeat(2, 1fr);
grid-column-gap: 50px;
grid-row-gap: 50px;

}
.random-container figure{
  
border: #000000 1px solid;
margin:0 100px;
color: black;
}
.random-container figure:hover{
border: #009879 1px solid;
cursor:pointer;
background-color: #009879;
color:white;
}


img{
  width: 60%;
}

</style>