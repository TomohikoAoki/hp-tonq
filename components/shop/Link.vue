<template>
  <div class="shop-link">
    <h2 class="shop-link__title"><span>他の店舗</span></h2>
    <nav class="link-nav">
      <h3 class="link-nav__title">茨城県</h3>
      <ul class="nav">
        <li><nuxt-link to="">つくば本店</nuxt-link></li>
        <li><nuxt-link to="">イーアスつくば店</nuxt-link></li>
        <li><nuxt-link to="">水戸千波店</nuxt-link></li>
        <li><nuxt-link to="">守谷ふれあい店</nuxt-link></li>
      </ul>
      <h3>埼玉県</h3>
      <ul class="nav">
        <li><nuxt-link to="">春日部店</nuxt-link></li>
        <li><nuxt-link to="">ふじみ野店</nuxt-link></li>
      </ul>
      <h3>千葉県</h3>
      <ul class="nav">
        <li><nuxt-link to="">成田ニュータウン店</nuxt-link></li>
        <li><nuxt-link to="">柏高島屋店</nuxt-link></li>
      </ul>
    </nav>
  </div>
</template>

<style scoped lang="scss">
.shop-link {
  border: 1px solid;
  padding: 20px;
  box-sizing: border-box;
  &__title {
    text-align: center;
    @media screen and (min-width: 550px) {
      margin: 0;
    }
    span {
      background-color: #333;
      color: #fff;
      padding: 0.7em 1.2em;
      border-radius: 50px;
    }
  }
  .link-nav {
    &__title {
      margin: 30px 0 0 0;
    }
    .nav {
      margin: 0;
      padding: 0;
      li {
        line-height: 1.2em;
        font-size: 1.1em;
        margin: 0 0 0 1em;
        padding: 0.3em 0 0.3em 0;
        color: #3f3f3f;
        a {
          color: #3f3f3f;
        }
      }
    }
  }
}
</style>
