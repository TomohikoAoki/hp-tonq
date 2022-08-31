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
      bgColor: "antiquewhite",
      photoMenus: null,
      products: null
    };
  },
  methods: {
    fetchMenus() {
      const Data = this.$store.getters['products/getMenuData'](1)
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
$bg-color: antiquewhite;
.yamato {
  background-color: $bg-color;
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
      margin: 0 auto;
      @media screen and (max-width: 800px) {
        max-width: 650px;
      }
      @media screen and (max-width: 750px) {
        margin: 20px auto 0 auto;
      }
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
        padding: 50px;
        display: flex;
        align-items: center;
        box-sizing: border-box;
        @media screen and (max-width: 1025px) {
          align-items: stretch;
        }
        @media screen and (max-width: 950px) {
          padding: 40px;
        }
        @media screen and (max-width: 800px) {
          flex-direction: column-reverse;
        }
        @media screen and (max-width: 500px) {
          padding: 5%;
        }
        &__text {
          flex: 1;
          padding-right: 2em;
          @media screen and (max-width: 1025px) {
            flex: 0;
          }
          @media screen and (max-width: 800px) {
            padding-right: 0;
            padding-top: 1.5em;
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
            @media screen and (max-width: 450px) {
              width: 100%;
              min-width: auto;
            }
            .yamato-award-image {
              display: table-cell;
              vertical-align: middle;
              padding: 10px 0 10px 10px;
              @media screen and (max-width: 450px) {
                width: 10%;
              }
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
              @media screen and (max-width: 450px) {
                font-size: 4.3vw;
              }
            }
          }
        }
        &__image {
          max-width: 500px;
          text-align: center;
          margin: 0 auto;
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
</style>
