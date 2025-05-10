<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';

const comments = ref([]);

const fetchComments = async () => {
  try {
    const { data } = await axios.get('/api/comments');
    comments.value = data.data;
  } catch (error) {
    console.error('Error fetching comments:', error);
  }
};

onMounted(fetchComments);
</script>

<template>
<h1 class="text-2xl text-blue-500 text-center my-3">Comments</h1>
<hr>
<ul v-if="comments.length > 0">
  <li v-for="comment in comments" class="text-white">
   <!-- <Link :href="route('inertia.posts.show', post.id)">
  {{ post.title }}
</Link> -->
<h3>
Auhtor:{{ comment.author }}
</h3>

<p>Comment:{{ comment.body }}</p>
<br>
<hr>

</li>
</ul>
</template>

<style scoped>

</style>