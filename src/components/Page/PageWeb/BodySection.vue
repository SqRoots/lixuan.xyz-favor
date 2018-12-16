<template>
  <v-container grid-list-md text-xs-center>
    <v-layout row wrap justify-space-between>
      <v-flex v-for="data in bodyData" :key="data.id" xs4>
        <v-toolbar height="30px" light color="rgba(50,70,0,0.5)">
          <!-- <v-toolbar-side-icon></v-toolbar-side-icon> -->
          <v-toolbar-title style="font-size:16px;margin-left:-13px;">
            <a :href="data.url" target="_blank"><v-icon>open_in_new</v-icon> {{data.name}}</a>
          </v-toolbar-title>
          <v-spacer></v-spacer>

          <v-btn icon small v-if='login'><v-icon>visibility</v-icon></v-btn>
          <v-btn icon small v-if='login'><v-icon>create</v-icon></v-btn>
          <v-btn icon small v-if='login'><v-icon>delete_outline</v-icon></v-btn>

        </v-toolbar>

        <v-card color="#ccc">
          <!-- <v-img
            src="https://cdn.vuetifyjs.com/images/cards/desert.jpg"
            aspect-ratio="2.75"
          ></v-img> -->

          <v-card-title style="padding: 16px;">
            <span style="font-weight: bold; margin-right: 5px;">{{data.type}}:</span>
            <span>{{data.slogan}}</span>
          </v-card-title>

          <v-card-text
            class="text-sm-left"
            v-html="data.description_html"
            style="padding: 0 16px 16px 16px;"
          >
          </v-card-text>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  name: 'BodySection',
  data() {
    return {
      routerName: this.$route.name,
    };
  },
  props: [
    'bodyData',
    'login',
  ],

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
    /* width: 16px; */
  }
</style>
