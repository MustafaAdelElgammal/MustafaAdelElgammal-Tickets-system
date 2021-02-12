import { createWebHistory, createRouter } from "vue-router";
import userslist from '../components/users/List.vue';

const routes = [
  {
    path: "users/list",
    name: "userslist",
    component: userslist,
    props: true
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;