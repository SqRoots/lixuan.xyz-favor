<template>
<div class="navi-left-head">
  <v-avatar class="navi-left-head-avatar" :tile="false" :size="128" color="grey lighten-4">
    <img src="@/assets/logo.png" alt="avatar" class="mb-5">
  </v-avatar>
  <h1>偏爱</h1>

  <v-btn flat small color="primary" class="subheading" href="https://lixuan.xyz">
    <!-- <v-icon>home</v-icon> -->
    lixuan.xyz
  </v-btn>
  <br><br>
</div>
</template>

<script>
export default {
  name: 'NavigationHead',
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
* {
  text-transform: none !important;
}

div.navi-left-head {
  display: block;
  margin: 10px;
  padding: 0;
  border-bottom: 1px solid rgba(0,0,0,.12);
  text-align: center;
}

.navi-left-head-avatar {
  display: block;
  margin: 20px auto;
}
</style>
