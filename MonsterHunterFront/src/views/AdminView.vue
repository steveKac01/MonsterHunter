<template>
  <div class="admin">
    <MonsterList :displayAdmin="this.isAdmin"/>
  </div>
</template>

<script>

import MonsterList from "/src/components/MonsterList.vue";

export default {
  name: 'AdminView',
data:()=>({
isAdmin: false
}),
methods:{

},
components:{
      MonsterList,
  },
  created(){

localStorage.getItem('isAdmin')==1
  ? this.isAdmin=true
  : this.isAdmin=false;
  }
}
</script>

<style scoped>

</style>