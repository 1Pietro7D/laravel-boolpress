<template>
    <div>
      <h2>{{post.title}}</h2>
      <p>{{post.content}}</p>
      <a href="\">Back</a>
    </div>
  </template>

  <script>
  export default {
      name: "PostComponent",
      props:{
          post: Object
      }
  }
  </script>

  <style lang="scss" scoped>

  </style>
