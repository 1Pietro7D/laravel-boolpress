<template>
    <div>
      <h2>{{post.title}}</h2>
      <p>{{post.content}}</p>
      <a href="" @click="returnList">Back</a>
    </div>
  </template>

  <script>
  export default {
      name: "PostComponent",
      props:{
          post: Object
      },
      methods: {
        returnList(){
            this.$emit('clickedReturnList', true)
        }
      }
  }
  </script>

  <style lang="scss" scoped>

  </style>
