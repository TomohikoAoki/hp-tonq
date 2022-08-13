<template>
  <div>
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
  </div>
</template>

<script>
import Calendar from './Calendar.vue';
import Information from './Info.vue'
export default {
    components: { Calendar,Information }
};

</script>
