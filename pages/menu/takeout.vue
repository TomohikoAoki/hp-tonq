<template>
  <div class="takeout">
    <div class="takeout-top">
      <div class="top-title-area">
        <h2 class="takeout-top__title">
          <img src="~assets/image/menu/takeout/title-takeout.svg" />
        </h2>
      </div>
      <p class="takeout-top__text">
        専門店の味を、そのままテイクアウトしていただけます。
        素材にこだわり、ヘルシーな植物油を使って揚げているとんＱのとんかつは、
        出来立てはもちろんのこと、 冷めてもとっても美味しいですよ♪
        お土産や行楽、会議の合間の仕出し弁当、またお食事を作るのがちょっと面倒くさいな…
        なんていう時、いろんなシーンで、幅広くご利用下さい。
      </p>
    </div>
    <div class="takeout-menu">
      <section class="takeout-menu-section">
        <h3 class="section-title">
          <img
            src="~assets/image/menu/takeout/takeout-section-title01.svg"
            alt="やまと豚"
          />
        </h3>
        <div class="yamato-menu">
          <div class="yamato-menu__image">
            <img src="~assets/image/menu/takeout/takeout-image.webp" />
          </div>
          <TakeoutMenuVue
            :data="menuYamato"
            class="yamato-menu__list"
          ></TakeoutMenuVue>
        </div>
      </section>
      <section class="takeout-menu-section">
        <h3 class="section-title">
          <img
            src="~assets/image/menu/takeout/takeout-section-title02.svg"
            alt="赤城豚・国産豚"
          />
        </h3>
        <TakeoutMenuVue :data="menuAkagi" class="menu-list"></TakeoutMenuVue>
      </section>
      <section class="takeout-menu-section">
        <h3 class="section-title">
          <img
            src="~assets/image/menu/takeout/takeout-section-title03.svg"
            alt="味わい色々"
          />
        </h3>
        <TakeoutMenuVue :data="menuIroiro" class="menu-list"></TakeoutMenuVue>
      </section>
    </div>
  </div>
</template>

<script>
import TakeoutMenuVue from "../../components/menu/TakeoutMenu.vue";

export default {
  components: {
    TakeoutMenuVue,
  },
  data() {
    return {
      menuData: this.$store.getters["products/getMenuAllData"],
    };
  },
  computed: {
    //やまと豚をテイクアウト用に強引に変換
    //厚切りの値段をぶっこむ（値段の変更の場合にstoreの変更だけで済むように）
    menuYamato() {
      let yamato = this.menuData.filter((item) => item.category === 1);
      let roseCopy = Object.assign({}, JSON.parse(JSON.stringify(yamato[0])));
      roseCopy.price.push({ optionName: "240g", price: yamato[2].price });
      let hireCopy = Object.assign({}, JSON.parse(JSON.stringify(yamato[1])));
      hireCopy.price.push({ optionName: "240g", price: yamato[3].price });

      return [roseCopy, hireCopy];
    },
    //赤城豚をテイクアウト用に強引に変換
    //厚切りの値段をぶっこむ（値段の変更の場合にstoreの変更だけで済むように）
    menuAkagi() {
      let akagi = this.menuData.filter((item) => item.category === 2);
      let roseCopy = Object.assign({}, JSON.parse(JSON.stringify(akagi[0])));
      roseCopy.price.push({ optionName: "240g", price: akagi[2].price });
      let hireCopy = Object.assign({}, JSON.parse(JSON.stringify(akagi[1])));
      hireCopy.price.push({ optionName: "240g", price: akagi[3].price });

      return [roseCopy, hireCopy];
    },
    menuIroiro() {
      let array = this.menuData.filter((item) => {
        if (
          item.category === 3 ||
          (item.category === 4 && item.productId !== 24)
        ) {
          return true;
        }
      });

      return array;
    },
  },
};
</script>

<style scoped lang="scss">
.takeout-top {
  .top-title-area {
    height: 400px;
    background-image: url(~assets/image/menu/takeout/bg-takeout-top.webp);
    background-position: center;
    background-repeat: no-repeat;
    @media screen and (min-width:1450px) {
    background-size: cover;
  }
    .takeout-top__title {
      width: 400px;
      height: 400px;
      img {
        width: 100%;
      }
    }
  }
  &__text {
    max-width: 700px;
    margin: 0 auto;
    padding: 50px 0;
    line-height: 1.6em;
    font-size: 1.2em;
  }
}
.takeout-menu {
  border: 10px solid;
  border-image: url(~assets/image/menu/takeout/line-image.gif);
  border-image-slice: 33%;
  border-image-repeat: repeat;
  border-image-width: 25px;
  padding: 2%;
  max-width: 1200px;
  width: 95%;
  margin: 0 auto;
  .takeout-menu-section {
    margin: 0 0 30px 0;
    .section-title {
      max-width: 350px;
      margin: 2em 0 1.5em 0;
    }
  }
}
.yamato-menu {
  display: flex;
  flex-wrap: wrap;
  width: 95%;
  justify-content: center;
  align-items: center;
  &__image {
    max-width: 600px;
    margin-right: 20px;
    img {
      width: 100%;
    }
  }
  .yamato-menu__list {
    flex: 1;
    & ::v-deep .menu {
      width: 100%;
      margin: 0 0 20px 0;
      padding: 0.7em 0 0.7em 0.5em;
    }
  }
}
.menu-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: flex-start;
  & ::v-deep .menu {
    width: 43%;
  }
}
</style>
