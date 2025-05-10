<script setup>

defineProps({post:Object})
</script>

<template>

  <h1>Show Post</h1>
<hr>
<h1>{{ post?.title }}</h1>

<p v-html="post.body"></p>
</template>

<style scoped></style>