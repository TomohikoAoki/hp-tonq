<template>
  <div class="confirm">
    <div class="confirm-content" id="confirm-content">
      <div class="confirm-title">内容確認<span>confirm</span></div>
      <dl class="data-area">
        <div
          v-for="(value, key) in confirmData"
          :key="key"
          class="confirm-data-group"
        >
          <dt class="confirm-data-key">{{ changeLabels(key) }}</dt>
          <dd class="fonfirm-data-value">{{ value }}</dd>
        </div>
      </dl>
      <div class="note-area">
        <p>問題がなければ<span class="send">【送信】</span>ボタンを押してください。</p>
        <p>修正点があれば<span class="back">【修正】</span>ボタンを押して修正してください。</p>
      </div>
      <div class="btn-area">
        <button class="btn send" @click="sendMail">送信</button>
        <button class="btn back" @click="close">修正</button>
      </div>
    </div>
  </div>
</template>

<script>
import {
  disableBodyScroll,
  enableBodyScroll,
  clearAllBodyScrollLocks,
} from "body-scroll-lock";
const axios = require("axios");

export default {
  data() {
    return {
      testData: {
        name: '青木 智彦',
        email: 'aoki@ton-q.com',
        phoneNumber: '09024270056',
        gender: '男性',
        zipCode: '3050045',
        address: '茨城県つくば市梅園2-17-4',
        shop: 'つくば本店',
        content: 'テストデータの内容です。送信してもメールは送れません。'
      },
      labels: {
        name: "名前",
        email: "メールアドレス",
        phoneNumber: "電話番号",
        gender: "性別",
        zipCode: "郵便番号",
        address: "住所",
        shop: "店舗",
        content: "お問い合わせ内容",
      },
    };
  },
  props: ["confirmData"],
  methods: {
    close() {
      this.$emit("input", false);
    },
    async sendMail() {
      this.$nuxt.$loading.start()
      await axios
        .post("/send_email/", { mode: "send" })
        .then((response) => {
          this.$nuxt.$loading.finish()
          this.$emit('success',response)
        })
        .catch((error)=> {
          this.$nuxt.$loading.finish()
          this.$store.dispatch('error/catchError', error.response)
        });
    },
    changeLabels(key) {
      return this.labels[key];
    },
  },
  mounted() {
    const modal = document.querySelector(".confirm-content");
    disableBodyScroll(modal);
  },
  beforeDestroy() {
    clearAllBodyScrollLocks();
  },
};
</script>

<style lang="scss" scoped>
.confirm {
  width: 100vw;
  height: 100vh;
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.8);
  z-index: 999;
  padding: 50px 0;
  overflow: scroll;

  .confirm-content {
    width: 90%;
    max-width: 1000px;
    margin: 0 auto;
    background-color: #fff;
    padding: 50px 4%;

    .confirm-title {
      text-align: center;
      font-weight: bold;
      font-size: 1.5em;
      padding: 0 0 20px 0;
      span {
        font-size: 0.7em;
        display: block;
        line-height: 0.8em;
        font-weight: normal;
      }
    }
    .data-area {
      .confirm-data-group {
        display: flex;
        padding: 1.2em 1em;
        border-bottom: 1px dotted #666;
        .confirm-data-key {
          min-width: 150px;
        }
        .confirm-data-value {
          line-height: 1.4em;
        }
      }
    }
  }
}
.note-area {
  text-align: center;
  padding: 3em 0 1.5em 0;
  p {
    padding-bottom: 0.6em;
    .send {
      color: rgb(48, 59, 83);
    }
    .back {
      color: rgb(83, 48, 59);
    }
  }
}
.btn-area {
  display: flex;
  padding: 40px 0 0 0;
  max-width: 500px;
  margin: 0 auto;
  .btn {
    display: block;
    color: #fff;
    font-weight: bold;
    width: 100px;
    padding: 0.9em 0;
    text-align: center;
    border-radius: 5px;
    margin: 0 auto;
    letter-spacing: 0.2em;
    &.send {
      background-color: rgb(48, 59, 83);
    }
    &.back {
      background-color: rgb(83, 48, 59);
    }
  }
}
</style>
