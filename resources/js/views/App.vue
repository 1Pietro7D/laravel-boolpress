<template>
    <div>
        <NavComponent />
        <router-view></router-view>
    </div>
</template>

<script>
import PostsComponent from '../pages/PostsComponent.vue';
import NotFoundComponent from '../pages/NotFoundComponent.vue';
import NavComponent from '../components/NavComponent.vue';

export default {
     name:'App',
     components: {
        PostsComponent,
        NotFoundComponent,
        NavComponent

    }
}
</script>

<style>

</style>
