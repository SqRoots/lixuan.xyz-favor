<template>
  <v-layout row justify-center>
    <v-dialog v-model="valueShowDialog" persistent max-width="600px">
      <v-form>
        <v-card>
          <v-card-title class="headline blue darken-4">
            <span class="headline white--text">编辑</span>
          </v-card-title>
          <v-card-text>
            <v-container grid-list-md>
              <v-layout wrap>
                <v-flex xs6>
                  <v-text-field v-model="formName" label="原名" required></v-text-field>
                </v-flex>
                <v-flex xs6>
                  <v-text-field v-model="formNameCN" label="译名" required></v-text-field>
                </v-flex>
                <v-flex xs12>
                  <v-text-field v-model="formURL" label="网站地址" required></v-text-field>
                </v-flex>
                <v-flex xs12>
                  <v-text-field v-model="formSlogan" label="Slogan" required></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md4 lg3>
                  <v-text-field v-model="formEstablisher" label="创办人" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4 lg3>
                  <v-text-field v-model="formCategory" label="分类" required :value="data.category"></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4 lg3>
                  <v-text-field v-model="formType" label="类型" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4 lg3>
                  <v-text-field v-model="formOrder" label="排序" required></v-text-field>
                </v-flex>

                <v-flex xs12 sm6 md4 lg3>
                  <v-text-field v-model="formID" label="ID" required></v-text-field>
                </v-flex>
                <v-spacer/>
                <v-flex xs12 sm6 md4 lg3>
                  <v-switch
                    :label="formVisible ? '可见' : '隐藏'"
                    v-model="formVisible"
                  ></v-switch>
                </v-flex>

                <v-flex xs12>
                  <v-textarea
                    outline
                    v-model="formDescriptionHTML"
                    label="描述"
                  ></v-textarea>
                </v-flex>
              </v-layout>
            </v-container>

            <small>*也许该写点什么提示吧</small>
          </v-card-text>

          <v-divider></v-divider>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="grey lighten-1 white--text" @click="valueShowDialog = false">取消</v-btn>
            <v-btn color="blue darken-1 white--text" @click="$_submit()">保存</v-btn>
          </v-card-actions>
        </v-card>
      </v-form>
    </v-dialog>
    <x-dialog-result
      @eTurnOff="valueShowResultDialog=false"
      :qShow="valueShowResultDialog"
      :data="['新建结果', queryResult]"
    />
  </v-layout>
</template>

<script>
import DialogResult from '@/components/PublicComponents/DialogResult';

const axios = require('axios');

export default {
  name: 'DialogEditItem',
  components: {
    'x-dialog-result': DialogResult,
  },
  data() {
    return {
      valueShowDialog: false,
      valueShowResultDialog: false,
      queryResult: '',
      formID: 0,
      formVisible: true,
      formName: '',
      formNameCN: '',
      formURL: '',
      formSlogan: '',
      formEstablisher: '',
      formCategory: '',
      formType: '',
      formOrder: 0,
      formDescriptionHTML: '',
    };
  },
  methods: {
    $_submit() {
      const url = 'https://lixuan.xyz/blog/x-c/web-edit.php';
      const params = new URLSearchParams();
      params.append('id', this.formID);
      params.append('name', this.formName);
      params.append('name_cn', this.formNameCN);
      params.append('url', this.formURL);
      params.append('slogan', this.formSlogan);
      params.append('establisher', this.formEstablisher);
      params.append('category', this.formCategory);
      params.append('type', this.formType);
      params.append('order', this.formOrder);
      params.append('visible', this.formVisible);
      params.append('description_html', this.formDescriptionHTML);
      axios
      .post(url, params).then((response) => {
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
    data(val) {
      this.formID = val.id;
      this.formName = val.name;
      this.formNameCN = val.name_cn;
      this.formURL = val.url;
      this.formSlogan = val.slogan;
      this.formEstablisher = val.establisher;
      this.formCategory = val.category;
      this.formType = val.type;
      this.formOrder = val.order;
      this.formDescriptionHTML = val.description_html;
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
