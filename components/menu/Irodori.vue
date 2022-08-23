<template>
  <div class="irodori">
    <div class="main-content">
      <h2 class="main-content__title">
        <img src="~assets/image/menu/title-irodori.svg" alt="味わい彩々" />
      </h2>
      <div class="menu">
        <div class="menu-photo photo-left">
          <div class="menu-photo__image">
            <img src="~assets/image/menu/photo-negioroshi.webp" />
          </div>
          <dl class="menu-photo__text">
            <div class="text-inner">
              <dt>
                <img
                  src="~assets/image/menu/name-negioroshi.svg"
                  alt="赤城豚ねぎおろしかつ定食"
                />
              </dt>
              <dd class="menu-price">
                <p>&yen;1,380&nbsp;(&yen;1,518)</p>
              </dd>
            </div>
          </dl>
        </div>
        <div class="menu-photo photo-right">
          <div class="menu-photo__image">
            <img src="~assets/image/menu/photo-nishoku.webp" />
          </div>
          <dl class="menu-photo__text">
            <div class="text-inner">
              <dt>
                <img
                  src="~assets/image/menu/name-nishoku.svg"
                  alt="国産ヒレ二色巻き定食"
                />
              </dt>
              <dd class="menu-price">
                <p>&yen;1,530&nbsp;(&yen;1,683)</p>
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
          name: "国産ヒレチーズ巻き定食",
          price: "2,240",
          priceInTax: "2,240",
        },
        {
          name: "国産ヒレ梅しそ巻き定食",
          price: "2,240",
          priceInTax: "2,240",
        },
        {
          name: "赤城豚ロースチーズかつ定食",
          price: "2,240",
          priceInTax: "2,240",
        },
        {
          name: "味噌ロースかつ定食",
          price: "2,240",
          priceInTax: "2,240",
        },
        {
          name: "やまと豚メンチかつ定食",
          price: "2,240",
          priceInTax: "2,240",
        },
        {
          name: "かつ鍋定食",
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
$bg-color: #fff;
.irodori {
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
        .menu-price {
          padding: 0 0 0 0.8em;
        }
      }
    }
    &.photo-right {
      padding-right: 50px;
      flex-direction: row-reverse;
      .text-inner {
        right: -120px;
        .menu-price {
          padding: 0 0 0 1.2em;
        }
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
          font-size: 1.8em;
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
