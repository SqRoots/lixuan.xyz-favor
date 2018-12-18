<template>
  <v-layout row justify-center>
    <v-dialog v-model="valueShowDialog" persistent max-width="600px">
      <v-card>
        <v-card-title class="headline blue darken-4">
          <span class="headline white--text">新建</span>
        </v-card-title>
        <v-card-text>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs6>
                <v-text-field label="原名" required></v-text-field>
              </v-flex>
              <v-flex xs6>
                <v-text-field label="译名" required></v-text-field>
              </v-flex>
              <v-flex xs12>
                <v-text-field label="网站地址" required></v-text-field>
              </v-flex>
              <v-flex xs12>
                <v-text-field label="Slogan" required></v-text-field>
              </v-flex>
              <v-divider></v-divider>
              <v-flex xs12 sm6 md4 lg3>
                <v-text-field label="创办人" required></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4 lg3>
                <v-text-field label="分类" required :value="data.category"></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4 lg3>
                <v-text-field label="类型" required></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4 lg3>
                <v-text-field label="排序" required></v-text-field>
              </v-flex>
              <v-divider></v-divider>
              <v-flex xs12 sm6 md4 lg3>
                <v-switch
                  :label="`可见: ${switch1.toString()}`"
                  v-model="switch1"
                ></v-switch>
              </v-flex>
              <v-flex xs12>
                <v-textarea
                  outline
                  name="input-7-4"
                  label="描述"
                  value=""
                ></v-textarea>
              </v-flex>
            </v-layout>
          </v-container>
          <small>*也许该写点什么提示吧</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="grey lighten-1 white--text" @click="valueShowDialog = false">取消</v-btn>
          <v-btn color="blue darken-1 white--text" @click="valueShowDialog = false">保存</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-layout>
</template>

<script>
import DialogResult from '@/components/PublicComponents/DialogResult';

const axios = require('axios');

export default {
  name: 'DialogCreateItem',
  components: {
    'x-dialog-result': DialogResult,
  },
  data() {
    return {
      valueShowDialog: false,
      valueShowResultDialog: false,
      queryResult: '',
      switch1: true,
    };
  },
  methods: {
    toDeleteItem(itemID) {
      const url = 'https://lixuan.xyz/blog/x-c/website-create.php';
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
