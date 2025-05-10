<script setup>
import { Link } from '@inertiajs/vue3';
import axios from 'axios';
import { onMounted, ref } from 'vue';

const posts = ref([])

const getAllPosts = function(){
  axios.get('/api/posts').then(response => {
    console.log(response.data);
    posts.value = response.data.data
  })
}

onMounted(()=>{
  getAllPosts();
})
</script>

<template>
<h1 class="text-2xl text-blue-500 text-center my-3">Posts</h1>
<hr>
<ul v-if="posts.length > 0">
  <li v-for="post in posts" class="text-white">
   <Link :href="route('inertia.posts.show', post.id)">
  {{ post.title }}
</Link>
  </li>
</ul>
</template>

<style scoped>

</style>