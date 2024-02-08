import './bootstrap';
import { createApp } from 'vue';
import HeaderSite from './components/HeaderSite.vue';

createApp({})
  .component('HeaderSite', HeaderSite)
  .mount('#app')
