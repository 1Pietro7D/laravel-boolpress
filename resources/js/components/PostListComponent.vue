<template>
  <div>
    <div v-for="post in postList" :key="post.id">
        <span @click="showPost(post.id)" >{{ post.title }}</span>
    </div>
  </div>
</template>

<script>
export default {
    name: 'PostListComponent',
    props:{
        postList: Array
    },
    methods: {
        showPost(id){
            this.emit('clickedPost', id)
        }
    },
}
</script>

<style lang="scss" scoped>

</style>
