<template>
  <div class="container">
<div class="next-previous-monster"><button @click="previousMonster()">Monstre précédent</button>
<button @click="nextMonster()" style="margin-left:10px">Monstre suivant</button>
</div>
    
    <div class="img-container">
      <img :src="getImgUrl(monster.name)" />
    </div>
    <div class="courses-container">
      <div class="course">
        <div class="course-preview"></div>
        <div class="course-info">
          <h2>{{ monster.name }} ({{ monster.nickname }})</h2>
          <h4>{{ monster.specie }}</h4>
          <h4 v-if="monster.element == null"><span>Element: </span>Physique</h4>
          <h4 v-if="monster.element != null"><span>Element: </span> {{ monster.element }}</h4>
          <h4><span>Faiblesse: </span> {{ monster.weakagainst }}</h4>
          <h4><span>Taille: </span> {{ monster.lengthmin }} - {{ monster.lengthmax }}</h4>
          <h4><span>Génération: </span>{{ monster.generation }}</h4>
          <h4 v-if="monster.agro == true" class="agressive">Agressif</h4>
          <h4 v-if="monster.agro != true" class="passive">Passif</h4>
          <p>{{ monster.description }}</p>
        </div>
        <button @click="goBackToListing()" style="margin-top:15px">Retour à la liste</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";


export default {
  name: "DetailView",
  data: () => ({
    monster: {},
  }),
  methods: {
async nextMonster()
{
let test = await axios.get(
      "http://localhost:15000/next/monster/" + this.monster.id
    );
    this.monster = test.data;

},
async previousMonster()
{
let test = await axios.get(
      "http://localhost:15000/previous/monster/" + this.monster.id
    );
    this.monster = test.data;
console.log(this.monster)
},


    goBackToListing() {
      this.$router.push({ name: "admin" })
    },
    getImgUrl(monsterName) {
      try {
        return require(`../assets/img/${monsterName}.png`)
      } catch {
        return "http://triathlondegerardmer.com/wp-content/uploads/2019/02/no-image.jpg"
      }
    }
  },
  async created() {
    let monster = await axios.get(
      "http://localhost:15000/monster/" + this.$route.params.monsterId
    );
    this.monster = monster.data;
  },
};
</script>

<style scoped>
.next-previous-monster{
  margin-bottom: 20px;
}
p {
  margin: 0 200px;
}
.agressive {
  color: red;
}
.passive {
  color: green;
}
.container{
  padding: 10px 0;
  color:black;
}
h6 {
  cursor: pointer;
  padding: 5px;
  color: white;
  background-color: black;
}
.img-container {
  display: flex;
  justify-content: center;

  width: 100%;
}

img {
  width: 50%;
}
.course-preview {
  width: 25%;
}
button{
  border: none;
  background-color: #009879;
  color: white;
padding: 8px 12px;
font-weight: bolder;
cursor: pointer;
}
span{
  color:#009879;
}

</style>