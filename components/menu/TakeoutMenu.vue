<template>
  <div>
    <dl v-for="(menu, index) in data" :key="index" class="menu">
      <dt class="menu__name">{{ deleteSet(menu.name) }}</dt>
      <dd v-if="menu.description" class="description">
        {{ menu.description }}
      </dd>
      <dd v-if="menu.priceOption" class="menu__price">
        <p v-for="(price, index) in menu.price" :key="index">
          <span class="option-name">{{ price.optionName }}</span
          >&nbsp;&yen;{{ inTax(price.price).toLocaleString() }}
        </p>
      </dd>
      <dd v-else class="menu__price">
        <span v-if="menu.takeoutPrice"
          >&yen;{{ inTax(menu.takeoutPrice).toLocaleString() }}</span
        >
        <span v-else>&yen;{{ inTax(menu.price).toLocaleString() }}</span>
      </dd>
    </dl>
    <dl class="menu empty"></dl>
  </div>
</template>

<script>
export default {
  props: ["data"],
  methods: {
    //税込み価格表示用　8%
    inTax(price) {
      return Math.floor(Number(price) * 1.08).toLocaleString();
    },
    //定食の文字を削除して弁当に
    deleteSet(str) {
      return str.replace("定食", "弁当");
    },
  },
};
</script>

<style scoped lang="scss">
.menu {
  width: 100%;
  border-left: 5px solid;
  padding: 0.3em 0 0.3em 0.5em;
  margin: 0.5em 3%;
  box-sizing: border-box;
  &__name {
    font-size: 1.3em;
  }
  &__price {
    text-align: right;
    font-size: 1.3em;
  }
  &.empty {
    visibility: hidden;
    padding: 0;
  }
}
.option-name {
  font-size: 0.85em;
  &::before {
    content: "【";
  }
  &::after {
    content: "】";
  }
}
</style>
