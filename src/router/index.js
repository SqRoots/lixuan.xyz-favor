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
      path: '/favor/',
      name: 'Home',
      component: Home,
    },
    {
      path: '/favor/web.html',
      name: 'Web',
      component: Web,
    },
    {
      path: '/favor/data.html',
      name: 'Data',
      component: Data,
    },
    {
      path: '/favor/software.html',
      name: 'Software',
      component: Software,
    },
    {
      path: '/favor/motto.html',
      name: 'Motto',
      component: Motto,
    },
    {
      path: '/favor/about.html',
      name: 'About',
      component: About,
    },
  ],
});
