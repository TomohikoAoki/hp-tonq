<template>
  <div class="yamato">
    <div class="main-content">
      <h2 class="main-content__title">
        <img src="~assets/image/menu/title-yamato.svg" alt="やまと豚" />
      </h2>
      <div class="main-content__text">
        <!--装飾用span--><span
        ></span>
        <div class="text-inner">
          <div class="text-inner__text">
            <p class="yamato-text">
              やまと豚は国内の指定牧場でのみ育てられた国産のブランド豚。生産だけでなく、加工、流通まで全ての工程で徹底した品質管理で美味しさはもちろんの事、食の安全も提供しています。その特徴は<em>キメが細かく柔らかく、脂身がほのかに甘く臭みもない</em>ので女性にも大人気です。
            </p>
            <div class="yamato-award">
              <div class="yamato-award-image">
                <img src="~assets/image/menu/yamato-iti.png" />
              </div>
              <p class="yamato-award-text">
                国際味覚審査機構<br />2022年<span class="ib"
                  >７年連続三ツ星獲得</span
                >
              </p>
            </div>
          </div>
          <div class="text-inner__image">
            <img src="~assets/image/menu/yamato-image.jpg" />
          </div>
        </div>
      </div>
      <div class="menu">
        <div class="menu-photo photo-left">
          <div class="menu-photo__image">
            <img src="~assets/image/menu/photo-yamato-roce.webp" />
          </div>
          <dl class="menu-photo__text">
            <div class="text-inner">
              <dt>
                <img
                  src="~assets/image/menu/name-yamato-roce.svg"
                  alt="やまと豚ロースかつ定食"
                />
              </dt>
              <dd class="menu-price">
                <p>【120g】&yen;1,380&nbsp;(&yen;1,518)</p>
                <p>【150g】&yen;1,660&nbsp;(&yen;1,826)</p>
                <p>【200g】&yen;1,980&nbsp;(&yen;2,178)</p>
              </dd>
            </div>
          </dl>
        </div>
        <div class="menu-photo photo-right">
          <div class="menu-photo__image">
            <img src="~assets/image/menu/photo-yamato-hire.webp" />
          </div>
          <dl class="menu-photo__text">
            <div class="text-inner">
              <dt>
                <img
                  src="~assets/image/menu/name-yamato-hire.svg"
                  alt="やまと豚ヒレかつ定食"
                />
              </dt>
              <dd class="menu-price">
                <p>【120g】&yen;1,530&nbsp;(&yen;1,683)</p>
                <p>【150g】&yen;1,980&nbsp;(&yen;2,178)</p>
              </dd>
            </div>
          </dl>
        </div>
      </div>
      <ListVue :products="products"></ListVue>
    </div>
  </div>
</template>

<script>
import ListVue from "./common/List.vue";

export default {
  components: {
    ListVue,
  },
  data() {
    return {
      products: [
        {
          name: "やまと豚厚切りロースかつ定食【240g】",
          price: "2,240",
          priceInTax: "2,240",
        },
        {
          name: "やまと豚厚切りヒレかつ定食【240g】",
          price: "2,240",
          priceInTax: "2,240",
        },
        {
          name: "やまと豚おすすめ定食",
          price: "2,240",
          priceInTax: "2,240",
        },
        {
          name: "やまと豚カットリブ",
          price: "2,240",
          priceInTax: "2,240",
        },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
$padding-width: 30px;
$padding-color: #686561;
$bg-color: antiquewhite;
.yamato {
  position: relative;
  background-color: $bg-color;
  overflow: hidden;
  &::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: calc(50% + 320px);
    padding-top: 30%;
    background-image: url(~assets/image/menu/bg-yamato01.svg);
    background-size: contain;
    background-repeat: no-repeat;
  }
  &::after {
    content: "";
    position: absolute;
    bottom: 0;
    right: 0;
    left: calc(50% + 320px);
    padding-top: 30%;
    background-image: url(~assets/image/menu/bg-yamato02.svg);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: bottom right;
  }
  .main-content {
    max-width: 1360px;
    margin: 0 auto;
    padding: 50px 0;
    &__title {
      text-align: center;
      img {
        max-width: 650px;
      }
    }
    &__text {
      position: relative;
      padding: $padding-width;
      width: 95%;
      margin: 0 auto;
      em {
        font-weight: bold;
        text-decoration: underline;
      }
      //左上縦線
      &::before {
        position: absolute;
        content: "";
        width: 100%;
        height: 50%;
        top: 0;
        left: $padding-width;
        border-left: 2px solid $padding-color;
      }
      //左上横線
      &::after {
        position: absolute;
        content: "";
        width: 20%;
        height: 100%;
        top: $padding-width;
        left: 0;
        border-top: 2px solid $padding-color;
      }
      span {
        //右下縦線
        &::before {
          position: absolute;
          content: "";
          width: 100%;
          height: 50%;
          bottom: 0;
          right: $padding-width;
          border-right: 2px solid $padding-color;
        }
        //右下横線
        &::after {
          position: absolute;
          content: "";
          width: 20%;
          height: 100%;
          bottom: $padding-width;
          right: 0;
          border-bottom: 2px solid $padding-color;
        }
      }
      .text-inner {
        padding: 50px;
        display: flex;
        align-items: center;
        box-sizing: border-box;
        @media screen and (max-width: 1025px) {
          align-items: stretch;
        }
        &__text {
          flex: 1;
          padding-right: 2em;
          @media screen and (max-width: 1025px) {
            flex: 0;
          }
          .yamato-text {
            line-height: 1.7em;
            font-size: 1.25em;
            @media screen and (max-width: 1150px) {
              font-size: 1em;
            }
          }
          .yamato-award {
            display: table;
            background-color: #686561;
            width: 400px;
            margin: 20px auto 0 auto;
            border-radius: 10px;
            @media screen and (max-width: 1050px) {
              max-width: 350px;
              width: 100%;
              min-width: 300px;
            }
            .yamato-award-image {
              display: table-cell;
              vertical-align: middle;
              padding: 10px 0 10px 10px;
              img {
                width: 80px;
              }
            }
            .yamato-award-text {
              display: table-cell;
              font-weight: bold;
              vertical-align: middle;
              font-size: 1.4em;
              padding-right: 1em;
              color: rgb(252, 234, 207);
              @media screen and (max-width: 1050px) {
                font-size: 1.2em;
              }
            }
          }
        }
        &__image {
          max-width: 500px;
          img {
            width: 100%;
            height: 100%;
            @media screen and (max-width: 1025px) {
              object-fit: cover;
            }
          }
        }
      }
    }
  }
}
.menu {
  width: 100%;
  overflow: hidden;
  .menu-photo {
    display: flex;
    justify-content: center;

    &.photo-left {
      padding-left: 50px;
      .text-inner {
        left: -120px;
      }
    }
    &.photo-right {
      padding-right: 50px;
      flex-direction: row-reverse;
      .text-inner {
        right: -120px;
      }
    }
    &__image {
      img {
        width: 100%;
      }
    }
    &__text {
      width: 380px;
      position: relative;
      .text-inner {
        position: absolute;
        width: 100%;
        bottom: 80px;
        filter: drop-shadow(0 0 5px $bg-color) drop-shadow(0 0 5px $bg-color)
          drop-shadow(0 0 5px $bg-color);
        dt {
        }
        .menu-price {
          font-size: 1.4em;
          margin: 0.6em 0 0 0;
          @media screen and (max-width:950px) {
            font-size: 1.2em;
          }
          p {
            padding: 0 0 0.1em 0.2em;
          }
        }
      }
    }
  }
}
</style>
