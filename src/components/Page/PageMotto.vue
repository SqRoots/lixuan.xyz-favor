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
        <!-- 加载进度 -->
        <v-progress-circular
          v-if="bodyData.length===0"
          :size="70"
          :width="7"
          color="grey"
          indeterminate
        />
      </v-flex>

      <v-flex xs12 class="fix-bottom">
        <v-icon color="#415458" @click="$_randomChoiceOneData()">fas fa-dice</v-icon>
        <br>
        <v-btn color="#415458" dark @click="$_randomChoiceOneData()">换一条</v-btn>
        <br>

        <v-icon @click="$_ShowDeleteDialog(randomOneData)" v-if='$cookies.get("login")==="login"' color="#415">fas fa-trash</v-icon>
        <span>&nbsp;</span>
        <v-icon @click="$_ShowCreateDialog()" v-if='$cookies.get("login")==="login"' color="#415">fas fa-plus</v-icon>
        <span>&nbsp;</span>
        <v-icon @click="$_ShowEditDialog(randomOneData)" v-if='$cookies.get("login")==="login"' color="#415">fas fa-pen</v-icon>
      </v-flex>

    </v-layout>
    <!-- 删除项目 对话框 -->
    <x-dialog-delete-item
      @eHideDialog="valueDeleteItemDialog=false"
      @eSucceed="$_reflashDeleteItem"
      :qShow="valueDeleteItemDialog"
      :dData="dataDeleteDialog"
    />
    <!-- 新建项目 对话框 -->
    <x-dialog-create-item
      @eHideDialog="valueCreateItemDialog=false"
      :qShow="valueCreateItemDialog"
    />
    <!--编辑 对话框 -->
    <x-dialog-edit-item
      @eHideDialog="valueEditItemDialog=false"
      @eSucceed="$_reflashEditItem"
      :qShow="valueEditItemDialog"
      :dData="dataEditDialog"
    />
  </v-container>
</template>

<script>
import MottoDeleteDialog from '@/components/PublicComponents/MottoDeleteDialog';
import MottoCreateDialog from '@/components/PublicComponents/MottoCreateDialog';
import MottoEditDialog from '@/components/PublicComponents/MottoEditDialog';
import APIURL from '@/components/API';

const axios = require('axios');

export default {
  name: 'PageMotto',
  components: {
    'x-dialog-delete-item': MottoDeleteDialog,
    'x-dialog-create-item': MottoCreateDialog,
    'x-dialog-edit-item': MottoEditDialog,
  },
  data() {
    return {
      routerName: this.$route.name,
      routerQuery: this.$route.query,
      bodyData: [],                      // 全部数据
      randomOneData: {},                 // 随机一条数据
      dataCategoryData: [],              // 目录数据
      login: false,                      // 是否登录
      valueDeleteItemDialog: false,      // 删除对话框-显示隐藏
      dataDeleteDialog: {},              // 删除对话框-数据
      valueCreateItemDialog: false,      // 新建对话框-显示隐藏
      valueEditItemDialog: false,        // 编辑对话框-显示隐藏
      dataEditDialog: {},                // 编辑对话框-数据
      queryResult: '',                   // 查询结果
    };
  },
  methods: {
    $_ShowDeleteDialog(data) {        // 显示删除项目对话框
      this.dataDeleteDialog = data;
      this.valueDeleteItemDialog = true;
    },
    $_reflashDeleteItem(data) {         // 删除项目成功时，也将其从页面中删除
      let index = -1;
      this.bodyData.forEach((v, i) => {
        if (v.id === data.id) index = i;
      });
      if (index >= 0) this.bodyData.splice(index, 1);
      this.$_randomChoiceOneData();
    },
    $_ShowCreateDialog() {
      this.valueCreateItemDialog = true;
    },
    $_reflashCreateItem(data) {         // 删除项目成功时，也将其从页面中删除
      this.bodyData.push(data);
      this.randomOneData = data;
    },
    $_ShowEditDialog(data) {
      this.valueEditItemDialog = true;
      this.dataEditDialog = data;
    },
    $_reflashEditItem(data) {                              // 编辑项目成功时，也将其从页面中更新
      this.bodyData.forEach((v, i) => {
        if (v.id === data.id) this.bodyData[i] = data;
      });
      this.randomOneData = data;
    },
    $_getBodyData(routerName) {                               // 从服务器获取数据
      axios
      .get(APIURL.GetDataURL, { params: { catalog: routerName } })
      .then((response) => {
        this.bodyData = response.data.data;                  // 项目数据
        this.$_randomChoiceOneData();                             // 生成页面数据
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
