<template>
  <div class="error500">
    <p>サーバーエラーです。</p>
    <p>{{ message }}</p>
    <p>STATUS CODE: {{ code }}</p>
    <nuxt-link to="/" class="btn home">ホームに戻る</nuxt-link>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
  computed: {
    ...mapGetters({
      message: 'error/getErrorMessage',
      code: 'error/getErrorCode'
    })
  }

}
</script>

<style lang="scss" scoped>
.error500 {
  height: 70vh;
}
.btn.home {
    display: block;
    width: 150px;
    background-color: #666;
    text-align: center;
    padding: 1em 0;
    border-radius: 10px;
    color: #fff;
    font-weight: bold;
    margin: 50px auto 0 auto;
  }
</style>
