<template>
  <nav>
    <ul class="d-flex gap-2">
        <li v-for="link,i in navList" :key="i">
            <router-link :to="link.path">{{ link.label }}</router-link>
        </li>
    </ul>
  </nav>
</template>

<script>
export default {
    name: "NavComponent",
    props:{
        navList: Array
    }
}
</script>

<style lang="scss" scoped>
nav{
    background-color: aqua;
    li{
        list-style-type:none;
        margin-right: 1rem;
        text-transform: capitalize;
        a{
            color: black;
        }
    }
}
</style>
