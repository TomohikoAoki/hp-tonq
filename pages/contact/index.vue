<template>
  <div class="content-contact">
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
          <div class="shop-tell" v-for="(shop, index) in shopData" :key="index">
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
      <form class="contact-form">
        <div class="form-group">
          <label class="label">名前</label>
          <div class="input-area name">
            <validation-provider
              v-slot="{ errors }"
              rules="required|max:10"
              name="first-name"
              class="name-input"
            >
              <input
                v-model="lastName"
                type="text"
                class="form-input style02"
                placeholder="氏"
                name="family-name"
              />
              <span class="error">
                <span v-for="(error, i) in errors" :key="`errors${i}`">
                  {{ error }}
                </span>
              </span>
            </validation-provider>
            <validation-provider
              v-slot="{ errors }"
              rules="required|max:10"
              name="last-name"
              class="name-input"
            >
              <input
                v-model="firstName"
                type="text"
                class="form-input style02"
                placeholder="名"
                name="first-name"
              />
              <span class="error">
                <span v-for="(error, i) in errors" :key="`errors${i}`">
                  {{ error }}
                </span>
              </span>
            </validation-provider>
          </div>
        </div>
        <div class="form-group">
          <label class="label">メールアドレス</label>
          <validation-provider
            v-slot="{ errors }"
            rules="required|email"
            name="email"
            class="input-area"
          >
            <input
              v-model="email"
              type="text"
              class="form-input style02"
              placeholder="example@ton-q.com"
            />
            <span class="error">
              <span v-for="(error, i) in errors" :key="`errors${i}`">
                {{ error }}
              </span>
            </span>
          </validation-provider>
        </div>
        <div class="form-group">
          <label class="label">メールアドレス(確認)</label>
          <validation-provider
            v-slot="{ errors }"
            rules="confirmed:email"
            name="email-confirmed"
            class="input-area"
          >
            <input
              v-model="emailConfirmed"
              type="text"
              class="form-input style02"
            />
            <span class="error">
              <span v-for="(error, i) in errors" :key="`errors${i}`">
                {{ error }}
              </span>
            </span>
          </validation-provider>
        </div>
        <div class="form-group">
          <label class="label">電話番号</label>
          <validation-provider
            v-slot="{ errors }"
            rules="required"
            name="tel-number"
            class="input-area"
          >
            <input
              v-model="phoneNumber"
              type="text"
              class="form-input style01"
            />
            <span class="error">
              <span v-for="(error, i) in errors" :key="`errors${i}`">
                {{ error }}
              </span>
            </span>
          </validation-provider>
        </div>
        <div class="form-group">
          <label class="label">性別</label>
          <validation-provider
            v-slot="{ errors }"
            rules="required"
            name="性別"
            class="input-area"
          >
            <label class="radio">
              <input
                name="radio_group_1"
                v-validate="'required|included:1,2'"
                value="男性"
                type="radio"
                v-model="gender"
              />
              男性
            </label>
            <label class="radio">
              <input
                name="radio_group_1"
                value="女性"
                type="radio"
                v-model="gender"
              />
              女性
            </label>
            <span class="error">
              <span v-for="(error, i) in errors" :key="`errors${i}`">
                {{ error }}
              </span>
            </span>
          </validation-provider>
        </div>
        <div class="form-group">
          <label class="label">郵便番号</label>
          <div class="input-area">
            <validation-provider
              v-slot="{ errors }"
              rules="required"
              name="zipCode"
              class="input-area"
            >
              <input v-model="zipCode" type="text" class="form-input style01" />
              <span class="error">
                <span v-for="(error, i) in errors" :key="`errors${i}`">
                  {{ error }}
                </span>
              </span>
            </validation-provider>
            <button @click.prevent="fetchZipCode">住所検索</button>
          </div>
        </div>
        <div class="form-group">
          <label class="label">住所1</label>
          <validation-provider
            v-slot="{ errors }"
            rules="required"
            name="tel-number"
            class="input-area"
          >
            <input v-model="addI" type="text" class="form-input style02" />
            <span class="error">
              <span v-for="(error, i) in errors" :key="`errors${i}`">
                {{ error }}
              </span>
            </span>
          </validation-provider>
        </div>
        <div class="form-group">
          <label class="label">住所2</label>
          <validation-provider
            v-slot="{ errors }"
            rules="required"
            name="tel-number"
            class="input-area"
          >
            <input v-model="addII" type="text" class="form-input style02" placeholder="上記以下の住所"/>
            <span class="error">
              <span v-for="(error, i) in errors" :key="`errors${i}`">
                {{ error }}
              </span>
            </span>
          </validation-provider>
        </div>
        <div class="form-group">
          <label class="label">店舗</label>
          <validation-provider
            v-slot="{ errors }"
            rules="required"
            name="tel-number"
            class="input-area"
          >
            <select v-model="shop" class="form-input style02">
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
              <span v-for="(error, i) in errors" :key="`errors${i}`">
                {{ error }}
              </span>
            </span>
          </validation-provider>
        </div>
        <div class="form-group">
          <label class="label">お問い合わせ内容</label>
          <validation-provider
            v-slot="{ errors }"
            rules="required"
            name="tel-number"
            class="input-area"
          >
            <textarea
              v-model="content"
              name="content"
              class="form-input text-area"
            ></textarea>
            <span class="error">
              <span v-for="(error, i) in errors" :key="`errors${i}`">
                {{ error }}
              </span>
            </span>
          </validation-provider>
        </div>
      </form>
    </section>
  </div>
</template>

<script>
import { mapState } from "vuex";

const axios = require("axios");

export default {
  data() {
    return {
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
    };
  },
  computed: {
    ...mapState("shops", ["shopData"]),
  },
  methods: {
    async fetchZipCode() {
      let zipCode = this.zipCode;
      const response = await axios.get(
        `http://zipcloud.ibsnet.co.jp/api/search?zipcode=${zipCode}`
      );

      const result = response.data.results[0];

      this.addI = result["address1"] + result["address2"] + result["address3"];
    },
  },
};
</script>

<style lang="scss" scoped>
.contact-title {
  text-align: center;
  font-size: 3em;
  span {
    display: inline-block;
    width: 100%;
    font-size: 0.6em;
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
  filter:drop-shadow(0 0 3px #666);
  background-color: #fff;
  padding: 4%;
  @media screen and (min-width:1200px) {
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
  }
  .input-area {
    width: 70%;
    &.name {
      display: flex;
      .name-input {
        flex:1;
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

#info h1 {
  text-align: center;
  margin: 0;
  font-family: "Hiragino Sans";
  font-weight: bold;
}

#mail_form {
  max-width: 700px;
}
.thanks {
  height: 40vh;
  text-align: center;
}
</style>
