<template>
  <div class="ebi">
    <div class="main-content">
      <h2 class="main-content__title">
        <img src="~assets/image/menu/title-ebi.svg" alt="海老の組み合わせ" />
      </h2>
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
      bgColor: '#fff',
      photoMenus: null,
      products: null,
    };
  },
  methods: {
    fetchMenus() {
      const Data = this.$store.getters['products/getMenuData'](3)
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
$bg-color: #fff;
.ebi {
  background-color: $bg-color;
  .main-content {
    max-width: 1360px;
    margin: 0 auto;
    padding: 50px 0;
    &__title {
      text-align: center;
      @media screen and (max-width: 750px) {
        margin-bottom: 40px;
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
  }
}

</style>
