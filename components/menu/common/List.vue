<template>
  <div class="list-area">
    <dl class="list-wrap">
      <div class="list" v-for="(product, index) in products" :key="index">
        <dt class="list__name">{{ product.name }}</dt>
        <dd class="list__price">
          <span>&yen;{{ product.price }}(&yen;{{ product.priceInTax }})</span>
        </dd>
      </div>
    </dl>
  </div>
</template>

<script>
export default {
  props: ["products"],
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
  .list {
    display: flex;
    justify-content: space-between;
    width: 93%;
    margin: 0 auto;
    padding: 0 0 0.9em 0;
    font-size: 1.3em;
    box-sizing: border-box;
    &__name {
    }
    &__price {
    }
  }
  div.list:last-child {
    padding: 0;
  }
}
</style>
