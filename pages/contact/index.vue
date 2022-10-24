<template>
  <div class="contact">
    <div class="content-contact" v-if="showForm">
      <h1 class="contact-title">お問い合わせ<span>contact</span></h1>
      <section class="section contact-tel">
        <h2 class="section-title">お電話</h2>
        <div class="tell-contact">
          <p class="tell-contact__title">とんきゅう株式会社本部</p>
          <p class="tell-contact__number"><span>0120-917-163</span></p>
          <p class="tell-contact__time">受付時間：月～金曜日　9：00～17：00</p>
        </div>
        <div class="shop">
          <h3 class="shop__title">
            テイクアウトのご注文は<br />各店舗にて承ります。
          </h3>
          <div class="shop-tell-area">
            <div
              class="shop-tell"
              v-for="(shop, index) in shopData"
              :key="index"
            >
              <h4 class="shop-tell__name">
                {{ shop.name.replace("とんかつとんＱ", "") }}
              </h4>
              <p class="shop-tell__number">{{ shop.telephone }}</p>
            </div>
          </div>
        </div>
      </section>
      <section class="section contact-mail">
        <h2 class="section-title">メール</h2>
        <p class="dd-top">下記のフォームより送信してください。</p>
        <p class="form-info">
          いただいたお問い合わせにつきましては、できるだけ迅速にご回答を差し上げるように努めますが、内容によりましてはお時間をいただく場合もございます。<br />
          また、土曜、日曜、祝日、弊社休業期間、及び弊社本部営業時間外にいただいたお問い合わせにつきましては、翌営業日以降の受付とさせていただきます。
          <br />
        </p>
        <div class="form-info">
          <ul class="note">
            <li>
              ドメイン指定受信を設定している方は 『ton-q.com』
              を許可するドメインに追加して下さい。
            </li>
            <li>
              とんＱの店舗では、平等性を保つために基本予約は受付をしておりません。ご理解いただきますようお願い申し上げます。
            </li>
            <li>
              お弁当の注文はメールでは受け付けておりません。直接店舗にお電話でお問い合わせ下さい。
            </li>
          </ul>
        </div>
        <ValidationObserver ref="obs" v-slot="ObserverProps">
          <form class="contact-form">
            <div class="form-group">
              <label class="label">名前<span class="required">必須</span></label>
              <div class="input-area name">
                <ValidationProvider
                  v-slot="{ errors }"
                  rules="required|max:10"
                  name="lastName"
                  class="name-input"
                >
                  <input
                    v-model="formData.lastName"
                    type="text"
                    class="form-input style02"
                    placeholder="氏名"
                  />
                  <span class="error">
                    {{ errors[0] }}
                  </span>
                </ValidationProvider>
                <ValidationProvider
                  v-slot="{ errors }"
                  rules="required|max:10"
                  name="firstName"
                  class="name-input"
                >
                  <input
                    v-model="formData.firstName"
                    type="text"
                    class="form-input style02"
                    placeholder="名前"
                  />
                  <span class="error">
                    {{ errors[0] }}
                  </span>
                </ValidationProvider>
              </div>
            </div>
            <div class="form-group">
              <label class="label">メールアドレス<span class="required">必須</span></label>
              <ValidationProvider
                v-slot="{ errors }"
                rules="required|email"
                name="email"
                class="input-area"
              >
                <input
                  v-model="formData.email"
                  type="email"
                  class="form-input style02"
                  placeholder="example@ton-q.com"
                />
                <span class="error">
                  {{ errors[0] }}
                </span>
              </ValidationProvider>
            </div>
            <div class="form-group">
              <label class="label">メールアドレス(確認)<span class="required">必須</span></label>
              <ValidationProvider
                v-slot="{ errors }"
                rules="required|confirmed:email"
                name="emailConfirmed"
                class="input-area"
              >
                <input
                  v-model="formData.emailConfirmed"
                  type="email"
                  class="form-input style02"
                />
                <span class="error">
                  {{ errors[0] }}
                </span>
              </ValidationProvider>
            </div>
            <div class="form-group">
              <label class="label">電話番号<span class="required">必須</span></label>
              <ValidationProvider
                v-slot="{ errors }"
                rules="required|phoneNumber"
                name="phoneNumber"
                class="input-area"
              >
                <input
                  v-model="formData.phoneNumber"
                  type="tel"
                  inputmode="numeric"
                  pattern="^[0-9]+$"
                  class="form-input style01"
                  placeholder="0000000000"
                />
                <span class="error">
                  {{ errors[0] }}
                </span>
              </ValidationProvider>
            </div>
            <div class="form-group">
              <label class="label">性別</label>
              <div class="input-area">
                <label class="radio">
                  <input
                    name="radio_group_1"
                    value="男性"
                    type="radio"
                    v-model="formData.gender"
                  />
                  男性
                </label>
                <label class="radio">
                  <input
                    name="radio_group_1"
                    value="女性"
                    type="radio"
                    v-model="formData.gender"
                  />
                  女性
                </label>
              </div>
            </div>
            <div class="form-group">
              <label class="label">郵便番号<span class="required">必須</span></label>
              <div class="input-area">
                <ValidationProvider
                  v-slot="{ errors, passed }"
                  rules="required|zipCode"
                  name="zipCode"
                  class="input-area"
                >
                  <input
                    v-model="formData.zipCode"
                    type="text"
                    inputmode="numeric"
                    pattern="^[0-9]+$"
                    class="form-input style01"
                    placeholder="1234567"
                    @input="fetchZipCode"
                  /><button
                    @click.prevent="fetchZipCode"
                    :disabled="!passed"
                    class="btn button01"
                    :class="{ disable: !passed }"
                  >
                    住所検索
                  </button>
                  <span class="error">
                    {{ errors[0] }}
                  </span>
                </ValidationProvider>
              </div>
            </div>
            <div class="form-group">
              <label class="label">住所1<span class="required">必須</span></label>
              <ValidationProvider
                v-slot="{ errors }"
                rules="required"
                name="address"
                class="input-area"
              >
                <input
                  v-model="formData.addI"
                  type="text"
                  class="form-input style02"
                />
                <span class="error">
                  {{ errors[0] }}
                </span>
              </ValidationProvider>
            </div>
            <div class="form-group">
              <label class="label">住所2</label>
              <div class="input-area">
                <input
                  v-model="formData.addII"
                  type="text"
                  class="form-input style02"
                  placeholder="上記以下の住所"
                />
              </div>
            </div>
            <div class="form-group">
              <label class="label">店舗<span class="required">必須</span></label>
              <ValidationProvider
                v-slot="{ errors }"
                rules="required"
                name="shop"
                class="input-area"
              >
                <select v-model="formData.shop" class="form-input style02">
                  <option disabled value="">店舗をお選びください</option>
                  <option
                    v-for="(shop, index) in shopData"
                    :key="index"
                    :value="shop.name"
                  >
                    {{ shop.name.replace("とんかつとんＱ", "") }}
                  </option>
                  <option value="その他">その他</option>
                </select>
                <span class="error">
                  {{ errors[0] }}
                </span>
              </ValidationProvider>
            </div>
            <div class="form-group">
              <label class="label">お問い合わせ内容<span class="required">必須</span></label>
              <ValidationProvider
                v-slot="{ errors }"
                rules="required"
                name="content"
                class="input-area"
              >
                <textarea
                  v-model="formData.content"
                  name="content"
                  class="form-input text-area"
                ></textarea>
                <span class="error">
                  {{ errors[0] }}
                </span>
              </ValidationProvider>
            </div>
            <button
              @click.prevent="confirm"
              type="submit"
              class="btn button02"
              :class="{ disable: ObserverProps.invalid }"
              :disabled="ObserverProps.invalid || !ObserverProps.validated"
            >
              確認
            </button>
          </form>
        </ValidationObserver>
      </section>
      <contactConfirmModal
        v-if="confirmFlag"
        :confirmData="confirmData"
        v-model="confirmFlag"
        @success="success"
      ></contactConfirmModal>
    </div>
    <div class="thanks" v-else>
      <div class="test">
        <span v-html="message"></span>
      </div>
      <nuxt-link to="/" class="btn home">ホームに戻る</nuxt-link>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";

