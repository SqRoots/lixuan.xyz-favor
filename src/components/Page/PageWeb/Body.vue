<template>
  <v-container fluid grid-list-md>
    <v-layout row align-center xs12/>
      <!-- 生成子分类 开始 -->
      <v-flex v-for="data in $_filterSection(sectionData)" :key="data" xs12>
        <!-- 子分类 标题 -->
        <v-toolbar light flat>
          <v-icon style="margin: 0;">ac_unit</v-icon>
          <v-toolbar-title><h2>{{data}}</h2></v-toolbar-title>
          <v-spacer></v-spacer>
          <v-btn icon @click="$_EditItem(data)">
            <v-icon>create</v-icon>
          </v-btn>
          <v-btn icon @click="$_CreateItem(data)">
            <v-icon>add</v-icon>
          </v-btn>
          {{$route.query.category}}
        </v-toolbar>

        <!-- 子分类 内容 -->
        <x-body-section
          @eHideItem=""
          @eEditItem=""
          @eDeleteItem="$_ShowDeleteDialog"
          :login="!!login"
          :bodyData="$_getSectionData(bodyData, data)"
        />
      </v-flex>
    </v-layout>
    <!-- 生成子分类 结束 -->

    <!-- 删除对话框 -->
    <x-dialog-delete-item
      @eHideDialog="valueShowDeleteItemDialog=false"
      :qShow="valueShowDeleteItemDialog"
      :data="dataDeleteDialog"
    />
    <!-- 新建对话框 -->
    <x-dialog-create-item
      @eHideDialog="valueCreateItemDialog=false"
      :qShow="valueCreateItemDialog"
      :data="dataCreateDialog"
    />
  </v-container>
</template>

<script>
import DialogDeleteItem from '@/components/PublicComponents/DialogDeleteItem';
import DialogCreateItem from '@/components/PublicComponents/DialogCreateItem';
import BodySection from './BodySection';

const axios = require('axios');

export default {
  name: 'Body',
  components: {
    'x-body-section': BodySection,
    'x-dialog-delete-item': DialogDeleteItem,
    'x-dialog-create-item': DialogCreateItem,
  },
  data() {
    return {
      routerName: this.$route.name,
      routerQuery: this.$route.query,
      bodyData: [],         // 全部数据
      sectionData: [],      // 目录数据
      login: false,         // 是否登录
      valueShowDeleteItemDialog: false,  // 删除对话框-显示隐藏
      dataDeleteDialog: {},              // 删除对话框-数据
      valueCreateItemDialog: false,      // 新建对话框-显示隐藏
      dataCreateDialog: {},              // 新建对话框-数据
      queryResult: '',                   // 查询结果
    };
  },
  methods: {
    $_EditItem(data) {
      return data;
    },
    $_CreateItem(data) {
      this.valueCreateItemDialog = true;
      this.dataCreateDialog = { category: data };
    },
    $_ShowDeleteDialog(data) {
      this.dataDeleteDialog = data;
      this.valueShowDeleteItemDialog = true;
    },
    $_getBodyData(routerName) {    // 从服务器获取数据
      const url = 'https://lixuan.xyz/blog/x-c/get.php';
      axios
      .get(url, { params: { catalog: routerName } })
      .then((response) => {
        this.login = response.data.login;
        this.bodyData = response.data.data;
        const li = new Set();
        response.data.data.forEach(x => li.add(x.category));
        this.sectionData = Array.from(li);
      });
    },
    $_getSectionData(data, filterWord) {
      // 返回不同子类别的名称
      const li = [];
      data.forEach((v) => {
        if (v.category === filterWord) {
          li.push(v);
        }
      });
      return li;
    },
    $_filterSection(data) {
      if (!this.$route.query.category) {
        return data;
      }
      return [this.$route.query.category];
    },
  },
  mounted() {
    this.$_getBodyData(this.$route.name);
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
