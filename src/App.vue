<template>
  <v-app id="inspire">
    <!-- ■■■■■■■■ 左边导航 ■■■■■■■■ -->
    <v-navigation-drawer
      :clipped="$vuetify.breakpoint.lgAndUp"
      v-model="miniVariant"
      fixed
      app
    >
      <x-navigation/>
    </v-navigation-drawer>

    <!-- ■■■■■■■■ 主体内容 ■■■■■■■■ -->
    <v-content>
      <v-container fluid>
        <router-view/>
      </v-container>
    </v-content>

    <x-footer/>

    <!-- ■■■■■■■■ 克上角折叠按钮 ■■■■■■■■ -->
    <v-btn
      small
      fixed
      top
      left
      fab
      @click.stop="miniVariant = !miniVariant"
    >
      <v-icon v-html="miniVariant ? 'chevron_left' : 'menu'"></v-icon>
    </v-btn>
  </v-app>
</template>

<script>
import Navigation from '@/components/Navigation';
import Footer from '@/components/Footer';

export default {
  components: {
    'x-navigation': Navigation,
    'x-footer': Footer,
  },
  data() {
    return {
      miniVariant: true,
    };
  },
  methods: {
  },
  name: 'App',
};
</script>

<style media="screen">
  .v-footer{
    background-color: #dedcd4;
    text-align: center;
  }
  .v-navigation-drawer.v-navigation-drawer--clipped.v-navigation-drawer--fixed.v-navigation-drawer--open.theme--light {
    background: #ceccc4;
  }
  .v-content__wrap {
    background: #dedcd4;
  }
  /* 导航对齐 */
  a.v-list__tile.v-list__tile--link.theme--light,
  a.primary--text.v-list__tile--active.v-list__tile.v-list__tile--link.theme--light{
    margin: 0;
    padding: 0;
  }

  .v-icon.material-icons.theme--light {
    margin: 0 16px;
  }

  .v-list__group__header .v-list__tile.v-list__tile--link.theme--light{
    margin: 0;
    padding: 0;
  }

  .v-list__group__header  .v-icon.material-icons.theme--light {
    margin: 0;
  }
  /* 导航对齐 - 结束 */

  /*  toolbar */
  .v-toolbar__content, .v-toolbar__extension{
    padding: 0 12px;
  }
</style>
