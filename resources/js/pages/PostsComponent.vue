<template>
<div>
    <div v-if="loading">Loading</div>
    <div v-else-if="errorMessage != null">{{errorMessage}}</div>
    <PostListComponent v-else-if="detail == null" :postPageList="posts" @clickedPost="showPost" @requestPage="loadPage" />
    <PostComponent v-else :post="detail" @clickedReturnList="returnList"/>
</div>
</template>

<script>

import PostComponent from '../components/PostComponent.vue'
import PostListComponent from '../components/PostListComponent.vue'

export default {
    name:'PostsComponent',
    components:{
        PostComponent,
        PostListComponent
    },
    data() {
        return{
            posts:undefined, //perchè contiene un oggetto con lista e le informazioni sulla pag di dati (pag corrente, tot pag)
            detail:null,
            errorMessage: null,
            loading: true
        }
    },
    mounted(){
        this.loadPage('api/posts')
    },
    methods: {
        loadPage(url){
            axios.get(url)
            .then(({data})=>{
                if(data.success){
                    console.log(data.result);
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