const axios = require("axios");

export default {
  data() {
    return {
      confirmFlag: false,
      confirmData: "",
      showForm: true,
      message: "",
      formData: {
        lastName: "",
        firstName: "",
        email: "",
        emailConfirmed: "",
        phoneNumber: "",
        gender: "",
        zipCode: "",
        addI: "",
        addII: "",
        shop: "",
        content: "",
      },
    };
  },
  computed: {
    ...mapState("shops", ["shopData"]),
  },
  methods: {
    //郵便番号検索
    async fetchZipCode() {
      if (this.formData.zipCode) {
        const code =
          this.formData.zipCode.slice(0, 3) +
          "-" +
          this.formData.zipCode.slice(-4);
        await axios
          .get(`http://zipcloud.ibsnet.co.jp/api/search?zipcode=${code}`)
          .then((response) => {
            let result = response.data.results[0];
            this.formData.addI =
              result["address1"] + result["address2"] + result["address3"];
          })
          .catch((error) => {
            return false
          });
      }
    },
    //post送信　確認画面表示
    async confirm() {
      this.$nuxt.$loading.start();
      this.formData.mode = "confirm";
      //空白削除
      Object.keys(this.formData).forEach((key) => {
        this.formData[key] = this.formData[key].trim().replace(/( |　)/g,"")
      })
      await axios
        .post("/send_email/", this.formData)
        .then((rps) => {
            this.$nuxt.$loading.finish();
            this.confirmFlag = true;
            this.confirmData = rps.data;
        })
        .catch((error) => {
          this.$nuxt.$loading.finish();
          if (error.response.status === 422) {
            this.$refs.obs.setErrors(error.response.data);
            return;
          }
          this.$store.dispatch('error/catchError', error.response)
        });
    },
    //初回訪問時　トークン発行
    async fetchCookie() {
      await axios.get("/send_email/")
      .then((response) => {
        return false
      })
      .catch((error) => {
        return false
      });
    },
    //メール送信完了　サンクス画面表示　
    success(response) {
      this.message = response.data;
      Object.keys(this.formData).forEach((key) => {
        this.formData[key] = "";
      });
      this.confirmFlag = false;
      this.showForm = false;

      window.scrollTo({ top: 0 });
    },
    //mount時　初期化
    init() {
      this.confirmFlag = false;
      this.confirmData = ""
      Object.keys(this.formData).forEach((key) => {
        this.formData[key] = "";
      });
      this.showForm = true
      this.message = ''
    }
  },
  mounted() {
    this.init()
    this.fetchCookie();
  },
};
</script>

