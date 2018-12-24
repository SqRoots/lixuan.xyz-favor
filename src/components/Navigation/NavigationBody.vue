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
        @click="item.model = !item.model"
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
          :key="i"
          @click=""
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
  mounted() {
    let routerNameIndex = 0;
    this.items.forEach((v, i) => {
      if (v.routerName === this.$route.name) routerNameIndex = i;
    });
    this.items[routerNameIndex].model = true;
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .navi-child {
    margin-left: 35px;
  }
</style>
