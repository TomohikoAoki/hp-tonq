<template>
  <div class="akagi">
    <div class="main-content">
      <h2 class="main-content__title">
        <img src="~assets/image/menu/title-akagi.svg" alt="赤城豚" />
      </h2>
      <div class="main-content__text">
        <!--装飾用span--><span
        ></span>
        <div class="text-inner">
          <p class="akagi-text">
            赤城豚は柔らかさとしっかりとした旨味が特徴。赤城の大自然の中で育った豚を最高の状態でお客様に届けるのが料理人の使命。店内でじっくり熟成させ職人が真心込めて一枚一枚揚げています。
          </p>
        </div>
      </div>
      <PhotoMenu :photoMenus="photoMenus" :bgColor="bgColor"></PhotoMenu>
      <ListVue :products="products"></ListVue>
    </div>
  </div>
</template>

<script>
import ListVue from "./common/List.vue";
import PhotoMenu from "./common/PhotoMenu.vue";

export default {
  components: {
    ListVue,
    PhotoMenu,
  },
  data() {
    return {
      bgColor: '#fff',
      photoMenus: null,
      products: null,
    };
  },
  methods: {
    fetchMenus() {
      const Data = this.$store.getters['products/getMenuData'](2)
      let array = []
      this.photoMenus = Data.filter((item) => {
        if(item.photo) return true
        array.push(item)
      })
      this.products = array
    }
  },
  mounted() {
    this.fetchMenus()
  }
};
</script>

<style lang="scss" scoped>
$padding-width: 30px;
$padding-color: #686561;
$bg-color: #fff;
.akagi {
  .main-content {
    max-width: 1360px;
    margin: 0 auto;
    padding: 50px 0;
    &__title {
      text-align: center;
      @media screen and (max-width: 750px) {
        filter: drop-shadow(0 0 5px $bg-color) drop-shadow(0 0 5px $bg-color)
          drop-shadow(0 0 5px $bg-color);
      }
      img {
        max-width: 650px;
        @media screen and (max-width: 950px) {
          max-width: 450px;
          width: 80%;
        }
      }
    }
    &__text {
      position: relative;
      padding: $padding-width;
      width: 95%;
      max-width: 1000px;
      margin: 0 auto;
      z-index: -1;
      @media screen and (max-width: 750px) {
        margin: 20px auto 0 auto;
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
        @media screen and (max-width: 500px) {
          left: 3%;
        }
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
        @media screen and (max-width: 500px) {
          top: 3%;
        }
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
          @media screen and (max-width: 500px) {
            right: 3%;
          }
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
          @media screen and (max-width: 500px) {
            bottom: 3%;
          }
        }
      }
      .text-inner {
        padding: 50px 50px 160px 50px;
        box-sizing: border-box;
        position: relative;
        @media screen and (max-width: 750px) {
          padding: 6% 6% calc(20% + 20px) 6%;
        }
        &::before {
          content: "";
          background-image: url(~assets/image/menu/bg-akagi-text.svg);
          background-repeat: no-repeat;
          background-size: contain;
          background-position: bottom right;
          max-width: 600px;
          width: 70%;
          padding-top: 15%;
          position: absolute;
          bottom: 30px;
          right: 50px;
          z-index: 1;
          @media screen and (max-width: 650px) {
            width: 85%;
            padding-top: 18%;
            bottom: 6%;
            right: 6%;
          }
        }
        .akagi-text {
          line-height: 1.7em;
          font-size: 1.25em;
          position: relative;
          z-index: 2;
          width: 80%;
          @media screen and (max-width: 750px) {
            width: 100%;
          }
          @media screen and (max-width: 550px) {
            font-size: 1.1em;
          }
        }
      }
    }
  }
}
</style>
