<template>
  <v-container grid-list-xl text-xs-center>
    <v-layout align-center justify-center column fill-height>
      <v-flex>
        <h1>关于我</h1>
        <h4>李宣</h4>
      </v-flex>

      <!-- 个人资料卡 -->
      <v-container grid-list-xl text-xs-center>
        <v-layout align-center justify-center row>
          <v-flex md3 xl3>
            <v-card>
              <!-- 标题 -->
              <v-card-title class="blue justify-center">
                <h3 class="headline white--text font-weight-light">基本信息</h3>
              </v-card-title>
              <!-- 内容 -->
              <v-container>
                <v-layout align-center justify-center column fill-height>
                  <v-flex xs10>
                    <p v-for="p in personalInfo" v-html="p"></p>
                  </v-flex>
                </v-layout>
              </v-container>
            </v-card>
          </v-flex>

          <v-flex md3 xl3>
            <v-card>
              <!-- 标题 -->
              <v-card-title class="blue justify-center">
                <h3 class="headline white--text font-weight-light">扩展信息</h3>
              </v-card-title>
              <!-- 内容 -->
              <v-container>
                <v-layout align-center justify-center column fill-height>
                  <v-flex xs10>
                    <p v-for="p in personalInfo" v-html="p"></p>
                  </v-flex>
                </v-layout>
              </v-container>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>

      <v-flex>
        <v-card>
          <!-- 标题 -->
          <v-card-title class="blue justify-center">
            <h3 class="headline white--text font-weight-light">文本履历</h3>
          </v-card-title>
          <!-- 内容 -->
          <v-container>
            <v-layout align-center justify-center column fill-height>
              <v-flex xs10>
                <p v-for="p in ll" v-html="p"></p>
              </v-flex>
            </v-layout>
          </v-container>
        </v-card>
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
            <span
               slot="opposite"
               :class="`headline font-weight-bold ${info.color}--text`"
               v-text="info.date"
             ></span>
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
  methods: {
    $_getAge() {  // 计算年龄
      const date = new Date();
      const year = date.getFullYear();
      const month = date.getMonth() + 1;
      const nowMyAge = Math.floor((((100 * year) + month) - 198703) / 100);
      return `<b>生日</b>： 1987-03-14 (${nowMyAge}岁)`;
    },
  },
  data() {
    return {
      personalInfo: [
        '<b>姓名</b>： 李宣',
        '<b>性别</b>： 男',
        `${this.$_getAge()}`,
        '<b>家乡</b>： 河北 昌黎',
        '<b>视力</b>： 近视（-250°），绿色弱',
        '<b>网名</b>： 凡星有梦 / 野鹤 / Sqroots',
        '<b>邮箱</b>： lixuan.xyz@gmail.com',
      ],
      ll: [
        '1987年',
        '我出生于一个并不偏远的村庄',
        '有值得怀念的童年',
        '1994年入学',
        '小学和初中走读',
        '2003年，在一所普通的高中寄读，是一名严重偏科的学生',
        '（期间自学了：《高等数学》《大学物理》《初等数论》《线性代数》《VB程序设计》和HTML语言）',
        '2006年高考，数学失利',
        '同年进入保定学院的专科学习数学',
        '2009年继续在该校进修了同专业的本科',
        '2011年考入了燕山大学的概率论与数理统计专业读研',
        '2014年来到北京就业',
        '漂泊至今',
      ],
      infomation: [
        {
          date: '2016-04 ~ 今',
          title: '北京中彩在线',
          url: 'https://lixuan.xyz',
          color: 'cyan',
          icon: 'fas fa-building',
          content: [
            '<b>职位</b>： 数据分析师',
            '<b>部门</b>： 数据分析部',
            '<hr/>',
            '使用 Vue，Vuetify，Axios 等开源工具开发',
            '本主页源码已开源：<a href="https://github.com/SqRoots/lixuan.xyz-favor">Github</a>',
          ],
        },
        {
          date: '2014-12 ~ 2016-04',
          title: '北京360',
          url: 'https://lixuan.xyz/blog/',
          color: 'green',
          icon: 'fas fa-building',
          content: [
            '<b>职位</b>： 数据分析师',
            '<b>部门</b>： 在线营销部',
            '<hr/>',
            '使用 Wordpress 创建',
          ],
        },
        {
          date: '2014-06 ~ 2014-12',
          title: '北京新东方',
          url: 'https://mmaqa.com/',
          color: 'pink',
          icon: 'fas fa-building',
          content: [
            '<b>职位</b>： 数据分析师',
            '<b>部门</b>： 教务管理部',
            '<hr/>',
            '使用 Wordpress + Question2Answer 创建',
          ],
        },
        {
          date: '2011-09 ~ 2014-01',
          title: '燕山大学',
          url: 'https://lixuan.xyz/notes/mathematica/',
          color: 'orange',
          icon: 'fas fa-graduation-cap',
          content: [
            '<b>专业</b>： 概率论与数理统计',
            '<b>院系</b>： 理学院',
            '<b>学位</b>： 理学硕士',
            '<b>学历</b>： 全日制研究生',
            '<hr/>',
            '使用 GitBoook 创建',
          ],
        },
        {
          date: '2006-09 ~ 2011-06',
          title: '保定学院',
          url: 'https://lixuan.xyz/photo',
          color: 'blue',
          icon: 'fas fa-graduation-cap',
          content: [
            '<b>专业</b>： 数学教育+数学与应用数学',
            '<b>院系</b>： 数学与计算机系',
            '<b>学位</b>： 理学学士',
            '<b>学历</b>： 全日制专接本',
            '<hr/>',
            '使用 Lychee 创建',
          ],
        },
        {
          date: '2003-09 ~ 2006-06',
          title: '昌黎汇文二中',
          url: 'http://shuxue6.com',
          color: 'brown',
          icon: 'fas fa-graduation-cap',
          content: [
            '<b>学历</b>： 全日制普通高中',
            '<hr/>',
            '使用 Discuz 创建',
          ],
        },
        {
          date: '2000-09 ~ 2003-06',
          title: '泥井镇中学',
          url: 'http://shuxue6.com',
          color: 'brown',
          icon: 'fas fa-graduation-cap',
          content: [
            '<b>学历</b>： 全日制初级中学',
            '<hr/>',
            '使用 Discuz 创建',
          ],
        },
        {
          date: '1994-09 ~ 2000-06',
          title: '泥井镇中心小学',
          url: 'http://shuxue6.com',
          color: 'brown',
          icon: 'fas fa-graduation-cap',
          content: [
            '<b>学历</b>： 全日制小学',
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
