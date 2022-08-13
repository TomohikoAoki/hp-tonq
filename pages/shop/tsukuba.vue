<template>
  <div class="shop-wrap">
    <ShopTopVue :shopData="shopData"></ShopTopVue>
    <WrapCalendarVue></WrapCalendarVue>
    <ShopNavVue></ShopNavVue>
    <div class="shop-bottom-layout">
    <ShopInfoVue :shopData="shopData" class="info"></ShopInfoVue>
    <ShopLinkVue class="link"></ShopLinkVue>
    </div>
  </div>
</template>

<script>
import ShopTopVue from "../../components/shop/Top.vue"
import ShopNavVue from "../../components/shop/Nav.vue"
import WrapCalendarVue from "../../components/shop/WrapCalendar.vue";
import ShopInfoVue from "../../components/shop/Info.vue";
import ShopLinkVue from "../../components/shop/Link.vue"

export default {
  components: {
    ShopTopVue,
    ShopNavVue,
    WrapCalendarVue,
    ShopInfoVue,
    ShopLinkVue,
  },
  data() {
    return {
      shopData: {
        name: "とんかつとんＱつくば本店",
        mainImage: ["photo-tsukuba-l.webp","photo-tsukuba-m.webp","photo-tsukuba-s.webp"],
        mainText:
          "とんかつとんQつくば本店は、平成２３年に農林水産大臣賞を受賞した「やまと豚」のとんかつを中心に、お膳の５品（とんかつ・キャベツ・ご飯・味噌汁・お新香）にこだわるとんかつ専門店。つくば万博が開催される３年前の昭和５８年に茨城県つくば市で創業して以来、こだわりの料理と心からの接客で、地域で１番のお店を目指しております。",
        telNum: "0298524509",
        add: "茨城県つくば市東新井13-12",
        access: "TXつくば、つくば駅より徒歩12分",
        open: {
          weekday: "11:00 ~ 21:00(L.O.20:30)",
          holiday: "11:00 ~ 22:00(L.O.21:30)",
          lunchTime: "平日・土曜11:00 ~ 15:00",
        },
        closeDays: `基本木曜日`,
        sheet: "９１席（座敷席あり）",
        payment: "現金・クレジットカード・Paypay",
        privateRoom: "無し",
        parking: "有り",
        map: "d3224.6760462389316!2d140.10851385168883!3d36.07700491567257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60220c861812a0d7%3A0x20caf834271cd1af!2z44Go44KT44GL44Gk44Go44KTUeOBpOOBj-OBsOacrOW6lw!5e0!3m2!1sja!2sjp!4v1487921286372",
      },
    };
  },
};
</script>

<style scoped lang="scss">
.shop-wrap {
  padding-bottom: 50px;
}
.shop-bottom-layout {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  max-width: 1300px;
  width: 95%;
  margin: 0 auto;
  @media screen and (max-width:1000px) {
    display: block;
  }
  .info {
    width: 70%;
    max-width: 900px;
    flex: 1;
    margin-right: 30px;
     @media screen and (max-width:1000px) {
      width: 95%;
      margin: 0 auto;
     }
  }
  .link {
    width: 350px;
    @media screen and (max-width:1000px) {
      width: 90%;
      margin: 30px auto;
    }
  }
}
</style>
