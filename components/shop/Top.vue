<template>
  <div class="shop-top">
    <div class="shop-top__image">
      <picture>
        <source media="(min-width: 900px)" :srcset="generateImgURLLarge" />
        <source media="(min-width: 550px)" :srcset="generateImgURLMiddle" />
        <source media="(min-width: 300px)" :srcset="generateImgURLSmall" />
        <img
          :src="generateImgURLLarge"
          :alt="`${shopData.name}イメージ`"
          class="shop-image"
        />
      </picture>
    </div>
    <h1
      class="shop-top__title"
      :class="{ small: addClassSmall, xsmall: addClassXSmall }"
    >
      <span class="tonq">とんかつとんＱ</span
      ><span v-html="filterTitle" v-if="shopData.id === 8"></span
      ><span v-else>{{ filterTitle }}</span>
    </h1>
    <p class="shop-top__text">{{ shopData.description }}</p>
  </div>
</template>

<script>
export default {
  props: ["shopData"],
  computed: {
    filterTitle() {
      if (this.shopData.id === 8) {
        return "柏髙島屋<span class='ib'>ステーションモール店</span>";
      }
      return this.shopData.name.slice(7);
    },
    addClassSmall() {
      return [3,4,7].includes(this.shopData.id)
    },
    addClassXSmall() {
      return [8].includes(this.shopData.id)
    },
    generateImgURLLarge() {
      return require(`@/assets/image/shop/${this.shopData.mainImage[0]}`);
    },
    generateImgURLMiddle() {
      return require(`@/assets/image/shop/${this.shopData.mainImage[1]}`);
    },
    generateImgURLSmall() {
      return require(`@/assets/image/shop/${this.shopData.mainImage[2]}`);
    },
  },
};
</script>

<style lang="scss" scoped>
.shop-top {
  &__image {
    width: 100%;
    background-color: cadetblue;
    img {
      width: 100%;
      @media screen and (min-width: 1300px) {
        width: 100%;
        height: 700px;
        object-fit: cover;
      }
    }
  }
  &__title {
    text-align: center;
    padding: 25px 0 0 0;
    width: 90%;
    margin: 0 auto;
    line-height: 1em;
    font-family: "Hiragino Sans";
    font-weight: bold;
    letter-spacing: 0.2em;
    font-size: 3em;
    @media screen and (max-width: 549px) {
      font-size: 2.5em;
    }
    &.small {
      @media screen and (min-width: 550px) {
        font-size: 3em;
        letter-spacing: 0.1em;
      }
      @media screen and (max-width: 549px) {
        font-size: 2.2em;
        letter-spacing: 0;
      }
    }
    &.xsmall {
      @media screen and (min-width: 550px) {
        font-size: 2.8em;
        letter-spacing: 0.1em;
      }
      @media screen and (max-width: 549px) {
        font-size: 2em;
        letter-spacing: 0;
      }
    }
    .tonq {
      font-size: 0.65em;
      display: inline-block;
      width: 100%;
      letter-spacing: 0;
    }
  }
  &__text {
    margin: 0 auto;
    width: 90%;
    padding: 30px 0 0 0;
    font-size: 1em;
    line-height: 1.9em;
    font-size: 1.1em;
    max-width: 750px;
    @media screen and (max-width: 599px) {
      font-size: 1em;
    }
  }
}
</style>
