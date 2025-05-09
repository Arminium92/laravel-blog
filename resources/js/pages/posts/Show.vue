<script setup>

defineProps({post:Object})
</script>

<template>
    <h1 class="text-2xl text-blue-500 text-center my-3">{{ post.title }}</h1>
    <p v-html="post.body">
    </p>
    <p>
        {{ post.body }}
    </p>
</template>

<style scoped>

</style>
