<template>
  <div class="dashboard">
    <sidebar/>
    <div class="content">
      <router-view/>
    </div>
  </div>
</template>

<script>

import sidebar from '@/components/sidebar.vue';
export default {
    name: "Dashboard",
    components: { 
      sidebar,
    }
}
</script>

<style scoped>
.dashboard{
  display: grid;
  grid-template-columns: 1fr 6fr ;
  background-color: teal;
  height: 100vh;
  width: 100vw;
}
.content{
  background-color: white;
  border-radius: 10px;
  margin: 6px 6px 6px;
}
</style>