<template>
  <div class="ground-menu">
    <h1>グランドメニュー</h1>
    <nav>
      <ul class="ground-menu-navi">
        <li @click="current = 0">やまと豚</li>
        <li @click="current = 1">赤城豚</li>
        <li @click="current = 2">海老と一緒に</li>
        <li @click="current = 3">味わい彩々</li>
      </ul>
    </nav>
    <div class="menu-area">
      <component :is="currentComponent"></component>
    </div>
    <div class="controller" :class="{ 'non-fixed': footerInterSecting }">
      <div class="btn btn-prev" @click="prevComponents()">prev</div>
      <div class="home"><nuxt-link to="/menu/">home</nuxt-link></div>
      <div class="btn btn-next" @click="nextComponents()">next</div>
    </div>
  </div>
</template>

<script>
import YamatoVue from "../../components/menu/Yamato.vue";
import AkagiVue from "../../components/menu/Akagi.vue";
import EbiVue from "../../components/menu/Ebi.vue";
import IrodoriVue from "../../components/menu/Irodori.vue";

export default {
  components: {
    YamatoVue,
    AkagiVue,
    EbiVue,
    IrodoriVue,
  },
  data() {
    return {
      current: 0,
      ArrayComponents: ["YamatoVue", "AkagiVue", "EbiVue", "IrodoriVue"],
    };
  },
  computed: {
    currentComponent() {
      return this.ArrayComponents[this.current];
    },
    footerInterSecting() {
      return this.$store.getters["options/getFooterInterSecting"];
    },
  },
  methods: {
    prevComponents() {
      window.scrollTo({
        top: 0,
      });
      if (this.current === 0) {
        this.current = this.ArrayComponents.length - 1;
        return false;
      }
      this.current--;
    },
    nextComponents() {
      window.scrollTo({
        top: 0,
      });
      if (this.current === this.ArrayComponents.length - 1) {
        this.current = 0;
        return false;
      }
      this.current++;
    },
  },
};
</script>

<style lang="scss" scoped>
.ground-menu {
  position: relative;
}
.ground-menu-navi {
  display: flex;
  li {
    border: 1px solid;
    cursor: pointer;
    padding: 1em;
  }
}
.menu-area {
  position: relative;
  &::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: calc(50% + 320px);
    padding-top: 30%;
    background-image: url(~assets/image/menu/bg-yamato01.svg);
    background-size: contain;
    background-repeat: no-repeat;
    @media screen and (max-width: 750px) {
      content: "";
      right: 0;
      top: 0;
      left: 0;
      padding-top: 40%;
      max-width: 500px;
      margin: 0 auto;
      background-image: url(~assets/image/menu/bg-menu-top.svg);
      background-size: contain;
      background-repeat: no-repeat;
    }
  }
  &::after {
    content: "";
    position: absolute;
    bottom: 0;
    right: 0;
    left: calc(50% + 320px);
    padding-top: 30%;
    background-image: url(~assets/image/menu/bg-yamato02.svg);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: bottom right;
  }
}
.controller {
  display: flex;
  justify-content: center;
  position: fixed;
  bottom: 0;
  background-blend-mode: darken;
  background: rgb(0, 0, 0);
  background: linear-gradient(
    180deg,
    rgba(0, 0, 0, 0) 0%,
    rgba(0, 0, 0, 0.20090293453724606) 21%,
    rgba(0, 0, 0, 0.8781038374717833) 85%,
    rgba(0, 0, 0, 1) 100%
  );
  z-index: 1;
  width: 100%;
  padding: 20px 0;
  &.non-fixed {
    position: absolute;
  }
  .btn {
    height: 70px;
    width: 70px;
    background-color: darkcyan;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    cursor: pointer;
    color: #fff;
    &.btn-prev {
      margin-right: 20px;
    }
    &.btn-next {
      margin-left: 20px;
    }
  }
  .home {
    color: #fff;
    height: 70px;
    width: 140px;
    border-radius: 10px;
    background-color: navy;
    a {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100%;
    }
  }
}
</style>
