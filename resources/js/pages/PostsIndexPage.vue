<template>
    <div>
        <div v-if="loading">Loading</div>
        <!-- <div v-else-if="errorMessage != null">{{errorMessage}}</div> -->
        <PostListComponent v-else :postPageList="posts"
        @clickedPost="showPost" @requestPage="loadPage" />
    </div>
    </template>

    <script>

    import PostListComponent from '../components/PostListComponent.vue';

    export default {
        name:'PostsIndexPage',
        components:{
            PostListComponent
        },
        data() {
            return{
                posts:undefined,
                detail:null,
                // errorMessage: null,
                loading: true
            }
        },
        mounted(){
            this.loadPage('api/posts?page=' + this.$route.query.page)
        },
        methods: {
            loadPage(url){
                console.log(url)
                axios.get(url)
                .then(({data})=>{
                    if(data.success){
                        this.posts= data.results
                    }else{
                        // this.errorMessage = data.error
                        this.$route.push({name: 'NotFound'});
                    }
                    this.loading = false;
                })
                .catch( e=>{
                        console.log('errore', e);
                        this.loading = false;
                    })
            },

            showPost(id){
                console.log("showPost(id):",id)
                this.$router.push('/posts/' + id)
            }
        },
    }
    </script>

    <style lang="scss" scoped>

    </style>
