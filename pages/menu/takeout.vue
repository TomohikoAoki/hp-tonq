<template>
  <div class="takeout">
    <div class="takeout-top">
      <div class="top-title-area">
        <div class="title-wrap">
          <h1 class="takeout-top__title">
            <span>専門店の味をテイクアウト</span>
            <img
              src="~assets/image/menu/takeout/title-takeout.svg"
              alt="とんＱのお弁当"
            />
          </h1>
        </div>
      </div>
      <p class="takeout-top__text">
        専門店の味を、そのままテイクアウトしていただけます。
        素材にこだわり、ヘルシーな植物油を使って揚げているとんＱのとんかつは、
        出来立てはもちろんのこと、 冷めてもとっても美味しいですよ♪
        お土産や行楽、会議の合間の仕出し弁当、またお食事を作るのがちょっと面倒くさいな…
        なんていう時、いろんなシーンで、幅広くご利用下さい。
      </p>
    </div>
    <div class="takeout-menu">
      <section class="takeout-menu-section">
        <h2 class="section-title">
          <img
            src="~assets/image/menu/takeout/takeout-section-title01.svg"
            alt="やまと豚"
          />
        </h2>
        <div class="yamato-menu">
          <div class="yamato-menu__image">
            <img src="~assets/image/menu/takeout/takeout-image.webp" />
          </div>
          <TakeoutMenuVue
            :data="menuYamato"
            class="yamato-menu__list"
          ></TakeoutMenuVue>
        </div>
      </section>
      <section class="takeout-menu-section">
        <h2 class="section-title">
          <img
            src="~assets/image/menu/takeout/takeout-section-title02.svg"
            alt="赤城豚・国産豚"
          />
        </h2>
        <TakeoutMenuVue :data="menuAkagi" class="menu-list"></TakeoutMenuVue>
      </section>
      <section class="takeout-menu-section">
        <h2 class="section-title">
          <img
            src="~assets/image/menu/takeout/takeout-section-title03.svg"
            alt="味わい色々"
          />
        </h2>
        <TakeoutMenuVue :data="menuIroiro" class="menu-list"></TakeoutMenuVue>
      </section>
    </div>
    <section class="plate">
      <h2 class="plate__title"><img src="~assets/image/menu/takeout/title-plate.svg" alt="テイクアウトオードブル"></h2>
      <div class="o-menu photo-left">
        <div class="o-menu__image">
          <img src="~assets/image/menu/takeout/plate01.webp" />
        </div>
        <div class="o-menu__info">
          <dl class="info-inner-wrap">
            <dt class="o-menu-name">２人前オードブル</dt>
            <dd class="o-menu-price">&yen;2,798</dd>
            <dd class="o-menu-contents">
              <ul>
                <li>やまと豚ロースかつ</li>
                <li>やまと豚ヒレかつ</li>
                <li>やまと豚カットリブ</li>
                <li>唐揚げ</li>
                <li>フライドポテト</li>
              </ul>
            </dd>
          </dl>
        </div>
      </div>
      <div class="o-menu photo-right">
        <div class="o-menu__image">
          <img src="~assets/image/menu/takeout/plate02.webp" />
        </div>
        <div class="o-menu__info">
          <dl class="info-inner-wrap">
            <dt class="o-menu-name">とんＱオードブル</dt>
            <dd class="o-menu-price">&yen;4,104</dd>
            <dd class="o-menu-contents">
              <ul>
                <li>赤城豚ロースかつ</li>
                <li>国産豚ヒレかつ</li>
                <li>国産豚ヒレ巻かつ２種</li>
                <li>海老フライ</li>
                <li>海老かつ</li>
                <li>やまと豚カットリブ</li>
                <li>やまと豚ソーセージ２種</li>
              </ul>
            </dd>
          </dl>
        </div>
      </div>
      <div class="o-menu photo-left">
        <div class="o-menu__image">
          <img src="~assets/image/menu/takeout/plate03.webp" />
        </div>
        <div class="o-menu__info">
          <dl class="info-inner-wrap">
            <dt class="o-menu-name">やまと豚<span class="ib">贅沢オードブル</span></dt>
            <dd class="o-menu-price">&yen;5,400</dd>
            <dd class="o-menu-contents">
              <ul>
                <li>やまと豚ロースかつ</li>
                <li>やまと豚ヒレかつ</li>
                <li>国産豚ヒレ巻かつ２種</li>
                <li>海老フライ</li>
                <li>海老かつ</li>
                <li>やまと豚カットリブ</li>
                <li>やまと豚ソーセージ２種</li>
              </ul>
            </dd>
          </dl>
        </div>
      </div>
    </section>
    <section class="order-area">
      <h2 class="order-area__title">注文方法</h2>
      <p class="order-area__text">
        <strong>各店舗の店頭orお電話</strong><br />
        にて承ります。
      </p>
      <a href="#" class="link-toshop">店舗ページはコチラ</a>
      <div class="order">
        <div class="order-pattern">
          <h3 class="order-pattern__title">
            <i class="fa fa-star" aria-hidden="true"></i>店内でご注文の場合
          </h3>
          <ul class="order-pattern__list">
            <li>
              店内でお食事をご注文される際に一緒にお申し付け下さい。その際は、スタッフに<em>テイクアウト用である旨</em>を必ずお伝えくださいますようお願いします。お帰りの際にすぐに持ち帰れるよう、手配いたします。
            </li>
            <li>
              お食事中、お食事後や店頭でのテイクアウトのみのご注文も随時承りますが、その際は１５～２０分お待ちいただく場合がございます。
            </li>
          </ul>
        </div>
        <div class="order-pattern">
          <h3 class="order-pattern__title">
            <i class="fa fa-star" aria-hidden="true"></i>お電話でご注文の場合
          </h3>
          <ul class="order-pattern__list">
            <li>ご要望のお引取り時間に合わせて調理し、店頭でお渡しします。</li>
            <li>
              すぐに欲しい、と言う場合にはこちらから出来上がりのお時間をご案内します（状況によりますが、２０～４０分見てください）。
            </li>
          </ul>
        </div>
      </div>
      <section class="note">
        <h3 class="note__title">ご注意点</h3>
        <ul class="note__list">
          <li>メールでのご注文は受け付けておりません。</li>
          <li>
            お弁当は、ごはん、キャベツ、すりごま、オリジナルソース、お味噌汁がつきます。単品の場合は、キャベツ、すりごま、オリジナルソースのみがつきます。
          </li>
          <li>
            お新香は衛生管理上、お持ち帰りいただけませんのでご了承下さい。
          </li>
          <li>
            お子様ランチをご注文の場合は、おもちゃがつきます。デザートは衛生管理上お付けできませんので、ご了承下さい。
          </li>
          <li>
            ２０個以上のまとまったご注文をされる場合は、なるべく前日までにご注文下さい。当日ですと、準備や在庫の関係でお作りできない場合がございます。
          </li>
          <li>
            レディースセットのテイクアウトでは店内飲食で付いているデザートorドリンクのサービスは付いておりません。
          </li>
          <li>店舗によっては取扱商品や、価格が異なる場合がございます。</li>
        </ul>
      </section>
    </section>
  </div>
