<template>
  <div>
    <div class="shop-wrap">
      <ShopTopVue :shopData="shopData"></ShopTopVue>
      <WrapCalendarVue :shopData="shopData" class="calendar" v-if="shopData.calendar"></WrapCalendarVue>
      <ShopNavVue></ShopNavVue>
      <div class="shop-bottom-layout">
        <ShopInfoVue :shopData="shopData" class="info"></ShopInfoVue>
        <ShopLinkVue class="link" :shopData="shopData"></ShopLinkVue>
      </div>
    </div>
  </div>
</template>

<script>
import ShopTopVue from "./Top.vue";
import ShopNavVue from "./Nav.vue";
import WrapCalendarVue from "./WrapCalendar.vue";
import ShopInfoVue from "./Info.vue";
import ShopLinkVue from "./Link.vue";

export default {
  components: {
    ShopTopVue,
    ShopNavVue,
    WrapCalendarVue,
    ShopInfoVue,
    ShopLinkVue,
  },
  props:[
    "shopId"
  ],
  data() {
    return {
      shopData: this.$store.getters["shops/getShopData"](this.shopId),
    };
  },
};
</script>

<style scoped lang="scss">
.shop-wrap {
  padding-bottom: 50px;
}

.calendar {
  margin: 30px auto 40px auto;
}
.shop-bottom-layout {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  max-width: 1300px;
  width: 95%;
  margin: 0 auto;
  @media screen and (max-width: 1000px) {
    display: block;
  }
  .info {
    width: 70%;
    max-width: 900px;
    flex: 1;
    margin-right: 30px;
    @media screen and (max-width: 1000px) {
      width: 95%;
      margin: 0 auto;
    }
  }
  .link {
    width: 350px;
    @media screen and (max-width: 1000px) {
      width: 90%;
      margin: 30px auto;
    }
  }
}
</style>
