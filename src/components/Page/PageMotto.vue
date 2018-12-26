<template>
  <v-container>
    <v-layout align-center justify-space-around column fill-height/>
      <v-flex>
        <h1>格言</h1>
        <h3>我喜欢的一些句子</h3>
      </v-flex>

      <v-divider></v-divider>

      <v-flex  class="main-content">
        <h2>{{randomOneData.source}}</h2>
        <h4>{{randomOneData.author}}</h4>
        <br>
        <div class="subheading" v-html="randomOneData.content_html"></div>
      </v-flex>
      <v-flex xs12 class="fix-bottom">
        <v-icon color="#415458" @click="$_randomChoiceOneData()">fas fa-dice</v-icon>
        <br>
        <v-btn color="#415458" dark @click="$_randomChoiceOneData()">换一条</v-btn>
      </v-flex>

    </v-layout>
    <!-- 编辑分类 对话框 -->
    <x-dialog-edit-category
      @eHideDialog="valueEditCategoryDialog=false"
      @eSucceed="$_reflashCategory"
      :qShow="valueEditCategoryDialog"
      :dData="dataEditCategoryDialog"
    />
    <!-- 新建项目 对话框 -->
    <x-dialog-create-item
      @eHideDialog="valueCreateItemDialog=false"
      :qShow="valueCreateItemDialog"
      :dData="dataCreateDialog"
    />
  </v-container>
</template>

<script>
import DialogCreateItem from '@/components/PublicComponents/DialogCreateItem';
import DialogEditCategory from '@/components/PublicComponents/DialogEditCategory';

const axios = require('axios');

export default {
  name: 'PageMotto',
  components: {
    'x-dialog-create-item': DialogCreateItem,
    'x-dialog-edit-category': DialogEditCategory,
  },
  data() {
    return {
      routerName: this.$route.name,
      routerQuery: this.$route.query,
      bodyData: [],                      // 全部数据
      randomOneData: {},                 // 随机一条数据
      dataCategoryData: [],              // 目录数据
      login: false,                      // 是否登录
      valueCreateItemDialog: false,      // 新建对话框-显示隐藏
      dataCreateDialog: {},              // 新建对话框-数据
      valueEditCategoryDialog: false,    // 编辑类别对话框-显示隐藏
      dataEditCategoryDialog: {},        // 编辑类别对话框-数据
      queryResult: '',                   // 查询结果
    };
  },
  methods: {
    $_ShowCreateDialog(data) {
      this.valueCreateItemDialog = true;
      this.dataCreateDialog = { category: data };
    },
    $_reflashCategory() {
      return 1;
    },
    $_ShowEditCategoryDialog(data) {
      this.valueEditCategoryDialog = true;
      this.dataEditCategoryDialog = { category: data };
    },
    $_getBodyData(routerName) {                               // 从服务器获取数据
      const url = 'https://lixuan.xyz/blog/x-c/web-get.php';
      // const url = 'https://lixuan.xyz/blog/x-c/web-data.json';
      axios
      .get(url, { params: { catalog: routerName } })
      .then((response) => {
        this.login = response.data.login;                    // 是否登录
        this.bodyData = response.data.data;                  // 项目数据
        this.$_randomChoiceOneData();                             // 生成页面数据
        const li = new Set();
        response.data.data.forEach(x => li.add(x.category));
        this.dataCategoryData = Array.from(li);              // 项目类别数据
      });
    },
    $_randomChoiceOneData() {
      const dataLength = this.bodyData.length;
      const randomIndex = parseInt(Math.random() * dataLength, 10);
      this.randomOneData = this.bodyData[randomIndex];
    },
    $_filterSection(data) {                               // 根据URL中的参数过滤类别
      if (!this.$route.query.category) {
        return data;                                      // 返回所有类别
      }
      return [this.$route.query.category];                // 返回URL中的类别
    },
  },
  mounted() {                                             // 自成视图后自加载数据
    this.$_getBodyData(this.$route.name);
  },
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
  margin: 20px;
  text-align: center;
}
.flex.main-content {
  height: 280px;
}

</style>
