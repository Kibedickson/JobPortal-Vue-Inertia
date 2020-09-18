<template>
    <button :disabled="loading" class="btn btn-common">
        <div v-if="">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <span class="sr-only">Loading...</span>
        </div>
    </button>
</template>

<script>
export default {
    name: "LoadingButton",
    props: {
        loading: Boolean,
    }
}
</script>

<style scoped>

</style>
