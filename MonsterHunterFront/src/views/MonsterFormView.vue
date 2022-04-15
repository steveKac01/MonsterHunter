<template>
  <div class="form">
    <form v-on:submit.prevent="sendMonster">
      <div v-if="this.monsterId != undefined">
        <label for="idmonster">ID: </label>
        <input type="text" name="idmonster" id="idmonster" v-model="form.id">
      </div>
      <div>
        <label for="name">Nom: </label>
        <input type="text" name="name" id="name" v-model="form.name">
        <span> *requis et unique</span>

      </div>
      <div>
        <label for="nickname">Nickname: </label>
        <input type="text" name="nickname" id="nickname" v-model="form.nickname">
        <span> *requis</span>

      </div>
      <div>
        <textarea name="description" id="description" v-model="form.description" cols="50" rows="8"></textarea>
      </div>
      <div>
        <label for="specie">Espèce: </label>
        <input type="text" name="specie" id="specie" v-model="form.specie">
        <span> *requis</span>
      </div>
      <div>
        <label for="element">Element: </label>
        <select v-model="form.element" name="element" id="element">
          <option disabled value="">Choisir element</option>
          <option>eau</option>
          <option>foudre</option>
          <option>dragon</option>
          <option>explosion</option>
          <option>feu</option>
          <option>glace</option>
          <option>sang</option>

        </select>

      </div>
      <div>
        <label for="weakness">Faiblesse: </label>
        <select v-model="form.weakagainst" id="weakness">
          <option disabled value="">Choisir faiblesse</option>
          <option>eau</option>
          <option>foudre</option>
          <option>dragon</option>
          <option>explosion</option>
          <option>feu</option>
          <option>glace</option>
          <option>sang</option>

        </select>

      </div>

      <div>
        <label for="lengthmin">Taille min: </label>

        <input type="text" name="lengthmin" id="lengthmin" v-model="form.lengthmin">
      </div>
      <div>
        <label for="lengthmax">Taille max: </label>

        <input type="text" name="lengthmax" id="lengthmax" v-model="form.lengthmax">
      </div>
      <div>
        <label for="generation">Generation: </label>

        <input type="text" name="generation" id="generation" v-model="form.generation">
        <span> *requis</span>
      </div>
      <div>
        <label for="agro">Agressif: </label>

        <input type="checkbox" name="agro" id="agro" v-model="form.agro">

      </div>
      <button v-if="this.monsterId == undefined">Créer</button>

      <button v-if="this.monsterId != undefined">Modifier</button>
    </form>
  </div>
</template>

<script>

import axios from "axios";

export default {
  name: "MonsterFormView",
components:{

},
data: () => ({
    monsterId: "",
    monster: {},
    form: {
      id: '',
      name: '',
      nickname: '',
      description: '',
      specie: '',
      lengthmax: '',
      lengthmin: '',
      generation: '',
      weakagainst: '',
      aggro: '',
      element: '',

    },

  }),
  methods: {


    async sendMonster() {
      if (this.monsterId != undefined) {
        let header = { "Authorization": localStorage.getItem('token') };
        await axios.put("http://dhqm1449.odns.fr/steve/MonsterHunterBack/public/edit.php", this.form, { headers: header }) //FU alto router

        this.$router.push({ name: 'detail', params: { id: this.monsterId } })
      } else {
        let header = { "Authorization": localStorage.getItem('token') };

        await axios.post("http://dhqm1449.odns.fr/steve/MonsterHunterBack/public/insert.php", this.form, { headers: header }) //FU alto router
        this.$router.push({ name: 'list' })
      }
    }
  },
 
  async created() {
    this.monsterId = this.$route.params.monsterId

    if (this.monsterId != undefined) {
      let monster = await axios.get(
        "http://localhost:15000/monster/" + this.monsterId

      );
      console.log(monster)

      this.monster = monster.data;
      this.form.id = this.monster.id;

      this.form.name = this.monster.name;
      this.form.nickname = this.monster.nickname;
      this.form.description = this.monster.description;
      this.form.specie = this.monster.specie;
      this.form.lengthmin = this.monster.lengthmin;
      this.form.lengthmax = this.monster.lengthmax;
      this.form.weakagainst = this.monster.weakagainst;
      this.form.generation = this.monster.generation;
      this.form.element = this.monster.element;

      if (this.monster.agro == 1) {
        this.form.agro = true
      } else {
        this.form.agro = false

      }








    } else {
      console.log("rien")
    }
  }
};

</script>

<style scoped>
form {
  color: black;
  padding: 2% 0;
}

div {
  margin-bottom: 10px;
}

span {
  color: red;
}
</style>