<template>
  <nav>
    <ul class="d-flex gap-2">
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/about">About</router-link></li>
        <li><router-link to="/contacts">Contacts</router-link></li>

    </ul>
  </nav>
</template>

<script>
export default {
    name: "NavComponent"
}
</script>

<style lang="scss" scoped>
nav{
    background-color: aqua;
    li{
        list-style-type:none;
        margin-right: 1rem;
        a{
            color: black;
        }
    }
}
</style>
