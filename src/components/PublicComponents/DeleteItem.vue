<template>
  <v-dialog
    v-model="vDeleteDialog"
    width="500"
  >
    <v-card>
    <v-card-title
      class="headline grey lighten-2"
      primary-title
    >
      确认删除项目：{{data.name}}
    </v-card-title>

    <v-card-text>
      项目ID: {{data.id}}
      <br>
      项目名称：{{data.name}}
      <br>
      <div v-html="data.description_html"></div>
    </v-card-text>

    <v-divider></v-divider>

    <v-card-actions>
      <v-spacer></v-spacer>
      <v-btn
      color="secondery"
      flat
      @click="vDeleteDialog = false"
      >
      取消
      </v-btn>
      <v-btn
      color="primary"
      flat
      @click="toDeleteItem(data.id)"
      >
      确认
      </v-btn>
    </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
const axios = require('axios');

export default {
  name: 'DeleteItem',
  data() {
    return {
      vDeleteDialog: false,
    };
  },
  methods: {
    toDeleteItem(itemID) {
      const url = 'https://lixuan.xyz/blog/x-c/website-delete.php';
      axios
      .get(url, { params: { id: itemID } })
      .then((response) => {
        console.log(response.data);
      });
      this.vDeleteDialog = false;
    }
  },
  props: {
    'value': Boolean,
    'data' : Object,
  },
  watch: {
    value: function(val) {
      this.vDeleteDialog=val;
    },
    vDeleteDialog: function(val) {
      if (val === false) {
        this.$emit('turnoff');
      }
    },
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
