<template>
  <v-list dense>
    <template v-for="item in items">
      <!-- 组 -->
      <v-list-group
        v-if="item.children"
        v-model="item.model"
        :key="item.text"
        :prepend-icon="item.icon"
        :append-icon="item.children.length>0 ? (item.model ? keyboard_arrow_up : keyboard_arrow_left) : null"
        @click="item.model=$_toggleTile(item.model);item.model"
      >
        <!-- 项目 - 列表 -->
        <v-list-tile slot="activator" :to="{ name: item.routerName }">
          <v-list-tile-content>
            <v-list-tile-title>
              {{ item.text }}
            </v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>

        <!-- 项目 - 子列表 -->
        <v-list-tile
          v-for="(child, i) in item.children"
          :key="child.text"
          :active-class="child.model"
          @click="child.model=$_toggleSubtile(child.model);child.model"
          class="navi-child"

          :to="{ name: child.routerName, query: child.query }"
        >
          <v-list-tile-action v-if="child.icon">
            <v-icon>{{ child.icon }}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>
              {{ child.text }}
            </v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list-group>
      <!-- 组 - 结束 -->
    </template>
  </v-list>
</template>

<script>
import NavigationBodyData from './NavigationBodyData';

export default {
  name: 'DataNavigationBody',
  data() {
    return {
      items: NavigationBodyData,
      routerName: this.$route.name,
      keyboard_arrow_up: 'keyboard_arrow_up',
      keyboard_arrow_left: 'keyboard_arrow_left',
    };
  },
  props: {
    source: String,
  },
  methods: {
    $_toggleTile(model) {                                                 // 切换一级导航的激活状态
      // for (let i = 0; i < this.items.length; i += 1) {
      //   for (let ii = 0; ii < this.items[i].children.length; ii += 1) {
      //     this.items[i].children[ii].model = 'inactive';
      //   }
      // }
      if (model === true) {
        return false;
      }
      return true;
    },
    $_toggleSubtile(model) {                                              // 切换二级导航的激活状态
      for (let i = 0; i < this.items.length; i += 1) {
        for (let ii = 0; ii < this.items[i].children.length; ii += 1) {
          this.items[i].children[ii].model = 'inactive';
        }
      }
      if (model === 'inactive') {
        return 'active';
      }
      return 'inactive';
    },
  },
  mounted() {                                                           // 挂载行为
    let routerNameIndex = 0;
    this.items.forEach((v, i) => {
      if (v.routerName === this.$route.name) routerNameIndex = i;
    });
    this.items[routerNameIndex].model = true;
    let routerQueryIndex = 0;
    this.items[routerNameIndex].children.forEach((v, i) => {
      if (v.query.category === this.$route.query.category) routerQueryIndex = i;
    });
    this.items[routerNameIndex].children[routerQueryIndex].model = 'active';
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .navi-child {
    margin-left: 40px;
  }
  .v-list__tile__title,.v-list__tile__action, .v-list__tile__avatar {
    min-width: 30px;
    margin: 0 3px;
  }
  .v-icon.material-icons.theme--light {
    margin: 0;
  }
  .navi-child a.active .v-list__tile__content,
  .navi-child a.active .v-list__tile__action {
    color: #00d;
  }
</style>
