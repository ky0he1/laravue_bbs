<template>
  <div>

    <!-- 切り替えボタンの設定 -->
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
      {{ modalTitle }}
    </button>

    <!-- モーダルの設定 -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{ modalTitle }}内容</h5>
          </div>
          <div class="modal-body">
            <textarea :placeholder="modalTitle + '内容を記入'"
                      v-model="userInput"
                      class="form-control"
                      rows="5"
            ></textarea>
          </div>
          <div class="modal-footer">
            <button @click="userInput=''"
                    type="button"
                    class="btn btn-outline-secondary"
                    data-dismiss="modal"
            >閉じる</button>
            <button @click="passUserInput"
                    data-dismiss="modal"
                    type="button"
                    class="btn btn-primary"
            >送信</button>
          </div><!-- /.modal-footer -->
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

  </div>
</template>

<script>
export default {
  data () {
    return {
      userInput: '',
    }
  },

  props: ['modalTitle'],

  methods: {
    passUserInput: function() {
      this.$emit('sendUserInput', this.userInput)
      this.userInput = ''
    },
  }
}
</script>
