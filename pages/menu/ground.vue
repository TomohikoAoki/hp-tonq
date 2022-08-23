<template>
  <div>
    <h1>グランドメニュー</h1>
    <nav>
      <ul class="ground-menu-navi">
        <li @click="currentComponent = 'YamatoVue'">やまと豚</li>
        <li @click="currentComponent = 'AkagiVue'">赤城豚</li>
        <li @click="currentComponent = 'EbiVue'">海老と一緒に</li>
        <li @click="currentComponent = 'IrodoriVue'">味わい彩々</li>
      </ul>
    </nav>
    <component :is="currentComponent"></component>
  </div>
</template>

<script>
import YamatoVue from "../../components/menu/Yamato.vue";
import AkagiVue from "../../components/menu/Akagi.vue";
import EbiVue from "../../components/menu/Ebi.vue";
import IrodoriVue from "../../components/menu/Irodori.vue";
import SideVue from "../../components/menu/Side.vue";

export default {
  components: {
    YamatoVue,
    AkagiVue,
    EbiVue,
    IrodoriVue,
    SideVue,
  },
  data() {
    return {
      currentComponent: 'YamatoVue'
    }
  }
};
</script>

<style lang="scss" scoped>
.ground-menu-navi {
  display: flex;
  li {
    border: 1px solid;
    cursor:pointer;
    padding: 1em;
  }
}
</style>
