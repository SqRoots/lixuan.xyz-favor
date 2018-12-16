<template>
  <v-container>
    <x-content-head/>
    <x-content-body/>
  </v-container>
</template>

<script>
import ContentHead from './Content/ContentHead';
import ContentBody from './Content/ContentBody';

export default {
  name: 'Content',
  components: {
    'x-content-head': ContentHead,
    'x-content-body': ContentBody,
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
