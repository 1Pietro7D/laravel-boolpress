import Vue from 'vue';
import VueRouter from 'vue-router';
import PostsComponent from './pages/PostsComponent';
import NotFoundComponent from './pages/NotFoundComponent'

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
      // dynamic segments start with a colon
      { path: '/', name: 'home', component: PostsComponent },
      //questa rotta va tenuta sempre per ultima..
      { path: '/*', name: 'NotFound', component: NotFoundComponent }
    ]
  });
// Home.vue
export default router;