</template>

<script>
import TakeoutMenuVue from "../../components/menu/TakeoutMenu.vue";

export default {
  components: {
    TakeoutMenuVue,
  },
  data() {
    return {
      menuData: this.$store.getters["products/getMenuAllData"],
    };
  },
  computed: {
    //やまと豚をテイクアウト用に強引に変換
    //厚切りの値段をぶっこむ（値段の変更の場合にstoreの変更だけで済むように）
    menuYamato() {
      let yamato = this.menuData.filter((item) => item.category === 1);
      let roseCopy = Object.assign({}, JSON.parse(JSON.stringify(yamato[0])));
      roseCopy.price.push({ optionName: "240g", price: yamato[2].price });
      let hireCopy = Object.assign({}, JSON.parse(JSON.stringify(yamato[1])));
      hireCopy.price.push({ optionName: "240g", price: yamato[3].price });

      return [roseCopy, hireCopy];
    },
    //赤城豚をテイクアウト用に強引に変換
    //厚切りの値段をぶっこむ（値段の変更の場合にstoreの変更だけで済むように）
    menuAkagi() {
      let akagi = this.menuData.filter((item) => item.category === 2);
      let roseCopy = Object.assign({}, JSON.parse(JSON.stringify(akagi[0])));
      roseCopy.price.push({ optionName: "240g", price: akagi[2].price });
      let hireCopy = Object.assign({}, JSON.parse(JSON.stringify(akagi[1])));
      hireCopy.price.push({ optionName: "240g", price: akagi[3].price });

      return [roseCopy, hireCopy];
    },
    menuIroiro() {
      let array = this.menuData.filter((item) => {
        if (
          item.category === 3 ||
          (item.category === 4 && item.productId !== 24)
        ) {
          return true;
        }
      });

      return array;
    },
  },
};
</script>

