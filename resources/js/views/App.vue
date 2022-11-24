<template>
    <div>
        <NavComponent />
        <router-view></router-view>
    </div>
</template>

<script>
import PostsPage from '../pages/PostsPage.vue';
import NotFoundComponent from '../pages/NotFoundComponent.vue';
import NavComponent from '../components/NavComponent.vue';

export default {
     name:'App',
     components: {
        PostsPage,
        NotFoundComponent,
        NavComponent

    }
}
</script>

<style>

</style>
