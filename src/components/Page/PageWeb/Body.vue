<template>
  <v-container fluid grid-list-md>
    <v-layout row align-center xs12/>
      <v-flex v-for="data in filterSection(sectionData)" xs12>
        <v-toolbar light flat>
          <v-icon style="margin: 0;">ac_unit</v-icon>
          <v-toolbar-title><h2>{{data}}</h2></v-toolbar-title>
          <v-spacer></v-spacer>
          <v-btn icon>
            <v-icon>search</v-icon>
          </v-btn>
          <v-btn icon>
            <v-icon>apps</v-icon>
          </v-btn>
          <v-btn icon>
            <v-icon>refresh</v-icon>
          </v-btn>
          <v-btn icon>
            <v-icon>more_vert</v-icon>
          </v-btn>
          {{$route.query.category}}
        </v-toolbar>
        <x-body-section :login="!!login" :bodyData="getSectionData(bodyData, data)"/>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import BodySection from './BodySection';

const axios = require('axios');

export default {
  name: 'Body',
  components: {
    'x-body-section': BodySection,
  },
  data() {
    return {
      routerName: this.$route.name,
      routerQuery: this.$route.query,
      bodyData: [],       // 全部数据
      sectionData: [],    // 目录数据
      login: false,       // 是否登录
    };
  },
  methods: {
    toChinese(routerName) {
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
    getBodyData(xThis, routerName) {  // 获取数据
      const url = 'https://lixuan.xyz/blog/x-c/get.php?catalog=' + routerName;
      axios
      .get(url)
      .then((response) => {
        console.log(response.data.login);
        xThis.login = response.data.login;
        xThis.bodyData = response.data.data;
        const li = new Set();
        response.data.data.forEach(x => li.add(x.category));
        xThis.sectionData = Array.from(li);
      });
    },
    getSectionData(data, filterWord) { //返回不同子类别的名称
      const li = [];
      data.forEach((v) => {
        if (v.category === filterWord) {
          li.push(v);
        }
      });
      return li;
    },
    filterSection(data) {
      if (!this.$route.query.category) {
        return data;
      } else {
        return [this.$route.query.category];
      }
    }
  },
  mounted() {
    this.getBodyData(this, this.$route.name);
  },
  props: ['x_title'],
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  /* .flex{
    background: #ededed;
    border: 1px solid #e1e1e1;
  } */
  .v-toolbar{
    background: none;
    border-bottom: 1px solid #333;
  }
  h1 {
    text-align: center;
    font-size: 36px;
  }
  .flex {
    margin-top: 20px;
    margin-bottom: 200px;
  }
</style>
