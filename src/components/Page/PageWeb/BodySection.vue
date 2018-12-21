<template>
  <v-container grid-list-md text-xs-center>
    <v-layout row wrap justify-start>
      <v-flex v-for="data in bodyData" :key="data.id" xs12 sm6 md4 lg3 xg2>
        <v-toolbar height="30px" light color="rgba(50,70,0,0.5)">
          <v-toolbar-title style="font-size:16px;">
            <a :href="data.url" target="_blank">{{data.name}} <v-icon style="color:#ccc;">open_in_new</v-icon></a>
          </v-toolbar-title>

          <v-spacer></v-spacer>

          <v-btn icon small @click="$_EditItem(data)" v-if='login'><v-icon color="#550">create</v-icon></v-btn>
          <v-btn icon small @click="$emit('eDeleteItem',data)" v-if='login'><v-icon color="#550">delete_outline</v-icon></v-btn>

        </v-toolbar>

        <v-card color="#ccc" overflow-y-hidden>

          <v-card-title style="padding: 16px;">
            <span style="font-weight: bold; margin-right: 5px;">{{data.type}}:</span>
            <span>{{data.slogan}}</span>
          </v-card-title>

          <v-card-text overflow-y-hidden
            class="text-sm-left"
            v-html="data.description_html"
            style="padding: 0 16px 16px 16px;"
          >
          </v-card-text>

        </v-card>
      </v-flex>
    </v-layout>
    <!--编辑 对话框 -->
    <x-dialog-edit-item
      @eHideDialog="valueEditItemDialog=false"
      :qShow="valueEditItemDialog"
      :data="dataEditDialog"
    />
  </v-container>
</template>

<script>
import DialogEditItem from '@/components/PublicComponents/DialogEditItem';

export default {
  name: 'BodySection',
  components: {
    'x-dialog-edit-item': DialogEditItem,
  },
  data() {
    return {
      routerName: this.$route.name,
      valueEditItemDialog: false,        // 编辑对话框-显示隐藏
      dataEditDialog: {},                // 编辑对话框-数据
    };
  },
  props: [
    'bodyData',
    'login',
  ],
  methods: {
    $_EditItem(data) {
      this.dataEditDialog = data;
      this.valueEditItemDialog = true;
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  a {
    color: #eee;
    text-decoration: none;
  }
  a .v-icon {
    color: #eee;
  }
  .v-card {
    height: 128px;
  }
  .v-toolbar__content{
    padding: 0;
  }
  .v-toolbar .v-icon{
    font-size: 16px;
    margin: 0;
    padding: 0;
  }
  .v-toolbar .v-btn {
    margin-left: -5px;
    padding: 0;
  }

</style>
