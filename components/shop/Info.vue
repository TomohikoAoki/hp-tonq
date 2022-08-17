<template>
  <div class="shop-info">
    <dl class="s-list">
      <div class="s-list__row">
        <dt><span>店名</span></dt>
        <dd>{{ shopData.name }}</dd>
      </div>
      <div class="s-list__row">
        <dt><span>TEL</span></dt>
        <dd>{{ shopData.telephone }}</dd>
      </div>
      <div class="s-list__row">
        <dt><span>住所</span></dt>
        <dd>{{ generateAddress }}</dd>
      </div>
      <div class="s-list__row">
        <dt><span>マップ</span></dt>
        <dd>
          <iframe
            title="地図"
            :src="shopData.map"
            frameborder="0"
            style="border: 0"
            allowfullscreen="true"
            aria-hidden="false"
            tabindex="0"
            id="map"
            height="450"
          ></iframe>
        </dd>
      </div>
      <div class="s-list__row">
        <dt><span>交通手段</span></dt>
        <dd>{{ shopData.access }}</dd>
      </div>
      <div class="s-list__row">
        <dt><span>営業時間</span></dt>
        <dd>
          <!--平日土日祝営業時間が一緒の場合-->
          <div v-if="shopData.open.weekday === shopData.open.holiday">
            <p>{{ shopData.open.weekday }}</p>
          </div>
          <div v-else>
            <!--平日一つの場合-->
            <p class="time-title">【平日】</p>
            <div v-if="typeof shopData.open.weekday === 'string'">
              <p>{{ shopData.open.weekday }}</p>
            </div>
            <!--平日中休みがあるの場合-->
            <div v-if="typeof shopData.open.weekday === 'object'">
              <p>{{ shopData.open.weekday[0] }}</p>
              <p>{{ shopData.open.weekday[1] }}</p>
            </div>
            <p class="time-title">【土日祝】</p>
            <div>
              <p>{{ shopData.open.holiday }}</p>
            </div>
          </div>
          <p class="time-title">【ランチタイム】</p>
          <div>
            <p>{{ shopData.open.lunchTime }}</p>
          </div>
        </dd>
      </div>
      <div class="s-list__row">
        <dt><span>店休日</span></dt>
        <dd>{{ shopData.closeDays }}</dd>
      </div>
      <div class="s-list__row">
        <dt><span>支払方法</span></dt>
        <dd>{{ shopData.payment }}</dd>
      </div>
      <div class="s-list__row">
        <dt><span>席数</span></dt>
        <dd>{{ shopData.sheet }}</dd>
      </div>
      <div class="s-list__row">
        <dt><span>個室</span></dt>
        <dd>{{ shopData.privateRoom }}</dd>
      </div>
      <div class="s-list__row">
        <dt><span>駐車場</span></dt>
        <dd>{{ shopData.parking }}</dd>
      </div>
    </dl>
  </div>
</template>

<script>
export default {
  data() {
    return {
      shopData: this.$store.getters["shops/getShopData"](this.shopId),
    };
  },
  props: ["shopId"],
  computed: {
    generateAddress() {
      const address = this.shopData.address;

      return (
        address.addressRegion + address.addressLocality + address.streetAddress
      );
    },
  },
};
</script>

<style lang="scss" scoped>
.shop-info {
  border-top: double;
  border-bottom: double;
  @media screen and (max-width: 849px) {
    width: 95%;
  }
  @media screen and (max-width: 549px) {
    border: none;
  }
  .s-list {
    width: 95%;
    margin: 0 auto;
    display: table;
    border-spacing: 0;
    @media screen and (max-width: 549px) {
      display: block;
    }
    &__row {
      border-bottom: 1px dotted;
      padding: 20px 0;
      margin: 0;
      @media screen and (max-width: 550px) {
        border-bottom: none;
      }
      &:last-child {
        border-bottom: none;
      }
      dt {
        display: table-cell;
        padding: 0 1em;
        box-sizing: border-box;
        width: 130px;
        vertical-align: top;
        text-align: center;
        font-size: 1.05em;
        @media screen and (max-width: 550px) {
          display: block;
          font-size: 1em;
          width: 100%;
        }
        span {
          display: block;
          width: 110px;
          background-color: #3f3f3f;
          color: aliceblue;
          text-align: justify;
          text-align-last: justify;
          padding: 10px 15px;
          @media screen and (max-width: 550px) {
            margin: 0 auto;
            padding: 0.6em 0.5em 0.4em 0.5em;
            width: 40%;
            text-align: center;
            text-align-last: center;
            font-size: 1em;
            border-radius: 100px;
            letter-spacing: 0.15em;
          }
        }
      }
      dd {
        display: table-cell;
        width: 100%;
        padding: 10px 0;
        font-size: 1.1em;
        @media screen and (max-width: 550px) {
          display: block;
          margin: 20px 0 0 0;
          padding: 0;
          font-size: 1em;
          text-align: center;
          font-size: 1.2em;
        }
        .time-title {
          padding-top: 0.5em;
        }
        a {
          color: #3f3f3f;
        }
      }
    }
  }
  #map {
    width: 100%;
  }
}
</style>
