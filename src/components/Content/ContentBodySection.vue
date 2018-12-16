<template>

</template>

<script>
import DataNavigationBody from './DataNavigationBody';

export default {
  name: 'ContentBodySection',
  data() {
    return {
      items: DataNavigationBody,
      routerName: this.$route.name,
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
