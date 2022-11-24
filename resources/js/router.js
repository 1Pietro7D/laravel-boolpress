import Vue from 'vue';
import VueRouter from 'vue-router';
import PostsPage from './pages/PostsPage';
import AboutPage from './pages/AboutPage';
import ContactsPage from './pages/ContactsPage';
import NotFoundComponent from './pages/NotFoundComponent'

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
      // dynamic segments start with a colon
      { path: '/', name: 'home', component: PostsPage },
      { path: '/about', name: 'about', component: AboutPage },
      { path: '/contacts', name: 'contacts', component: ContactsPage },
      //questa rotta va tenuta sempre per ultima..
      { path: '/*', name: 'NotFound', component: NotFoundComponent }
    ]
  });
// Home.vue
export default router;
