<template>
  <div>
    <!-- 折叠边栏 -->
    <!--
      <v-btn icon @click.stop="miniVariant = !miniVariant">
        <v-icon v-html="miniVariant ? 'chevron_right' : 'chevron_left'"></v-icon>
      </v-btn>
    -->
  <!-- 导航 - 头部 -->
  <navigation-head/>

  <!-- 导航 - 体部 -->
  <navigation-body/>
</div>
</template>

<script>
import NavigationHead from './Navigation/NavigationHead';
import NavigationBody from './Navigation/NavigationBody';

export default {
  name: 'Navigation',
  components: {
    'navigation-head': NavigationHead,
    'navigation-body': NavigationBody,
  },
  data() {
    return {
      clipped: true,
      drawer: true,
      fixed: true,
      miniVariant: false,
      right: false,
      rightDrawer: false,
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
