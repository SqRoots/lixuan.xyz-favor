<template>
  <v-container>
    <v-layout align-center column/>
      <v-flex xs12>
        <p>{{sectionData}}</p>
        <p v-for="data in sectionData">{{data}}</p>
        <p v-for="data in bodyData">{{data.name}}</p>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
const axios = require('axios');

export default {
  name: 'ContentBody',
  methods: {
    toChinese: function (router_name) {
      if (router_name.toLowerCase() === 'web') {
        return '网站';
      } else if (router_name.toLowerCase() === 'data') {
        return '数据';
      } else if (router_name.toLowerCase() === 'software') {
        return '软件';
      } else if (router_name.toLowerCase() === 'motto') {
        return '格言';
      } else if (router_name.toLowerCase() === 'about') {
        return '关于';
      }
      return '首页';
    },
  },
  data() {
    return {
      section: [1, 2, 3],
      routerName: this.$route.name,
      bodyData: [],
      sectionData: []
    };
  },
  methods: {
    getBodyData: function (xThis,routerName) {
      console.log(routerName);
      axios
      .get('https://lixuan.xyz/blog/x-c/get.php')
      .then(function(response) {
        xThis.bodyData = response.data;
        let li = new Set();
        response.data.forEach(x => li.add(x.category));
        xThis.sectionData = Array.from(li);
      })
      .catch(error => (console.log(error)));
    },
  },
  mounted: function () {
    this.getBodyData(this, this.$route.name);
  },
  props: ['x_title'],
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  h1 {
    text-align: center;
    font-size: 36px;
  }
</style>
