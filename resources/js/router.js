import Vue from 'vue';
import VueRouter from 'vue-router';
// import PostsPage from './pages/PostsPage';
import PostsIndexPage from './pages/PostsIndexPage';
import HomePage from './pages/HomePage';
import AboutPage from './pages/AboutPage';
import ContactsPage from './pages/ContactsPage';
import NotFoundComponent from './pages/NotFoundComponent'

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
      // dynamic segments start with a colon
      //   { path: '/', name: 'home', component: PostsPage },
      { path: '/', name: 'home', component: HomePage },
      { path: '/posts',
        name: 'posts-index',
        component: PostsIndexPage,
        props: route => ({ page: route.query.page })
     },
      { path: '/about', name: 'about', component: AboutPage },
      { path: '/contacts', name: 'contacts', component: ContactsPage },

      //questa rotta va tenuta sempre per ultima..
      { path: '/*', name: 'NotFound', component: NotFoundComponent }
    ]
  });
// Home.vue
export default router;
