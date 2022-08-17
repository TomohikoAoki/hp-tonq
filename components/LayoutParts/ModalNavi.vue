<template>
  <div class="nav-layer">
    <nav class="modal-nav">
      <ul>
        <li><nuxt-link to="/">ホーム</nuxt-link></li>
        <li><nuxt-link to="/menu">御品書</nuxt-link></li>
        <li><nuxt-link to="/kodawari">こだわり</nuxt-link></li>
        <li><nuxt-link to="/shop">店舗紹介</nuxt-link></li>
      </ul>
    </nav>
    <div @click="closeModal"><span>クローズ</span></div>
  </div>
</template>

<script>
import {
  disableBodyScroll,
  enableBodyScroll,
  clearAllBodyScrollLocks,
} from 'body-scroll-lock'


export default {
  methods: {
    closeModal() {
      this.$store.dispatch('options/changeModalNav', false)
    }
  },
  mounted() {
    const modal = document.querySelector('.modal-nav')
    disableBodyScroll(modal)
  },

  beforeDestroy() {
    clearAllBodyScrollLocks()
  }
}

</script>

<style lang="scss">
.nav-layer {
  position: fixed;
  background-color: rgba(255, 255, 255, 0.7);
  width: 100%;
  height: 100vh;
  z-index: 9999;
  top: 0;
  left: 0;
  .modal-nav {
    ul {
      li {
        text-align: center;
        font-size: 2.0em;
        a {}
      }
    }
  }
}
</style>
