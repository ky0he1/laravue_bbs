<template>
  <div class="container mt-4">
    <h1>掲示板</h1>
    <div class="card">
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li v-for="post in posts" :key="post.id" class="list-group-item">
            <p><i class="fas fa-user mr-2"></i>サンプルユーザー</p>
            <p class="ml-2">{{ post.post }}</p>
            <p class="text-right">{{ post.created_at }}</p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      posts: [],
    }
  },

  created () {
    axios.get('/api/posts')
      .then(response => {
        this.posts = response.data.posts
        console.log(this.posts)
      })
      .catch(error => {
        console.log(error)
      })
  }
}
</script>
