<template>
  <div>
    <ShopLayoutVue :shopId="shopId"></ShopLayoutVue>
  </div>
</template>

<script>
import ShopLayoutVue from "../../components/shop/Layout.vue";


export default {
  components: {
    ShopLayoutVue
  },
  data() {
    return {
      shopId: 5,
    };
  },
};
</script>
