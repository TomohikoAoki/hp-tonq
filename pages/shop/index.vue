<template>
  <div class="main-contents shop">
    <h1 class="shop_title">
      <span class="h1wrap"
        >店舗紹介<span class="sub-h1">Store introduction</span></span
      >
    </h1>
    <nav class="shop-nav-wrap">
      <div class="shop-nav">
        <h2 class="shop-nav__title">茨城県</h2>
        <ul class="shop-nav__link">
          <li class="shop-link">
            <nuxt-link to="/shop/tsukuba"
              ><div class="shop-link__image">
                <img src="~assets/image/shop/top-nav01.webp" />
              </div>
              <dl class="shop-link__info">
                <dt>つくば本店</dt>
                <dd>茨城県つくば市東新井13-12</dd>
                <dd>029-852-1085</dd>
              </dl></nuxt-link
            >
          </li>
          <li class="shop-link">
            <nuxt-link to=""
              ><div class="shop-link__image">
                <img src="~assets/image/shop/top-nav07.webp" />
              </div>
              <dl class="shop-link__info">
                <dt>イーアスつくば店</dt>
                <dd>茨城県つくば市研究学園5-19</dd>
                <dd>029-852-1085</dd>
              </dl></nuxt-link
            >
          </li>
          <li class="shop-link">
            <nuxt-link to=""
              ><div class="shop-link__image">
                <img src="~assets/image/shop/top-nav02.webp" />
              </div>
              <dl class="shop-link__info">
                <dt>水戸千波店</dt>
                <dd>茨城県水戸市千波町1999-5</dd>
                <dd>029-852-1085</dd>
              </dl></nuxt-link
            >
          </li>
          <li class="shop-link">
            <nuxt-link to=""
              ><div class="shop-link__image">
                <img src="~assets/image/shop/top-nav03.webp" />
              </div>
              <dl class="shop-link__info">
                <dt>守谷ふれあい店</dt>
                <dd>茨城県守谷市立沢991-8</dd>
                <dd>029-852-1085</dd>
              </dl></nuxt-link
            >
          </li>
        </ul>
      </div>
      <div class="shop-nav">
        <h2 class="shop-nav__title">埼玉県</h2>
        <ul class="shop-nav__link">
          <li class="shop-link">
            <nuxt-link to=""
              ><div class="shop-link__image">
                <img src="~assets/image/shop/top-nav05.webp" />
              </div>
              <dl class="shop-link__info">
                <dt>春日部店</dt>
                <dd>埼玉県春日部市備後東3-17-15</dd>
                <dd>029-852-1085</dd>
              </dl></nuxt-link
            >
          </li>
          <li class="shop-link">
            <nuxt-link to=""
              ><div class="shop-link__image">
                <img src="~assets/image/shop/top-nav06.webp" />
              </div>
              <dl class="shop-link__info">
                <dt>ふじみ野店</dt>
                <dd>埼玉県ふじみ野市鶴ケ舞3-7-5</dd>
                <dd>029-852-1085</dd>
              </dl></nuxt-link
            >
          </li>
        </ul>
      </div>
      <div class="shop-nav">
        <h2 class="shop-nav__title">千葉県</h2>
        <ul class="shop-nav__link">
          <li class="shop-link">
            <nuxt-link to=""
              ><div class="shop-link__image">
                <img src="~assets/image/shop/top-nav04.webp" />
              </div>
              <dl class="shop-link__info">
                <dt>成田ニュータウン店</dt>
                <dd>千葉県成田市江弁須96-31</dd>
                <dd>029-852-1085</dd>
              </dl></nuxt-link
            >
          </li>
          <li class="shop-link">
            <nuxt-link to=""
              ><div class="shop-link__image">
                <img src="~assets/image/shop/top-nav08.webp" />
              </div>
              <dl class="shop-link__info">
                <dt>柏高島屋<span class="ib">ステーションモール店</span></dt>
                <dd>千葉県柏市末広町1-1新館11階</dd>
                <dd>029-852-1085</dd>
              </dl></nuxt-link
            >
          </li>
        </ul>
      </div>
      <div class="shop-nav"></div>
    </nav>
  </div>
