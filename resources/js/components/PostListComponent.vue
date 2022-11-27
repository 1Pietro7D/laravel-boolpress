<template>
  <div v-if="postList.length>0">
    <div v-for="post in postList" :key="post.id">
        <span @click="showPost(post.id)" >{{ post.title }}</span>
    </div>
    <!-- controller page -->
    <div class="my-2">
        <!-- previous btn -->
        <button :class="{ 'disable' : !postPageList.prev_page_url }" @click="goToPage(postPageList.prev_page_url, currentPage - 1)">Previous page</button>
        <!-- end previous btn -->
        <span>{{ currentPage }}/{{ totalPages }}</span>
        <!-- next btn -->
        <button :class="{ 'disable' : !postPageList.next_page_url }" @click="goToPage(postPageList.next_page_url, currentPage + 1)">Next page</button>
         <!-- end next btn -->
    </div>
  </div>
  <div v-else>Nothing post</div>
</template>

<script>

export default {
    name: 'PostListComponent',
    // quando un dato deriva direttamente da un altro si usa il computed property per una questione di performance
    // nella computed ci vanno delle funzioni ma che vengono implementate come se fosserò delle variabili
    computed:{
        postList(){
            return this.postPageList.data;
        },
        currentPage(){
            return this.postPageList.current_page;
        },
        totalPages(){
            return Math.ceil(this.postPageList.total / this.postPageList.per_page) ;
        }
     },
    props:{
        postPageList: Object
    },
    methods: {
        showPost(id){
           this.$emit('clickedPost', id)
        },
        goToPage(url, pageNumber){
            if (url) {
                this.$router.push({ path: '/posts', query: { page: pageNumber } })
                this.$emit('requestPage', url)
            }

        }
    }
}
</script>

<style lang="scss" scoped>
    button.disable{
        opacity: 0.5;
        pointer-events: none;
    }
</style>
