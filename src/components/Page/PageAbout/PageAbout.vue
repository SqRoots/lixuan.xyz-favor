<template>
  <v-container grid-list-xl text-xs-center>
    <v-layout align-center justify-center column fill-height>
      <v-flex>
        <h1>关于</h1>
        <h4>本主页简介</h4>
      </v-flex>

    </v-layout>
  </v-container>
</template>

<script>

export default {
  name: 'PageAbout',
  components: {
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  h1 {
    text-align: center;
  }
  .v-card.theme--light {
    border-radius: 10px;
  }
  .v-card__title {
    padding: 8px 16px;
  }
  a {
    color: #fff;
    text-decoration: none;
  }
</style>
