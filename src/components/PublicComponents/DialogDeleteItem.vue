<template>
  <div class="">
    <v-dialog v-model="valueShowDialog" width="400" >
      <v-card>
      <v-card-title class="headline blue darken-4 white--text">确定删除？</v-card-title>

      <v-card-text>

        <v-container>
          <v-layout align-start justify-center column>
            <v-flex xs6><h3><span class="grey--text">项目 ID : </span>{{data.id}}</h3></v-flex>
            <v-flex xs6><h3><span class="grey--text">项目名称: </span>{{data.name}}</h3></v-flex>
            <v-flex xs6><h3><span class="grey--text">项目描述: </span></h3></v-flex>
            <v-flex xs6 style="margin-left:20px;" v-html="data.description_html">
            </v-flex>
          </v-layout>
        </v-container>

      </v-card-text>

      <v-divider></v-divider>

      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="secondery" flat @click="valueShowDialog = false">取消</v-btn>
        <v-btn color="primary" flat @click="$_toDeleteItem(data.id);valueShowResultDialog=true">确认</v-btn>
      </v-card-actions>
      </v-card>
    </v-dialog>

    <x-dialog-result
      @eTurnOff="valueShowResultDialog=false"
      :qShow="valueShowResultDialog"
      :data="['删除结果', queryResult]"
    />
  </div>
</template>

<script>
import DialogResult from '@/components/PublicComponents/DialogResult';

const axios = require('axios');

export default {
  name: 'DialogDeleteItem',
  components: {
    'x-dialog-result': DialogResult,
  },
  data() {
    return {
      valueShowDialog: false,
      valueShowResultDialog: false,
      queryResult: '',
    };
  },
  methods: {
    $_toDeleteItem(itemID) {
      const url = 'https://lixuan.xyz/blog/x-c/website-delete.php';
      axios
      .get(url, { params: { id: itemID } })
      .then((response) => {
        this.queryResult = response.data;
      });
      this.valueShowDialog = false;
      this.valueShowResultDialog = true;
    },
  },
  props: {
    qShow: Boolean,
    data: Object,
  },
  watch: {
    qShow(val) {
      this.valueShowDialog = val;
    },
    valueShowDialog(val) {
      if (val === false) {
        this.$emit('eHideDialog');
      }
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
