<template>
  <v-container grid-list-xl text-xs-center>
    <v-layout align-center justify-center column fill-height>
      <v-flex>
        <h1>关于我</h1>
        <h4>李宣</h4>
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
            :icon='info.icon'
            small
          >
            <v-card>
              <!-- 标题 -->
              <v-card-title :class="`${info.color} ${i%2==0?'justify-end':'justify-start'}`">
                <v-icon v-show='i%2!=0' dark>{{ info.icon }}</v-icon>
                <h3 class="headline white--text font-weight-light">&nbsp;<a :href="info.url" target="_blank">{{info.title}}</a>&nbsp;</h3>
                <v-icon v-show='i%2==0' dark>{{ info.icon }}</v-icon>
              </v-card-title>
              <!-- 内容 -->
              <v-container>
                <v-layout align-center justify-center column fill-height>
                  <v-flex xs10>
                    <p v-for="p in info.content" v-html="p"></p>
                    <!-- <div v-html="info.content"></div> -->
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
          url: 'https://lixuan.xyz',
          color: 'cyan',
          icon: 'fas fa-home',
          content: [
            '<b>域名</b>：<a href="https://lixuan.xyz" target="_blank">lixuan.xyz</a> | <a href="https://lixuan.me" target="_blank">lixuan.me</a>',
            '<b>内容</b>：我的原创资源导航 + 收藏的一些网站',
            '<b>日期</b>：主页于2018-12-29改成现版本',
            '<hr/>',
            '使用 Vue，Vuetify，Axios 等开源工具开发',
            '本主页源码已开源：<a href="https://github.com/SqRoots/lixuan.xyz-favor">Github</a>',
          ],
        },
        {
          title: '博客',
          url: 'https://lixuan.xyz/blog/',
          color: 'green',
          icon: 'fas fa-blog',
          content: [
            '<b>域名</b>：<a href="https://lixuan.xyz/blog/" target="_blank">lixuan.xyz/blog/</a>',
            '<b>内容</b>：趣题 + Mathematica + 笔记',
            '<b>日期</b>：创办于2014-01-10',
            '<hr/>',
            '使用 Wordpress 创建',
          ],
        },
        {
          title: 'Mathematica问答社区',
          url: 'https://mmaqa.com/',
          color: 'pink',
          icon: 'fas fa-atom',
          content: [
            '<b>域名</b>：<a href="https://mmaqa.com" target="_blank">mmaqa.com</a> | <a href="http://mma.ooo" target="_blank">mma.ooo</a>',
            '<b>内容</b>：交流 Mathematica 问题 + 分享文章',
            '<b>日期</b>：创办于2016-04-01',
            '<hr/>',
            '使用 Wordpress + Question2Answer 创建',
          ],
        },
        {
          title: '笔记',
          url: 'https://lixuan.xyz/notes/mathematica/',
          color: 'orange',
          icon: 'fas fa-feather-alt',
          content: [
            '<b>待续</b>',
            '<hr/>',
            '使用 GitBoook 创建',
          ],
        },
        {
          title: '摄影',
          url: 'https://lixuan.xyz/photo',
          color: 'blue',
          icon: 'fas fa-camera',
          content: [
            '<b>待续</b>',
            '<hr/>',
            '使用 Lychee 创建',
          ],
        },
        {
          title: '数学之路 (停止维护)',
          url: 'http://shuxue6.com',
          color: 'brown',
          icon: 'fas fa-superscript',
          content: [
            '<b>域名</b>：<a href="http://shuxue6.com" target="_blank">shuxue6.com</a>',
            '<b>内容</b>：交流数学问题 + 分享数学资源',
            '<b>日期</b>：创办于 2011 年，已不再维护',
            '<hr/>',
            '使用 Discuz 创建',
          ],
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
  a {
    color: #fff;
    text-decoration: none;
  }
</style>
