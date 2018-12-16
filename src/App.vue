<template>
  <v-app id="inspire">
    <!-- ■■■■■■■■ 左边导航 ■■■■■■■■ -->
    <v-navigation-drawer
      :clipped="$vuetify.breakpoint.lgAndUp"
      value="true"
      fixed
      app
    >
      <x-navigation/>
    </v-navigation-drawer>

    <!-- ■■■■■■■■ 主体内容 ■■■■■■■■ -->
    <v-content>
      <v-container fluid>
        <v-layout justify-center align-center>
          <v-flex xs12>
            <router-view/>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>

    <!-- ■■■■■■■■ 右边导航 ■■■■■■■■ -->
    <!-- <x-navigation-right/> -->

    <!-- ■■■■■■■■ 克上角折叠按钮 ■■■■■■■■ -->
    <v-btn
      small
      fixed
      top
      left
      fab
    >
      <v-icon>menu</v-icon>
    </v-btn>
  </v-app>
</template>

<script>
import Navigation from '@/components/Navigation';


export default {
  components: { 'x-navigation': Navigation },
  data() {
    return {

    };
  },
  name: 'App',
};
</script>

<style media="screen">
  .v-navigation-drawer.v-navigation-drawer--clipped.v-navigation-drawer--fixed.v-navigation-drawer--open.theme--light {
    background: #ceccc4;
  }
  .v-content__wrap {
    background: #dedcd4;
  }
  /* 导航 颜色 */
  /* .v-navigation-drawer,
  .v-navigation-drawer a,
  .v-navigation-drawer .v-list__tile__title,
  .v-navigation-drawer .primary--text,
  .v-navigation-drawer .v-list__group.v-list__group--active  .v-list__tile__title{
    color: #333;
  }
  .v-navigation-drawer .v-icon,
  .v-navigation-drawer .v-list__tile__action i {
    color: #a30;
  } */
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
</style>
