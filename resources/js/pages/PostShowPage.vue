<template>
    <div v-if="loading">Loading</div>
    <div v-else>
        <h1>Title: {{ post.title }}</h1>
        <div>Content: {{ post.content }}</div>
        <div>Tags:<span v-for="tag in post.tags" :key="tag.id">{{ tag.name }}</span></div>
        <div>Category:{{ post.category.name }}</div>
    </div>
</template>

<script>
export default {
    name: 'PostShowPage',
    data() {
        return {
            post: undefined,
            loading: true
        }
    },
    mounted(){
        const id = this.$route.params.id;
        this.loadPage('api/posts/' + id);
    },
    methods: {
        loadPage(url){
            axios.get(url)
            .then(({data})=>{
                if(data.success){
                    this.post = data.result;
                    this.loading = false;
                }else{
                    this.$route.push({name: 'NotFound'});
                }

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
