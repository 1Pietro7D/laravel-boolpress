<template>
<div>
    <div v-if="loading">Loading</div>
    <div v-else-if="errorMessage != null">{{errorMessage}}</div>
    <PostListComponent v-else-if="detail == null" :postList="posts" @clickedPost="showPost" />
    <PostComponent v-else :post="detail" @clickedReturnList="returnList"/>
</div>
</template>

<script>

import PostComponent from './PostComponent.vue'
import PostListComponent from './PostListComponent.vue'

export default {
    name:'PostsComponent',
    components:{
        PostComponent,
        PostListComponent
    },
    data() {
        return{
            posts:[],
            detail:null,
            errorMessage: null,
            loading: true
        }
    },
    mounted(){
        console.log('miao')
        axios.get('api/posts')
        .then(({data})=>{
            if(data.success){
            this.posts= data.results
            }else{
                this.errorMessage = data.error
            }
            this.loading = false;
        })
        .catch( e=>{
                console.log('errore', e);
                this.loading = false;
            })
    },
    methods: {
        showPost(id){
            console.log(id + "bravo")
            this.loading= true;
            axios.get('api/posts/' + id)
            .then(({data})=>{
                console.log(data.result);
                this.detail=data.result;
                this.loading = false;
            })
            .catch( e=>{
                console.log('errore', e);
                this.loading = false;
            })
            },
        returnList(confirm){
            if (confirm) {
                this.detail= null;
            }
        }
    },
}
</script>

<style lang="scss" scoped>

</style>
