<template>
  <div>
    <div class="calendar-container">
      <h2 class="calendar-container__title"><span>店休日</span></h2>
      <div
        class="calendar-wrap"
        id="calendar-wrap"
        :class="{ slide: flag }"
        :style="cssVars"
      >
        <Calendar
          class="calendar"
          :year="year"
          :month="month"
          :shopData="shopData"
        ></Calendar>
        <Calendar
          class="calendar"
          :year="nextYear"
          :month="nextMonth"
          :shopData="shopData"
          v-if="nextFlag"
        ></Calendar>
      </div>
      <button
        class="btn btn-next"
        @click="moveCalendar"
        v-if="!flag && nextFlag"
      >
        <span class="material-icons"> arrow_circle_right </span>
      </button>
      <button
        class="btn btn-prev"
        @click="moveCalendar"
        v-if="flag && nextFlag"
      >
        <span class="material-icons"> arrow_circle_left </span>
      </button>
    </div>
  </div>
</template>

<script>
import Calendar from "./Calendar.vue";

export default {
  components: {
    Calendar,
  },
  data() {
    return {
      moveWidth: 0,
      wrapWidth: 100,
      flag: false,
      nextFlag: false,
      year: null,
      month: null,
      nextYear: null,
      nextMonth: null,
    };
  },
  props: ["shopData"],
  computed: {
    cssVars() {
      return {
        "--moveWidth": `${this.moveWidth}px`,
        "--wrapWidth": `${this.wrapWidth}%`,
      };
    },
  },
  methods: {
    moveCalendar() {
      const wrapWidth = document.getElementById("calendar-wrap").clientWidth;
      this.moveWidth = -wrapWidth / 2;
      this.flag = !this.flag;
    },
    GenerateDate() {
      const currentDate = new Date();
      this.year = currentDate.getFullYear();
      this.month = currentDate.getMonth();
      this.nextYear = this.month < 11 ? this.year : this.year + 1;
      this.nextMonth = this.month < 11 ? this.month + 1 : 0;
    },
    checkNextMonth() {
      const next = this.shopData.close.find(
        (item) => item.month === this.nextMonth + 1
      );
      if (!next) {
        this.nextFlag = false;
        return;
      }
      this.wrapWidth = 200;
      this.nextFlag = true;
    },
  },
  mounted() {
    this.GenerateDate();
    this.checkNextMonth();
  },
};
</script>

<style lang="scss" scoped>
.calendar-container {
  max-width: 700px;
  width: 90%;
  margin: 0 auto;
  border: 1px solid;
  overflow: hidden;
  position: relative;
  &__title {
    text-align: center;
    font-weight: bold;
    margin: 1.7em 0 1.5em 0;
    font-size: 1.2em;
    span {
      display: inline-block;
      width: 150px;
      padding: 0.5em 1em;
      background-color: #3f3f3f;
      color: #fff;
      text-align-last: justify;
      border-radius: 5px;
    }
  }
  .calendar-wrap {
    display: flex;
    flex-wrap: nowrap;
    width: var(--wrapWidth);
    transition: transform 0.4s;
    &.slide {
      transition: transform 0.4s;
      transform: translateX(var(--moveWidth));
    }
    .calendar {
      width: 100%;
    }
  }

  .btn {
    position: absolute;
    top: 1.5em;
    color: #3f3f3f;
    width: 50px;
    span {
      font-size: 50px;
    }
  }
  .btn-next {
    right: 1em;
    @media screen and (max-width:450px) {
      right: 0.5em;
    }
  }
  .btn-prev {
    left: 1em;
    @media screen and (max-width:450px) {
      left: 0.5em;
    }
  }
}
</style>
