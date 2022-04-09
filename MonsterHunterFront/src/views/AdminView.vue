<template>
  <div class="admin">
    <MonsterList :displayAdmin="true"/>
  </div>
</template>

<script>

import MonsterList from "/src/components/MonsterList.vue";

export default {
  name: 'AdminView',
data:()=>({
isAdmin: true
}),
methods:{

},
components:{
      MonsterList,
  }
}
</script>

<style scoped>

</style>