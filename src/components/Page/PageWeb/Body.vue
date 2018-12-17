<template>
  <v-container fluid grid-list-md>
    <v-layout row align-center xs12/>
      <!-- 生成子分类 开始 -->
      <v-flex v-for="data in filterSection(sectionData)" xs12>
        <!-- 子分类 标题 -->
        <v-toolbar light flat>
          <v-icon style="margin: 0;">ac_unit</v-icon>
          <v-toolbar-title><h2>{{data}}</h2></v-toolbar-title>
          <v-spacer></v-spacer>
          <v-btn icon>
            <v-icon>create</v-icon>
          </v-btn>
          <v-btn icon>
            <v-icon>add</v-icon>
          </v-btn>
          {{$route.query.category}}
        </v-toolbar>

        <!-- 子分类 内容 -->
        <x-body-section
          @deleteItem="showDeleteDialog"
          :login="!!login"
          :bodyData="getSectionData(bodyData, data)"
        />
      </v-flex>
    </v-layout>
    <!-- 生成子分类 结束 -->

    <!-- 删除对话框 -->
    <x-dialog-delete-item
      @turnoff="deleteDialog=false"
      :value="deleteDialog"
      :data="deleteDialogData"
    />
  </v-container>
</template>

<script>
import BodySection from './BodySection';
import DeleteItem from '@/components/PublicComponents/DeleteItem';

const axios = require('axios');

export default {
  name: 'Body',
  components: {
    'x-body-section': BodySection,
    'x-dialog-delete-item': DeleteItem,
  },
  data() {
    return {
      routerName: this.$route.name,
      routerQuery: this.$route.query,
      bodyData: [],         // 全部数据
      sectionData: [],      // 目录数据
      login: false,         // 是否登录
      deleteDialog: false,  // 删除对话框-显示隐藏
      deleteDialogData: {}  // 删除对话框-数据
    };
  },
  methods: {
    showDeleteDialog(data) {
      this.deleteDialogData=data;
      this.deleteDialog=true;
    },
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
    margin-bottom: 128px;
  }
</style>
