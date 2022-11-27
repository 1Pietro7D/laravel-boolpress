<template>
    <div>
        <NavComponent :navList="nav" />
        <router-view></router-view>
    </div>
</template>

<script>
// import PostsPage from '../pages/PostsPage.vue';
import PostsIndexPage from '../pages/PostsIndexPage.vue';
import NotFoundComponent from '../pages/NotFoundComponent.vue';
import NavComponent from '../components/NavComponent.vue';

export default {
     name:'App',
     data() {
        return {
            nav:[
                {
                    label:'home',
                    path: '/'
                },
                {
                    label:'blog',
                    path: '/posts'
                },
                {
                    label:'about',
                    path: '/about'
                },
                {
                    label:'contacts',
                    path: '/contacts'
                }

            ]
        }
     },
     components: {
        // PostsPage,
        PostsIndexPage,
        NotFoundComponent,
        NavComponent

    }
}
</script>

<style>

</style>
