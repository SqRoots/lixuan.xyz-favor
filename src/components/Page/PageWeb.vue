<template>
  <v-container fluid>
    <x-header/>
    <x-body/>
  </v-container>
</template>

<script>
import Header from './PageWeb/Header';
import Body from './PageWeb/Body';
// import Footer from './PageWeb/Footer';

export default {
  name: 'PageWeb',
  components: {
    'x-header': Header,
    'x-body': Body,
    // 'x-footer': Footer,
  },
  data() {
    return {
      cards: [1, 2, 3],
      items: ['abc', 'sdfdsf', 'asdf'],
      clipped: true,
      drawer: true,
      miniVariant: false,
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  
</style>
