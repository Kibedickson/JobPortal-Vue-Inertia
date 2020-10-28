<template>
    <div>
        <navbar></navbar>
        <slot></slot>
    </div>
</template>

<script>
import NavBar from "./Shared/NavBar";
import Toast from "./Shared/Toast"
export default {
    name: "App",
    components: {
        'navbar': NavBar,
        'toast': Toast
    }
}
</script>

<style scoped>
    
</style>
