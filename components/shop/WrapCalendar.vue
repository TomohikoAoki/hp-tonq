<template>
  <div>
    <div class="calendar-container">
      <div
        class="calendar-wrap"
        id="calendar-wrap"
        :class="{ slide: flag }"
        :style="cssVars"
      >
        <Calendar class="calendar" :year="year" :month="month"></Calendar>
        <Calendar class="calendar" :year="nextYear" :month="nextMonth"></Calendar>
      </div>
      <button class="btn btn-next" @click="moveCalendar" v-if="!flag">next</button>
      <button class="btn btn-prev" @click="moveCalendar" v-if="flag">prev</button>
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
      flag: false,
      year: null,
      month: null,
      nextYear: null,
      nextMonth: null
    };
  },
  computed: {
    cssVars() {
      return {
        "--moveWidth": `${this.moveWidth}px`,
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
    }
  },
  mounted() {
    this.GenerateDate()
  }
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
  .calendar-wrap {
    display: flex;
    flex-wrap: nowrap;
    width: 200%;
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
    top: 0;
    background-color: black;
    color: #fff;
    width: 50px;
  }
  .btn-next {
    right: 0;
  }
  .btn-prev {
    left: 0;
  }
}
</style>
