<template>
  <v-container grid-list-xl text-xs-center>
    <v-layout align-center justify-center column fill-height>
      <v-flex>
        <h1>关于</h1>
        <h4>我的一些网络产出介绍</h4>
      </v-flex>

      <v-flex style="min-width:800px;">
        <v-divider/>
        <v-timeline>
          <v-timeline-item
            v-for="(info,i) in infomation"
            :key="i"
            :color="info.color"
            fill-dot
            :left='i%2==0'
            :right='i%2==1'
            small
          >
            <v-card>
              <v-card-title :class="`${info.color} ${i%2==0?'justify-end':'justify-start'}`">
                <h3 class="headline white--text font-weight-light">{{info.title}}</h3>
              </v-card-title>
              <v-container>
                <v-layout align-center justify-center column fill-height>
                  <v-flex xs10>
                    <div v-html="info.content"></div>
                  </v-flex>
                </v-layout>
              </v-container>
            </v-card>
          </v-timeline-item>
        </v-timeline>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>

export default {
  name: 'PageAbout',
  components: {
  },
  data() {
    return {
      infomation: [
        {
          title: '主页',
          color: 'cyan',
          content: 'Vue<br>Vuetify<br>Axios',
        },
        {
          title: '博客',
          color: 'green',
          content: '<p>Wordpress</p>',
        },
        {
          title: 'Mathematica问答社区',
          color: 'pink',
          content: '<p>Wordpress</p><p>Question2Answer</p>',
        },
        {
          title: '数学之路',
          color: 'brown',
          content: '<p>Discuz</p>',
        },
        {
          title: '笔记',
          color: 'orange',
          content: '<p>GitBoook</p>',
        },
      ],
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  h1 {
    text-align: center;
  }
  .v-card.theme--light {
    border-radius: 10px;
  }
  .v-card__title {
    padding: 8px 16px;
  }
</style>
