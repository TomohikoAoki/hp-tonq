<template>
  <div>
    <div class="lunch-top">
      <div class="top-title-area">
        <div class="title-wrap">
          <h1 class="lunch-top__title">LUNCH<span>ランチメニュー</span></h1>
        </div>
      </div>
      <p class="lunch-top__text">
        とんＱの自慢メニューがお得な価格で勢ぞろいのランチタイム。
        昼限定のメニューなども見逃せない美味しさです。
        ビジネスの合間や、ちょっと贅沢したいお昼に是非。
      </p>
    </div>
    <div>
      <dl class="menu-list list01">
        <div class="menu-list__content">
          <dt class="menu-name">とんＱロースランチ</dt>
          <dd class="menu-price">¥1,260(¥1,386)</dd>
        </div>
        <dd class="menu-list__image">
          <img src="~assets/image/menu/lunch/photo-lunch01.webp" />
        </dd>
      </dl>
      <dl class="menu-list list01">
        <div class="menu-list__content">
          <dt class="menu-name">国産ヒレランチ</dt>
          <dd class="menu-price">¥1,260(¥1,386)</dd>
        </div>
        <dd class="menu-list__image">
          <img src="~assets/image/menu/lunch/photo-lunch02.webp" />
        </dd>
      </dl>
      <div class="menu-list02-area">
        <dl class="menu-list list02">
          <div class="menu-list__content">
            <dt class="menu-name">海老＆ヒレランチ</dt>
            <dd class="menu-price">¥1,260(¥1,386)</dd>
          </div>
          <dd class="menu-list__image">
            <img src="~assets/image/menu/lunch/photo-lunch03.webp" />
          </dd>
        </dl>
        <dl class="menu-list list02">
          <div class="menu-list__content">
            <dt class="menu-name">やまと豚メンチ＆ヒレランチ</dt>
            <dd class="menu-price">¥1,260(¥1,386)</dd>
          </div>
          <dd class="menu-list__image">
            <img src="~assets/image/menu/lunch/photo-lunch04.webp" />
          </dd>
        </dl>
        <dl class="menu-list list02">
          <div class="menu-list__content">
            <dt class="menu-name">さつま芋鶏ランチ</dt>
            <dd class="menu-price">¥1,260(¥1,386)</dd>
          </div>
          <dd class="menu-list__image">
            <img src="~assets/image/menu/lunch/photo-lunch05.webp" />
          </dd>
        </dl>
        <dl class="menu-list list02">
          <div class="menu-list__content">
            <dt class="menu-name">かつ丼ランチ</dt>
            <dd class="menu-price">¥1,260(¥1,386)</dd>
          </div>
          <dd class="menu-list__image">
            <img src="~assets/image/menu/lunch/photo-lunch06.webp" />
          </dd>
        </dl>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.lunch-top {
  .top-title-area {
    height: 400px;
    background-image: url(~assets/image/menu/lunch/bg-lunch-top.webp);
    background-position: center;
    background-repeat: no-repeat;
    @media screen and (min-width: 1450px) {
      background-size: cover;
    }
    .title-wrap {
      max-width: 1500px;
      margin: 0 auto;
      height: 400px;
      position: relative;
      .lunch-top__title {
        font-weight: bold;
        font-size: 31px;
        width: 400px;
        text-align: center;
        position: absolute;
        bottom: 50px;
        left: 30px;
        filter: drop-shadow(0 0 5px #fff) drop-shadow(0 0 7px #fff)
          drop-shadow(0 0 10px #fff);
        span {
        }
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

.list01 {
  display: flex;
  flex-wrap: wrap;
  flex-direction: row-reverse;
  justify-content: center;
  .menu-list__content {
    .menu-name {
    }
    .menu-price {
    }
  }
  .menu-list__image {
  }
}
.menu-list02-area {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  max-width: 1100px;
  margin: 0 auto;
  .list02 {
    display: flex;
    flex-direction: column-reverse;
    max-width: 485px;
    margin: 1em;
    .menu-list__content {
      font-size: 1.4em;
      border-left: 5px solid;
      padding-left: 0.5em;
      padding-top: 0.3em;
      padding-bottom: 0.3em;
      .menu-name {
      }
      .menu-price {
      }
    }
    .menu-list__image {
    }
  }
}
</style>
