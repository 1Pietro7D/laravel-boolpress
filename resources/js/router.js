import Vue from 'vue';
import VueRouter from 'vue-router';
import PostsPage from './pages/PostsPage';
import NotFoundComponent from './pages/NotFoundComponent'

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
      // dynamic segments start with a colon
      { path: '/', name: 'home', component: PostsPage },
      //questa rotta va tenuta sempre per ultima..
      { path: '/*', name: 'NotFound', component: NotFoundComponent }
    ]
  });
// Home.vue
export default router;
