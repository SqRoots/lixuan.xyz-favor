<template>
  <v-container fluid>
    <!-- 标题 -->
    <v-layout row wrap/>
      <v-flex xs12>
        <h1>李宣</h1>
        <h3>欢迎来到我的小站</h3>
      </v-flex>
    </v-layout>

    <br>
    <v-divider></v-divider>
    <br>

    <!-- 网站 列表 -->
    <v-layout align-space-around justify-space-around row fill-height>
      <v-flex v-for="web in myWeb" :key="web.name" xs3>
        <v-card :href="web.href" target="_blank">
          <v-img
            :src="web.imgsrc"
            aspect-ratio="2.75"
          ></v-img>

          <v-card-title primary-title>
            <div>
              <h3 class="headline mb-0">{{web.name}}</h3>
              <div>{{web.description_html}}</div>
            </div>
          </v-card-title>
        </v-card>
      </v-flex>
    </v-layout>

  </v-container>
</template>

<script>
import mmaPNG from '@/assets/mma.ooo.png';
import lixPNG from '@/assets/lixuan.xyz.png';

export default {
  name: 'PageHome',

  data() {
    return {
      myWeb: [
        {
          name: 'Mathematica问答社区',
          href: 'https://mmaqa.com',
          imgsrc: mmaPNG,
          description_html: '我在2017年创办的Mathematica社区',
        },
        {
          name: '博客',
          href: 'https://lixuan.xyz/blog/',
          imgsrc: lixPNG,
          description_html: '我在',
        },
      ],
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
