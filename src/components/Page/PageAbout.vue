<template>
  <v-container style="max-width: 600px;">
    <v-timeline dense clipped>
      <v-timeline-item
        fill-dot
        class="white--text mb-5"
        color="orange"
        large
      >
        <span slot="icon">关于</span>
      </v-timeline-item>

      <v-timeline-item
         v-for="info in infomation"
        class="mb-3"
        color="grey"
        small
      >
        <h2 :class="`title font-weight-light mb-3 ${info.color}--text`">{{info.title}}</h2>
        <v-layout justify-space-between>
          <v-flex xs5 v-text="info.title"></v-flex>
          <v-flex xs7 text-xs-right v-html="info.content"></v-flex>
        </v-layout>
        <!-- <v-layout justify-space-between>
          <v-flex>
            <h2 :class="`title font-weight-light mb-3 ${info.color}--text`">{{info.title}}</h2>
            <div v-html="info.content" text-xs-right></div>
          </v-flex>
        </v-layout> -->
      </v-timeline-item>

    </v-timeline>
  </v-container>
</template>

<script>

export default {
  name: 'PageAbout',
  components: {
  },
  data() {
    return {
      items: [
        {
          color: 'red lighten-2',
          icon: 'mdi-star'
        },
        {
          color: 'purple darken-1',
          icon: 'mdi-book-variant'
        },
        {
          color: 'green lighten-1',
          icon: 'mdi-airballoon'
        },
        {
          color: 'indigo',
          icon: 'mdi-buffer'
        }
      ],
      infomation: [
        {
          title: '主页',
          color: 'cyan',
          content: '<p>Vue</p><p>Vuetify</p><p>Axios</p>',
        },
        {
          title: '博客',
          color: 'green',
          content: '<ul><li>Wordpress</li></ul>',
        },
        {
          title: 'Mathematica问答社区',
          color: 'pink',
          content: '<ul><li>Wordpress</li><li>Question2Answer</li></ul>',
        },
        {
          title: '数学之路',
          color: 'amber',
          content: '<ul><li>Discuz</li></ul>',
        },
        {
          title: '笔记',
          color: 'orange',
          content: '<ul><li>GitBoook</li></ul>',
        }
      ]
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  h1 {
    text-align: center;
  }
</style>
