<template>
  <div class="list">
    <MonsterList :displayAdmin="false" />
  </div>
</template>

<script>

import MonsterList from "/src/components/MonsterList.vue";

export default {
  name: "ListView",
  data: () => ({
  isAdmin: false
  }),
  methods: {
  },
  components:{
      MonsterList,
  }
};

</script>

<style scoped>

</style>