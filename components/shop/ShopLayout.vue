<template>
  <div>
    <div id="shop-image-box">
      <!--<picture>
        <source media="(min-width: 900px)" srcset="imgae/photo_tsukubal.jpg" />
        <source media="(min-width: 550px)" srcset="imgae/photo_tsukubam.jpg" />
        <source media="(min-width: 300px)" srcset="imgae/photo_tsukubas.jpg" />
        <img
          src="imgae/photo_tsukubal.jpg"
          alt="とんQつくば本店"
          class="shop-image"
        />
      </picture>-->
    </div>
    <div class="shop-top">
      <h1 class="shop-top__title"><span>とんかつとんＱ</span> つくば本店</h1>
      <p class="shop-top__text">
        とんかつとんQつくば本店は、平成２３年に農林水産大臣賞を受賞した<em>「やまと豚」のとんかつを中心に、お膳の５品（とんかつ・キャベツ・ご飯・味噌汁・お新香）にこだわるとんかつ専門店</em>。つくば万博が開催される３年前の昭和５８年に<em>茨城県つくば市</em>で創業して以来、こだわりの料理と心からの接客で、地域で１番のお店を目指しております。
      </p>
    </div>
    <div class="sns-area">
      <h2 class="sns-title"><span>店舗SNS</span></h2>
      <nav class="sns">
        <ul class="sns__list">
          <li class="sns__list__link">
            <a href="https://www.instagram.com/tonqtsukuba/?hl=ja"
              ><svg
                version="1.1"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 169.1 168.6"
              >
                <path
                  fill="#605b5b"
                  d="M84.8 65c-10.6 0-19.3 8.7-19.3 19.3s8.7 19.3 19.3 19.3 19.3-8.7 19.3-19.3S95.4 65 84.8 65zm32.3-27H52.4c-7.7 0-14 6.3-14 14v64.7c0 7.7 6.3 14 14 14h64.7c7.7 0 14-6.3 14-14V51.9c0-7.7-6.3-13.9-14-13.9zm-32.3 74.8c-15.7 0-28.5-12.8-28.5-28.5s12.8-28.5 28.5-28.5 28.5 12.8 28.5 28.5-12.8 28.5-28.5 28.5zm31.3-52.1c-3.9 0-7.1-3.2-7.1-7.1 0-3.9 3.2-7.1 7.1-7.1 3.9 0 7.1 3.2 7.1 7.1a7 7 0 01-7.1 7.1zM146.4 0H22.7C10.2 0 0 10.2 0 22.7v123.2c0 12.5 10.2 22.7 22.7 22.7h123.7c12.5 0 22.7-10.2 22.7-22.7V22.7c0-12.5-10.2-22.7-22.7-22.7zm-6.1 116.6c0 12.8-10.4 23.1-23.1 23.1H52.4c-12.8 0-23.1-10.4-23.1-23.1V51.9c0-12.8 10.4-23.1 23.1-23.1h64.7c12.8 0 23.1 10.4 23.1 23.1v64.7z"
                /></svg></a>
          </li>
        </ul>
      </nav>
    </div>
    <shopWrapCalendar></shopWrapCalendar>
    <nav class="shop-nav">
      <ul class="shop-nav__btn">
        <li id="smn_menu">
          <a class="lazyload">とんかつ御品書</a>
        </li>
        <li id="smn_lunch">
          <a class="lazyload">ランチメニュー</a>
        </li>
        <li id="smn_season">
          <a class="lazyload">季節のフェアメニュー</a>
        </li>
        <li id="smn_kodawari">
          <a class="lazyload">とんＱのこだわり</a>
        </li>
      </ul>
    </nav>
    <div class="shop-info">
      <div class="shop-info__list">
        <dl class="slist">
          <div class="slist__row">
            <dt>店名</dt>
            <dd id="shop_name">とんかつとんＱ つくば本店</dd>
          </div>
          <div class="slist__row">
            <dt>TEL</dt>
            <dd><a href="tel:0298524509">029-852-4509</a></dd>
          </div>
          <div class="slist__row">
            <dt>住所</dt>
            <dd>茨城県つくば市東新井13－12</dd>
          </div>
          <div class="slist__row">
            <dt>地図</dt>
            <dd>
              <iframe
                title="地図"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3224.6760462389316!2d140.10851385168883!3d36.07700491567257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60220c861812a0d7%3A0x20caf834271cd1af!2z44Go44KT44GL44Gk44Go44KTUeOBpOOBj-OBsOacrOW6lw!5e0!3m2!1sja!2sjp!4v1487921286372"
                frameborder="0"
                style="border: 0"
                allowfullscreen="true"
                aria-hidden="false"
                tabindex="0"
                id="map"
                height="450"
              ></iframe>
            </dd>
          </div>
          <div class="slist__row">
            <dt>交通手段</dt>
            <dd>TXつくば、つくば駅より徒歩12分</dd>
          </div>
          <div class="slist__row">
            <dt>営業時間</dt>
            <dd>
              【平日】<br />11:00 &#126; 21:00&nbsp;(L.O.20:30)<br />
              【土日祝】 <br />11:00 &#126; 22:00&nbsp;(L.O.21:30)<br />
              【ランチタイム※平日・土曜】 <br />
              11:00 &#126; 15:00
            </dd>
          </div>
          <div class="slist__row">
            <dt>店休日</dt>
            <dd>基本木曜日</dd>
          </div>
          <div class="slist__row">
            <dt>支払方法</dt>
            <dd>現金・クレジットカード・Paypay</dd>
          </div>
          <div class="slist__row">
            <dt>席数</dt>
            <dd>９１席（座敷席あり）</dd>
          </div>
          <div class="slist__row">
            <dt>個室</dt>
            <dd>なし</dd>
          </div>
          <div class="slist__row">
            <dt>駐車場</dt>
            <dd>有</dd>
          </div>
        </dl>
      </div>
      <nav class="shop-info__link">
        <div class="link-shop">
          <h3><span>その他の店舗</span></h3>
          <h4>茨城県</h4>
          <ul>
            <li><a>イーアスつくば店</a></li>
            <li><a>守谷ふれあい店</a></li>
            <li><a>水戸千波店</a></li>
          </ul>
          <h4>千葉県</h4>
          <ul>
            <li>
              <a href="narita.html"
                >成田<span class="sp_block">ニュータウン店</span></a
              >
            </li>
            <li>
              <a href="kashiwa.html"
                >柏高島屋<span class="sp_block">ｽﾃｰｼｮﾝﾓｰﾙ店</span></a
              >
            </li>
          </ul>
          <h4>埼玉県</h4>
          <ul>
            <li><a href="kasukabe.html">春日部店</a></li>
            <li><a href="fujimino.html">ふじみ野店</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</template>

<script>
import Calendar from './Calendar.vue';
export default {
    components: { Calendar }
};

</script>
