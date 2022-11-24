<template>
     <div>
     <router-view></router-view>
     </div>
</template>

<script>
import PostsComponent from '../pages/PostsComponent.vue';
import NotFoundComponent from '../pages/NotFoundComponent.vue'

export default {
     name:'App',
     components: {
        PostsComponent,
        NotFoundComponent
    }
}
</script>

<style>

</style>
