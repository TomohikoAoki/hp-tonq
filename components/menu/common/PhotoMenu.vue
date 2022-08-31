<template>
  <div class="menu" :style="cssVars">
    <div
      v-for="(menu,index) in photoMenus"
      :key="index"
      :class="{
        'menu-photo': menu.special === undefined,
        'photo-ohebi': menu.special,
        'photo-left': !menu.positionReverse,
        'photo-right': menu.positionReverse,
      }"
    >
      <div class="menu-photo__image">
        <img :src="generateImageUrl(menu.codeName)" />
      </div>
      <dl class="menu-photo__text">
        <div class="text-inner">
          <dt>
            <img :src="generateNameUrl(menu.codeName)" :alt="menu.name" />
          </dt>
          <dd v-if="menu.priceOption" class="menu-price-options">
            <p v-for="(price,index) in menu.price" :key="index">
              <span class="option-name">{{ price.optionName }}</span
              >&yen;{{ price.price.toLocaleString() }}
              <span class="in-tax">&yen;{{ inTax(price.price) }}</span>
            </p>
          </dd>
          <dd v-else class="menu-price">
            <p>
              &yen;{{ menu.price }}
              <span class="in-tax">&yen;{{ inTax(menu.price) }}</span>
            </p>
          </dd>
        </div>
      </dl>
    </div>
  </div>
</template>

<script>
export default {
  props: ["photoMenus", "bgColor"],
  computed: {
    cssVars() {
      return {
        "--bg-color": this.bgColor,
      };
    },
  },
  methods: {
    inTax(price) {
      return Math.floor(Number(price) * 1.1).toLocaleString();
    },
    generateImageUrl(name) {
      return require(`@/assets/image/menu/photo-${name}.webp`);
    },
    generateNameUrl(name) {
      return require(`@/assets/image/menu/name-${name}.svg`);
    },
  },
};
</script>

<style scoped lang="scss">
$bg-color: var(--bg-color);
.menu-photo {
  display: flex;
  justify-content: center;
  @media screen and (max-width: 650px) {
    display: block;
    margin-bottom: 5%;
  }
  &.photo-left {
    padding-left: 50px;
    @media screen and (max-width: 850px) {
      padding-left: 0;
    }
    .menu-photo__text {
      width: 380px;
      position: relative;
      @media screen and (max-width: 650px) {
        width: 100%;
      }
      .text-inner {
        position: absolute;
        width: 100%;
        min-width: 270px;
        bottom: 80px;
        filter: drop-shadow(0 0 5px $bg-color) drop-shadow(0 0 5px $bg-color)
          drop-shadow(0 0 5px $bg-color);
        left: -120px;
        @media screen and (max-width: 850px) {
          left: -80px;
          bottom: 40px;
        }
        @media screen and (max-width: 650px) {
          left: auto;
          position: relative;
          bottom: auto;
          max-width: 280px;
          min-width: 210px;
          width: 65%;
          margin: -10% auto 0 auto;
        }
      }
    }
  }
  &.photo-right {
    padding-right: 50px;
    flex-direction: row-reverse;
    @media screen and (max-width: 850px) {
      padding-right: 0;
    }
    .menu-photo__text {
      width: 380px;
      position: relative;
      @media screen and (max-width: 650px) {
        width: 100%;
      }
      .text-inner {
        position: absolute;
        width: 100%;
        min-width: 270px;
        bottom: 80px;
        filter: drop-shadow(0 0 5px $bg-color) drop-shadow(0 0 5px $bg-color)
          drop-shadow(0 0 5px $bg-color);
        right: -120px;
        @media screen and (max-width: 850px) {
          right: -80px;
          bottom: 40px;
        }
        @media screen and (max-width: 650px) {
          right: auto;
          position: relative;
          bottom: auto;
          max-width: 280px;
          min-width: 210px;
          width: 65%;
          margin: -10% auto 0 auto;
        }
      }
    }
  }
  &__image {
    @media screen and (max-width: 650px) {
      max-width: 500px;
      margin: 0 auto;
    }
    img {
      width: 100%;
    }
  }
  &__text {
    .text-inner {
      dt {
      }
      .menu-price-options {
        font-size: 1.4em;
        margin: 0.6em 0 0 0;
        @media screen and (max-width: 950px) {
          font-size: 1.2em;
        }
        @media screen and (max-width: 650px) {
          text-align: center;
        }
        @media screen and (max-width: 420px) {
          font-size: 4.8vw;
        }
        p {
          padding: 0 0 0.1em 0.2em;
          @media screen and (max-width: 650px) {
            padding: 0 0 0.1em 0;
          }
        }
      }
      .menu-price {
        font-size: 1.8em;
        margin: 0.3em 0 0 0;
        font-weight: bold;
        @media screen and (max-width: 950px) {
          margin: 0.3em 0 0 0;
          font-size: 1.6em;
        }
        @media screen and (max-width: 650px) {
          text-align: center;
        }
        @media screen and (max-width: 420px) {
          font-size: 6.5vw;
        }
        p {
          padding: 0 0 0.1em 0.2em;
          @media screen and (max-width: 650px) {
            padding: 0 0 0.1em 0;
          }
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
  .menu-photo__image {
    margin: 0 0 0 auto;
    max-width: 950px;
    width: 95%;
    @media screen and (max-width: 650px) {
      margin: 0 auto;
    }
    img {
      width: 100%;
    }
  }
  .menu-photo__text {
    position: absolute;
    top: 0;
    left: 5%;
    width: 400px;
    @media screen and (max-width: 1100px) {
      width: 40%;
    }
    @media screen and (max-width: 650px) {
      position: relative;
      left: auto;
      position: relative;
      bottom: auto;
      max-width: 280px;
      min-width: 230px;
      width: 65%;
      margin: -10% auto 0 auto;
    }
    .text-inner {
      filter: drop-shadow(0 0 5px $bg-color) drop-shadow(0 0 5px $bg-color)
        drop-shadow(0 0 5px $bg-color);
      dt {
      }
      .menu-price {
        font-size: 1.5em;
        margin: 0.6em 0 0 0;
        @media screen and (max-width: 950px) {
          font-size: 1.2em;
        }
        @media screen and (max-width: 650px) {
          text-align: center;
        }
        @media screen and (max-width: 420px) {
          font-size: 4.8vw;
        }
        p {
          padding: 0 0 0.1em 0.2em;
          @media screen and (max-width: 650px) {
            padding: 0 0 0.1em 0;
          }
        }
      }
    }
  }
}
.option-name {
  &::before {
    content: "【";
  }
  &::after {
    content: "】";
  }
}
.in-tax {
  &::before {
    content: "(";
  }
  &::after {
    content: ")";
  }
}
</style>
