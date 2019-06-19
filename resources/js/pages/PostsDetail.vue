<template>
  <div>

    <h1>詳細</h1>

    <div class="card mb-4">
      <h5 class="card-header">投稿</h5>
      <div class="card-body">
        <div class="card-text">
          <p><i class="fas fa-user mr-2"></i>サンプルユーザー</p>
            <p class="ml-2">{{ post.post }}</p>
            <p class="text-right">{{ post.created_at }}</p>
            <div class="row justify-content-end">
              <router-link to="/" class="mr-2"><button class="btn btn-outline-secondary">戻る</button></router-link>
              <Modal @sendUserInput="sendUserInput" :modalTitle="modalTitle" class="mr-3" />
            </div>
        </div>
      </div>
    </div>

    <div class="card">
      <h5 class="card-header">コメント一覧</h5>
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li v-for="(comment, index) in post.comments" :key="index" class="list-group-item">
            <p><i class="fas fa-user mr-2"></i>サンプルユーザー</p>
            <p class="ml-2">{{ comment.comment }}</p>
            <p class="text-right">{{ comment.created_at }}</p>
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
      modalTitle: 'コメント',
      post: {},
      userInput: {
        'comment': '',
        'post_id': '',
        'user_id': 1,     // test user
      }
    }
  },


  created () {
    this.getData()
  },

  methods: {
    getData () {
      axios.get(`/api/posts/${this.$route.params.id}`)
        .then(response => {
          this.post = response.data.post
        })
        .catch(error => {
          console.log(error)
        })
    },

    sendUserInput (payload) {
      this.userInput.comment = payload
      this.userInput.post_id = Number(this.$route.params.id)

      axios.post('/api/comments', this.userInput)
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
