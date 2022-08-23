<template>
  <div class="ebi">
    <div class="main-content">
      <h2 class="main-content__title">
        <img src="~assets/image/menu/title-ebi.svg" alt="海老の組み合わせ" />
      </h2>
      <div class="menu">
        <div class="menu-photo photo-left">
          <div class="menu-photo__image">
            <img src="~assets/image/menu/photo-ebi-hire.webp" />
          </div>
          <dl class="menu-photo__text">
            <div class="text-inner">
              <dt>
                <img
                  src="~assets/image/menu/name-ebi-hire.svg"
                  alt="国産豚ヒレと海老フライ定食"
                />
              </dt>
              <dd class="menu-price">
                <p>&yen;1,380&nbsp;(&yen;1,518)</p>
              </dd>
            </div>
          </dl>
        </div>
        <div class="photo-ohebi">
          <div class="photo-ohebi__image">
            <img src="~assets/image/menu/photo-ohebi.webp" />
          </div>
          <dl class="photo-ohebi__text">
            <div class="text-inner">
              <dt>
                <img
                  src="~assets/image/menu/name-ohebi.svg"
                  alt="天然大海老フライ定食"
                />
              </dt>
              <dd class="menu-price">
                <p>【１本】&yen;1,530&nbsp;(&yen;1,683)</p>
                <p>【２本】&yen;1,530&nbsp;(&yen;1,683)</p>
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
          name: "赤城豚ロース＆海老フライ定食",
          price: "2,240",
          priceInTax: "2,240",
        },
        {
          name: "自家製海老かつ定食",
          price: "2,240",
          priceInTax: "2,240",
        },
        {
          name: "レディースセット",
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
.ebi {
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
  .photo-ohebi {
    max-width: 1100px;
    width: 95%;
    margin: 0 auto;
    position: relative;
    &__image {
      margin: 0 0 0 auto;
      max-width: 950px;
      width: 95%;
      img {
        width: 100%;
      }
    }
    &__text {
      position: absolute;
      top: 0;
      left: 5%;
      width: 400px;
      @media screen and (max-width:1100px) {
        width: 40%;
      }
      .text-inner {
        filter: drop-shadow(0 0 5px $bg-color) drop-shadow(0 0 5px $bg-color)
          drop-shadow(0 0 5px $bg-color);
        dt {}
        .menu-price {
          font-size: 1.5em;
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
