// app.js

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import HomeComponent from './components/HomeComponent.vue';
import CreatePostComponent from './components/CreatePostComponent.vue';
import PostIndexComponent from './components/PostIndexComponent.vue';
import PostEditComponent from './components/PostEditComponent.vue';


import CategoryIndexCompotent from './components/CategoryIndexCompotent.vue';
import CreateCategoryComponent from './components/CreateCategoryComponent.vue';
import CategoryEditComponent from './components/CategoryEditComponent.vue';
 

const routes = [
  {
      name: 'home',
      path: '/',
      component: HomeComponent
  },
  {
      name: 'post/create',
      path: '/adminpanel/admin/post/create',
      component: CreatePostComponent
  },
  {
      name: 'posts',
      path: '/adminpanel/admin/posts',
      component: PostIndexComponent
  },
  {
      name: 'post/edit',
      path: '/adminpanel/admin/post/edit/:id',
      component: PostEditComponent
  },
  {
      name: 'category',
      path: '/adminpanel/admin/category',
      component: CategoryIndexCompotent
  },
  {
      name: 'category/create',
      path: '/adminpanel/admin/category/create',
      component: CreateCategoryComponent
  },
  {
      name: 'category/edit',
      path: '/adminpanel/admin/category/edit/:id',
      component: CategoryEditComponent
  },
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');