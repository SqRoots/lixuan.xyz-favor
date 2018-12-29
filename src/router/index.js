import Vue from 'vue';
import Router from 'vue-router';
import Home from './Home';
import Web from './Web';
import Data from './Data';
import Software from './Software';
import Motto from './Motto';
import About from './About';

Vue.use(Router);

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home,
    },
    {
      path: '/web.html',
      name: 'Web',
      component: Web,
    },
    {
      path: '/data.html',
      name: 'Data',
      component: Data,
    },
    {
      path: '/software.html',
      name: 'Software',
      component: Software,
    },
    {
      path: '/motto.html',
      name: 'Motto',
      component: Motto,
    },
    {
      path: '/about.html',
      name: 'About',
      component: About,
    },
  ],
});
