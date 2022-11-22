<template>
<div>
    <div v-if="loading">Loading</div>
    <div v-else-if="errorMessage != null">{{errorMessage}}</div>
    <div v-else v-for="post in posts" :key="post.id">
     <span @click="showPost(post.id)" >{{ post.title }}</span>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return{
            posts:[],
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
        .catch()
    },
    methods: {
        showPost(id){
            console.log(id + "bravo")
            this.loading= true;
            axios.get('api/posts/' + id)
            .then(({data})=>{
                console.log(data.result);
                this.loading = false;
            })
            .catch( e=>{
                console.log('errore', e);
                this.loading = false;
            })
            }
    },
}
</script>

<style lang="scss" scoped>

</style>
