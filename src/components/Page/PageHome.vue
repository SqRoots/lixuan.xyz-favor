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
    <v-layout wrap align-center justify-space-around row fill-height>
      <v-flex v-for="web in myWeb" :key="web.name"  xs12 sm6 md4 lg3 xg2>
        <v-hover>
          <v-card
            :href="web.href"
            target="_blank"
            slot-scope="{ hover }"
            :class="`elevation-${hover ? 12 : 2}`"
            class="mx-auto"

          >
            <v-img :src="web.imgsrc" aspect-ratio="1.618"></v-img>
            <v-card-title primary-title>
              <v-layout justify-space row fill-height>
                <v-flex>
                  <h3>{{web.name}}</h3>
                  <div>{{web.description_html}}</div>
                </v-flex>
              </v-layout>
            </v-card-title>
          </v-card>
        </v-hover>
      </v-flex>
    </v-layout>
  </v-container>

</template>

<script>
import mmaPNG from '@/assets/images/mma.ooo.png';
import lixPNG from '@/assets/images/lixuan.xyz.png';
import shuxue6PNG from '@/assets/images/shuxue6.com.png';

export default {
  name: 'PageHome',
  data() {
    return {
      myWeb: [
        {
          name: 'Mathematica问答社区',
          href: 'https://mmaqa.com',
          imgsrc: mmaPNG,
          description_html: '创办于2016-04-01',
          size: 3,
        },
        {
          name: '我的博客',
          href: 'https://lixuan.xyz/blog/',
          imgsrc: lixPNG,
          description_html: '创办于2014-01-10',
          size: 4,
        },
        {
          name: '数学之路',
          href: 'http://shuxue6.com/',
          imgsrc: shuxue6PNG,
          description_html: '创办于2011年，已经不再维护',
          size: 3,
        },
      ],
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .v-card {
    border-radius: 10px;
    border: 2px double  rgba(0,0,32,0.3);
  }
  .v-img {
    border-bottom: 1px solid #333;
  }
  .v-card__title.v-card__title--primary {
    background-color: #dedcd4;
    padding-top: 18px;
    border-top: 1px dashed rgba(0,0,0,0.3);
  }

</style>