<style lang="scss" scoped>
.content-contact {
  position: relative;
}
.contact-title {
  text-align: center;
  font-size: 3em;
  line-height: 1em;
  padding: 1.3em 0;
  span {
    display: block;
    font-size: 0.6em;
    line-height: 1em;
    &::before {
      content: "-";
      padding-right: 0.5em;
    }
    &::after {
      content: "-";
      padding-left: 0.5em;
    }
  }
}

.section {
  &-title {
    max-width: 1000px;
    width: 90%;
    text-align: center;
    background-color: rgb(42, 73, 115);
    font-weight: bold;
    font-size: 160%;
    color: #ffffff;
    margin: 0 auto 30px auto;
    padding: 10px 0;
    font-family: "Hiragino Sans";
  }
}
.tell-contact {
  text-align: center;
  margin: 15px auto;
  width: 80%;
  max-width: 700px;
  &__number {
    margin: 10px auto;
    width: 90%;
    span {
      line-height: 20px;
      font-weight: bold;
      font-size: 200%;
    }
  }
  &__time {
    margin: 10px auto;
    width: 90%;
  }
}
.shop {
  border: 1px dotted;
  border-radius: 10px;
  padding: 20px;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  width: 90%;
  margin: 0 auto 30px auto;
  max-width: 400px;
  &__title {
    margin: 0;
    line-height: 1.2em;
    font-size: 1.3em;
    text-align: center;
  }
  .shop-tell-area {
    .shop-tell {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin: 0.3em 0;
      &__name {
        flex: 2 100px;
        text-align: left;
        margin: 0;
        font-weight: normal;
        font-size: 1em;
      }
      &__number {
        flex: 1 100px;
        text-align: left;
        margin: 0;
      }
    }
  }
}
.contact-mail {
  .dd-top {
    font-weight: bold;
    font-size: 1.2em;
    width: 80%;
    max-width: 700px;
    margin: 0 auto 1em auto;
    text-align: center;
  }
  .form-info {
    margin: 0 auto 1em auto;
    width: 80%;
    max-width: 700px;
    text-align: left;
    line-height: 1.4em;
    .note {
      margin: 0;
      padding: 0;
      font-size: 0.9em;
      list-style: none;
      color: #631618;
      li {
        text-indent: -1em;
        padding-left: 1em;
        &:before {
          content: "※";
        }
      }
    }
  }
}
.contact-form {
  max-width: 1100px;
  width: 95%;
  margin: 0 auto;
  border: 1px solid #666;
  border-radius: 10px;
  filter: drop-shadow(0 0 3px #666);
  background-color: #fff;
  padding: 4%;
  @media screen and (min-width: 1200px) {
    padding: 40px;
  }
}

.form-group {
  display: flex;
  width: 100%;
  margin: 2em 0;
  justify-content: center;
  .label {
    width: 20%;
    .required {
      display: inline-block;
      background-color: #631618;
      color: #fff;
      font-size: 0.85em;
      padding: 0.4em 0.4em 0.2em 0.4em;
      line-height: 1em;
      margin-left: 0.4em;
      border-radius: 4px;
    }
  }
  .input-area {
    width: 70%;
    &.name {
      display: flex;
      .name-input {
        flex: 1;
        margin-right: 1em;
      }
    }
    .form-input {
      border: 1px solid #666;
      border-radius: 5px;
      padding: 1em;
      height: 50px;
      &.style01 {
        width: 40%;
      }
      &.style02 {
        width: 100%;
      }
      &.text-area {
        width: 100%;
        height: 150px;
      }
    }
    .error {
      color: rgb(225, 40, 40);
      font-size: 0.9em;
      display: inline-block;
      width: 100%;
    }
  }
}

.btn {
  &.button01 {
    background-color: rgb(63, 63, 63);
    color: #fff;
    font-weight: bold;
    width: 100px;
    padding: 0.5em 0;
    text-align: center;
    letter-spacing: 0.1em;
    border-radius: 5px;
    margin-left: 1em;
  }
  &.button02 {
    display: block;
    background-color: rgb(48, 59, 83);
    color: #fff;
    font-weight: bold;
    width: 100px;
    padding: 0.9em 0;
    text-align: center;
    border-radius: 5px;
    margin: 0 auto;
    letter-spacing: 0.2em;
  }
  &.disable {
    filter: brightness(250%);
  }
}
.thanks {
  padding: 50px 0;
  min-height: 70vh;
  .test {
    width: 90%;
    margin: 0 auto;
    & :deep(.v-html-create) {
      text-align: center;
      line-height: 1.6em;
    }
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
}
</style>
