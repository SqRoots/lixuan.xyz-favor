import '@fortawesome/fontawesome-free/css/all.css';
import axios from 'axios';
import 'babel-polyfill';
import Vue from 'vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import App from './App';
import router from './router';

axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

Vue.use(Vuetify, {
  iconfont: 'fa',
});

Vue.config.productionTip = false;
Vue.prototype.$axios = axios;

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  render: h => h(App),
});
