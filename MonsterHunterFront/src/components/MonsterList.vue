<template>
  <div>
    <div class="list-intro">Notre wikki possède actuellement {{ monstera.data.length }} monstres, {{
      unbielievable[Math.floor(Math.random() * unbielievable.length)]
    }} !</div>
    <div class="new" v-if="displayAdmin == true">Créer un nouveau monstre<span @click="goToForm()"> ➕</span></div>
    <div class="filter">

      <input type="checkbox" @change="filterAgro" checked v-model="isChecked" id="agro" />
      <label for="agro"> Monstres Agressifs</label>




    </div>
    <div class="list">

      <table class="styled-table">
        <thead>
          <tr>
            <th></th>
            <th style="cursor:pointer" @click="sortByName()">
              <font-awesome-icon v-if="this.orderBy == 'name' && this.byName" icon="fa-circle-arrow-down" />
              <font-awesome-icon v-if="this.orderBy == 'name' && !this.byName" icon="fa-circle-arrow-up" />
              Name
            </th>
            <th style="cursor:pointer" @click="sortByNickName()">
              <font-awesome-icon v-if="this.orderBy == 'nickName' && this.byNickname" icon="fa-circle-arrow-down" />
              <font-awesome-icon v-if="this.orderBy == 'nickName' && !this.byNickname" icon="fa-circle-arrow-up" />
              Nickname
            </th>
            <th style="cursor:pointer" @click="sortBySpecie()">
              <font-awesome-icon v-if="this.orderBy == 'specie' && this.bySpecie" icon="fa-circle-arrow-down" />
              <font-awesome-icon v-if="this.orderBy == 'specie' && !this.bySpecie" icon="fa-circle-arrow-up" />
              Espèce
            </th>
            <th colspan="2">Element</th>
            <th colspan="2">Faiblesse</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="monster in this.monsters" :key="monster.id" @click="goToMonster(monster.id)">
            <th>
              <img :src="getImgUrl(monster.name.toLowerCase())" />
            </th>
            <th>{{ monster.name }}</th>
            <th>{{ monster.nickname }}</th>
            <th>{{ monster.specie }}</th>
            <th>
              <img :src="require(`../assets/element/${monster.element.toLowerCase()}.png`)"
                v-if="monster.element != ''" />
            </th>
            <th>{{ monster.element }}</th>
            <th>
              <img :src="require(`../assets/element/${monster.weakagainst.toLowerCase()}.png`)"
                v-if="monster.weakagainst != ''" />
            </th>
            <th colspan="2">{{ monster.weakagainst }}</th>
            <th v-if="displayAdmin == true">
              <span @click.stop="deleteMonster(monster.id)">🚮</span> |
              <span @click.stop="goToEditForm(monster.id)">🖋</span>
            </th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "MonsterList",
  data: () => ({
    unbielievable: ["WOW", "FANTASTIQUE", "INCROYABLE", "IMPOSSIBLE", "EXTRAORDINAIRE", "IMPENSABLE"],
    monsters: {},
    monstera: {},
    orderBy: "name",
    byName: true,
    byNickname: false,
    bySpecie: false,
    isChecked: true,

  }),
  props: {
    displayAdmin: {
      type: Boolean,
      required: true
    }
  },
  methods: {
    filterAgro() {
      if (this.isChecked) {
        this.monsters = this.monstera.data;
      } else {

        this.monsters = this.monstera.data.filter((elem) => {
          return (elem.agro === 0)
        })

      }
    },
    getImgUrl(monsterName) {
      try {
        return require(`../assets/icone/${monsterName}.png`)
      } catch {

        return "http://triathlondegerardmer.com/wp-content/uploads/2019/02/no-image.jpg"
      }
    },
    sortByName() {
      this.orderBy = "name"
      this.byName ? this.byName = false : this.byName = true

      if (this.byName) {

        this.monsters.sort(function (a, b) {
          var textA = a.name.toUpperCase();
          var textB = b.name.toUpperCase();
          return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
        })
      } else {
        this.monsters.sort(function (b, a) {
          var textA = a.name.toUpperCase();
          var textB = b.name.toUpperCase();
          return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
        })
      }
    },
    sortByNickName() {
      this.orderBy = "nickName"
      this.byNickname ? this.byNickname = false : this.byNickname = true

      if (this.byNickname) {

        this.monsters.sort(function (a, b) {
          var textA = a.nickname.toUpperCase();
          var textB = b.nickname.toUpperCase();
          return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
        })
      } else {
        this.monsters.sort(function (b, a) {
          var textA = a.nickname.toUpperCase();
          var textB = b.nickname.toUpperCase();
          return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
        })
      }
    },
    sortBySpecie() {
      this.orderBy = "specie"
      this.bySpecie ? this.bySpecie = false : this.bySpecie = true

      if (this.bySpecie) {

        this.monsters.sort(function (a, b) {
          var textA = a.specie.toUpperCase();
          var textB = b.specie.toUpperCase();
          return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
        })
      } else {
        this.monsters.sort(function (b, a) {
          var textA = a.specie.toUpperCase();
          var textB = b.specie.toUpperCase();
          return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
        })
      }
    },

    goToMonster(monsterId) {
      this.$router.push({ name: 'detail', params: { monsterId } })
    },
    goToForm() {
      this.$router.push({ name: 'form' })
    },
    goToEditForm(monsterId) {
      this.$router.push({ name: 'formEdit', params: { monsterId } })
    },
    async deleteMonster(monster) {
      let header = { "Authorization": localStorage.getItem('token') };
      await axios.post("http://localhost:15000/delete.php", { id: monster }, { headers: header }) //FU alto router

      this.$router.go() //reload the page
    }
  },
  async created() {

    if (this.displayAdmin) {
      let header = { "Authorization": localStorage.getItem('token') };
      this.monstera = await axios.get("http://localhost:15000/monsters.php", { headers: header });
    } else {
      this.monstera = await axios.get("http://localhost:15000/monsters.php");
    }

    if (this.monstera.data != "") {
      this.monsters = this.monstera.data;
      console.log("admin page loaded");
    }
    else {
      this.$router.push({ name: "home" })
    }
  },
};
</script>

<style scoped>
img {
  width: 50px;
}

tbody tr {
  cursor: pointer;
}

.new {
  margin-top: 20px;
  color: black;
}

.new>span {
  cursor: pointer;

}

.list {
  display: flex;
  justify-content: center;
}

.styled-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  font-family: sans-serif;
  min-width: 800px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
  background-color: #009879;
  color: #fff;
}

.styled-table th,
.styled-table td {
  padding: 12px 15px;
}

.styled-table tbody tr {
  border-bottom: 1px solid #dddddd;
  color: black;
}

.styled-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.styled-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}

.list-intro {
  background-color: #006b56;
  padding: 20px 0;
}

.filter {
  text-align: right;
  color: black;
  padding:  10px 20px 0 0;

}
</style>