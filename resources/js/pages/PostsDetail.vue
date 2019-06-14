<template>
  <div class="container mt-4">

    <h1>詳細</h1>

    <div class="card">
      <div class="card-body">
        <div class="card-text">
          <p><i class="fas fa-user mr-2"></i>サンプルユーザー</p>
            <p class="ml-2">{{ post.post }}</p>
            <p class="text-right">{{ post.created_at }}</p>
            <div class="row justify-content-end">
              <router-link to="/" class="mr-2"><button class="btn btn-outline-secondary">戻る</button></router-link>
              <Modal @setUserInput="setUserInput" :modalTitle="modalTitle" class="mr-3" />
            </div>
        </div>
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
      post: []
    }
  },


  created () {
    axios.get(`/api/posts/${this.$route.params.id}`)
      .then(response => {
        this.post = response.data.post
      })
      .catch(error => {
        console.log(error)
      })
  },

  methods: {
    setUserInput (payload) {
      this.userInput = payload
    }
  }
}
</script>
