<template>
  <v-container>
    <v-layout align-center column/>
      <v-flex xs12>
        <h1>{{toChinese(routerName)}}</h1>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  name: 'Header',
  methods: {
    toChinese: function (routerName) {
      if (routerName.toLowerCase() === 'web') {
        return '网站';
      } else if (routerName.toLowerCase() === 'data') {
        return '数据';
      } else if (routerName.toLowerCase() === 'software') {
        return '软件';
      } else if (routerName.toLowerCase() === 'motto') {
        return '格言';
      } else if (routerName.toLowerCase() === 'about') {
        return '关于';
      }
      return '首页';
    },
  },
  data() {
    return {
      section: [1, 2, 3],
      routerName: this.$route.name,
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  h1 {
    text-align: center;
    font-size: 36px;
  }
</style>
