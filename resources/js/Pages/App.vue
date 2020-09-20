<template>
    <div>
        <navbar></navbar>
        <slot></slot>
    </div>
</template>

<script>
import NavBar from "./Shared/NavBar";
export default {
    name: "App",
    components: {
        'navbar': NavBar
    }
}
</script>

<style scoped>

</style>
