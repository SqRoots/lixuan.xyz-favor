<template>
  <v-list dense>
    <template v-for="item in items">

      <!-- 组 -->
      <v-list-group
        v-if="item.children"
        v-model="item.model"
        :key="item.text"
        :prepend-icon="item.icon"
        :append-icon="item.children.length>0 ? (item.model ? keyboard_arrow_down : keyboard_arrow_up) : null"
        @click="item.model = !item.model"
      >
        <!-- 项目 - 列表 -->
        <v-list-tile slot="activator" :to="{ name: item.routerName, params: {} }">
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
          :to="{ name: child.routerName, params: child.params }"
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

      <!-- 项目 - 列表 -->
      <v-list-tile v-else :key="item.text" :to="{ name: item.routerName, params: {} }">
        <v-list-tile-action>
          <v-icon>{{ item.icon }}</v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>
            {{ item.text }}
          </v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
    </template>
  </v-list>
</template>

<script>
import DataNavigationBody from './DataNavigationBody';

export default {
  name: 'DataNavigationBody',
  data() {
    return {
      items: DataNavigationBody,
      routerName: this.$route.name,
    };
  },
  props: {
    source: String,
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

  .navi-child {
    margin-left: 35px;
  }

  .v-list__tile__action{
    min-width: 32px;
    /* color: #f00; */
  }
</style>