<style scoped lang="scss">
.takeout {
  padding-bottom: 7%;
}
.takeout-top {
  .top-title-area {
    height: 400px;
    background-image: url(~assets/image/menu/takeout/bg-takeout-top.webp);
    background-position: center;
    background-repeat: no-repeat;
    @media screen and (min-width: 1450px) {
      background-size: cover;
    }
    .title-wrap {
      max-width: 1500px;
      margin: 0 auto;
      height: 400px;
      position: relative;
      .takeout-top__title {
        width: 400px;
        text-align: center;
        position: absolute;
        bottom: 50px;
        left: 30px;
        filter: drop-shadow(0 0 5px #fff) drop-shadow(0 0 7px #fff)
          drop-shadow(0 0 10px #fff);
        img {
          width: 100%;
        }
        span {
          font-weight: bold;
          font-size: 31px;
        }
      }
    }
  }
  &__text {
    max-width: 700px;
    margin: 0 auto;
    padding: 50px 0;
    line-height: 1.6em;
    font-size: 1.2em;
  }
}
.takeout-menu {
  border: 10px solid;
  border-image: url(~assets/image/menu/takeout/line-image.gif);
  border-image-slice: 33%;
  border-image-repeat: repeat;
  border-image-width: 25px;
  padding: 2%;
  max-width: 1200px;
  width: 95%;
  margin: 0 auto 7% auto;
  .takeout-menu-section {
    margin: 0 0 30px 0;
    .section-title {
      max-width: 350px;
      margin: 2em 0 1.5em 0;
    }
  }
}
.yamato-menu {
  display: flex;
  flex-wrap: wrap;
  width: 95%;
  justify-content: center;
  align-items: center;
  &__image {
    max-width: 600px;
    margin-right: 20px;
    img {
      width: 100%;
    }
  }
  .yamato-menu__list {
    flex: 1;
    & ::v-deep(.menu) {
      width: 100%;
      margin: 0 0 20px 0;
      padding: 0.7em 0 0.7em 0.5em;
    }
  }
}
.menu-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: flex-start;
  & ::v-deep(.menu) {
    width: 43%;
  }
}
.plate {
  background-color: #f7f3ed;
  padding: 5% 0 5% 0;
  &__title {
    margin: 0 auto 100px auto;
    max-width: 700px;
  }
  .o-menu {
    display: flex;
    flex-wrap: wrap;
    max-width: 1150px;
    margin: -40px auto 0 auto;
    position: relative;
    align-items: center;
    &::before {
      content: "";
      position: absolute;
      width: 100%;
      background-color: #dccfba;
      height: 70%;
      top: 50%;
      transform: translateY(-50%);
    }
    &__image {
      position: relative;
    }
    &__info {
      flex: 1;
      position: relative;
      .info-inner-wrap {
        border: 1px solid;
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        box-sizing: border-box;
        border-radius: 10px;
        .o-menu-name {
          font-size: 2em;
          border-left: 9px solid;
          padding: 0.2em 0 0 0.3em;
        }
        .o-menu-price {
          font-size: 1.7em;
          border-left: 9px solid;
          padding: 0 0 0.3em 0.6em;
        }
        .o-menu-contents {
          padding: 0.4em 0 0 1em;
          ul {
            li {
              display: inline-block;
              line-height: 1.2em;
              &::after {
                content: "/",
              }
            }
          }
        }
      }
    }
    &.photo-right {
      flex-direction: row-reverse;
    }
  }
}

.order-area {
  &__title {
    text-align: center;
    background-color: #123046;
    color: #fff;
    padding: 20px 40px;
    font-size: 1.5em;
    font-family: "Hiragino Sans";
    font-weight: bold;
    width: 200px;
    margin: 20px auto 0 auto;
    border-radius: 50%;
  }
  &__text {
    font-family: "Hiragino Sans";
    font-weight: bold;
    color: #003366;
    @media screen and (min-width: 750px) {
      text-align: center;
      line-height: 1em;
      margin: 40px 0 0 0;
      padding: 0;
      font-size: 1.3em;
    }
    @media screen and (max-width: 749px) {
      font-size: 1.2em;
      text-align: center;
      line-height: 1.2em;
      margin: 40px 0 0 0;
      padding: 0;
    }
    br {
      @media screen and (min-width: 750px) {
        display: none;
      }
    }
    strong {
      line-height: 25px;
      font-size: 160%;
      color: #003366;
    }
  }
}

.order {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  max-width: 1300px;
  margin: 0 auto;
  .order-pattern {
    width: 45%;
    padding: 20px;
    &__title {
      font-weight: bold;
      font-size: 1.2em;
      border-bottom: 1px solid;
      padding-bottom: 0.3em;
      margin-bottom: 0.6em;
    }
    &__list {
      list-style: outside;
      padding: 0 0 0 1.5em;
      li {
        line-height: 1.4em;
        padding-bottom: 1em;
      }
    }
  }
}
.note {
  max-width: 800px;
  margin: 0 auto;
  border: 1px dotted;
  border-radius: 10px;
  padding: 30px 40px 20px 40px;
  &__title {
    font-weight: bold;
    font-size: 1.1em;
    text-align: center;
    padding: 0 0 1em 0;
  }
  &__list {
    list-style: outside;
    padding: 0 0 0 1.5em;
    li {
      line-height: 1.4em;
      padding-bottom: 0.7em;
    }
  }
}
</style>
