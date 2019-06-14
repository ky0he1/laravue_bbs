<template>
  <div class="container mt-4">

    <h1>掲示板</h1>
    
    <Modal @sendUserInput="sendUserInput" :modalTitle="modalTitle"/>
    
    <div class="card">
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li v-for="post in posts" :key="post.id" class="list-group-item">
            <p><i class="fas fa-user mr-2"></i>サンプルユーザー</p>
            <p class="ml-2">{{ post.post }}</p>
            <p class="text-right">{{ post.created_at }}</p>
            <p class="text-right">
              <router-link :to="`/Posts/${post.id}`">詳細へ</router-link>
            </p>
          </li>
        </ul>
      </div>
    </div>

  </div>
</template>

<script>
import Modal from '../components/Modal'

export default {
  components: {
    Modal
  },

  data () {
    return {
      modalTitle: '投稿',
      posts: [],
      userInput: {
        'post': '',
        'user_id': 1 // test user
      }
    }
  },

  created () {
    this.getData()
  },

  methods: {
    debugLog: function() {
      console.log("========== debugLog ==========")
      console.log(this.userInput)
    },

    getData() {
      axios.get('/api/posts')
      .then(response => {
        this.posts = response.data.posts
      })
      .catch(error => {
        console.log(error.message)
      })
    },

    sendUserInput (payload) {
      this.userInput.post = payload
      console.log(this.userInput)

      axios.post('/api/posts', this.userInput)
      .then(response => {
        this.getData()
      })
      .catch(error => {
        console.log(error)
      })
    },

  }
}
</script>
