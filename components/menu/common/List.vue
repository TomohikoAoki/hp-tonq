<template>
  <div class="list-area">
    <dl class="list-wrap">
      <div class="list" v-for="(product, index) in products" :key="index">
        <dt class="list__name">{{ product.name }}</dt>
        <dd v-if="product.priceOption" class="list__price">
          <p v-for="(price, index) in product.price" :key="index">
                <span class="option-name">{{ price.optionName }}</span><span>&yen;{{ price.price.toLocaleString() }}(&yen;{{ inTax(price.price) }})</span>
              </p>
        </dd>
        <dd v-else class="list__price">
          <span>&yen;{{ product.price.toLocaleString() }}(&yen;{{ inTax(product.price) }})</span>
        </dd>
      </div>
    </dl>
  </div>
</template>

<script>
export default {
  props: ["products"],
  methods: {
    inTax(price) {
      return Math.floor(Number(price) * 1.1).toLocaleString();
    },
  }
};
</script>

<style lang="scss" scoped>
.list-area {
  padding: 5% 0 10% 0;
}
.list-wrap {
  border-top: 3px solid;
  border-bottom: 3px solid;
  padding: 2em 0;
  max-width: 875px;
  width: 90%;
  box-sizing: border-box;
  margin: 0 0 0 3%;
  @media screen and (max-width:700px) {
      margin: 0 auto 0 auto;
    }
  .list {
    display: flex;
    justify-content: space-between;
    width: 93%;
    margin: 0 auto;
    padding: 0 0 0.9em 0;
    font-size: 1.3em;
    box-sizing: border-box;
    @media screen and (max-width:700px) {
      font-size: 1.1em;
    }
    @media screen and (max-width: 500px) {
      display: block;
    }
    &__name {
      @media screen and (max-width: 500px) {
        width: 90%;
      }
    }
    &__price {
      @media screen and (max-width: 500px) {
        text-align: right;
      }
    }
  }
  div.list:last-child {
    padding: 0;
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
</style>