</template>

<style lang="scss" scoped>
.shop {
  background-color: #ffffff;
  padding-bottom: 50px;
  background-repeat: no-repeat;
  background-image: url(~assets/image/shop/indextop.jpg);
  background-position: top left;
  @media screen and (max-width: 699px) {
    background-image: url(~assets/image/shop/indextops.jpg);
    background-position: top center;
    background-size: contain;
    margin: 0;
    position: relative;
  }
  &_title {
    width: 100%;
    max-width: 1600px;
    font-size: 6.0em;
    height: 570px;
    margin: 0 auto;
    color: #483e3e;
    padding: 50px 0 0 0;
    text-align: center;
    position: relative;
    @media screen and (max-width: 849px) {
      font-size: 5em;
    }
    @media screen and (max-width: 699px) {
      height: auto;
      color: #fff;
      width: 100%;
      max-width: 100%;
      font-size: 13vw;
      margin: 0 auto;
      padding: 0;
      filter: drop-shadow(0 0 5px #000) drop-shadow(0 0 7px #000) drop-shadow(0 0 10px #000)
    }
    &::before {
      @media screen and (max-width: 699px) {
        width: 100%;
        content: "";
        display: block;
        padding: 97.38% 0 0 0; /* 高さを幅の75%に固定 */
      }
    }
    .h1wrap {
      display: block;
      width: 500px;
      margin: 0 0 0 auto;
      @media screen and (max-width: 849px) {
         width: 400px;
      }
      @media screen and (max-width: 699px) {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 30px;
        margin: 0 auto;
        width: 100%;
      }
      @media screen and (max-width: 500px) {
        bottom: 20px;
      }
      .sub-h1 {
        display: block;
        font-size: 0.3em;
        font-weight: normal;
      }
    }
  }
}

.shop-nav-wrap {
  max-width: 900px;
  margin: 0 auto;
  width: 100%;
  .shop-nav {
    margin: 40px auto 0 auto;
    &__title {
      font-weight: bold;
      font-size: 1.8em;
      text-align: center;
      padding: 2em 0 2em 0;
      letter-spacing: 0.3em;
      @media screen and (max-width: 550px) {
        padding: 1em 0 1.5em 0;
      }
    }
    &__link {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      width: 98%;
      margin: 0 auto;
      .shop-link {
        width: 45%;
        max-width: 350px;
        margin: 0 20px 40px 20px;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        filter: drop-shadow(0 0 3px #222) grayscale(70%);
        &:hover {
          filter: drop-shadow(0 0 3px #222) brightness(90%) grayscale(0%);
        }
        @media screen and (max-width: 780px) {
          margin: 0 1% 40px 1%;
        }
        @media screen and (max-width: 550px) {
          width: 45%;
          margin: 0 1.3% 5% 1.3%;
        }
        a {
          display: block;
          width: 100%;
          padding: 20px;
          @media screen and (max-width: 780px) {
            padding: 20px 10px;
          }
          @media screen and (max-width: 550px) {
            padding: 0;
          }
          .shop-link__image {
            max-width: 300px;
            background-color: #483e3e;
            margin: 0 auto;
            img {
              width: 100%;
            }
          }
          .shop-link__info {
            max-width: 300px;
            margin: 0 auto;
            @media screen and (max-width: 550px) {
              padding: 10px 7px 13px 7px;
              box-sizing: border-box;
            }
            dt {
              font-weight: bold;
              font-size: 1.2em;
              padding: 0.6em 0 0.4em 0;
              @media screen and (max-width: 550px) {
                font-size: 4.0vw;
                text-align: center;
              }
            }
            dd {
              font-size: 1.0em;
              @media screen and (max-width: 550px) {
                font-size: 0.75em;
                display: none;
              }
            }
          }
        }
      }
    }
  }
}
</style>
