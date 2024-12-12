import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import Pesquisa from '../views/Pesquisa.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/pesquisa',
    name: 'Pesquisa',
    component: Pesquisa,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
