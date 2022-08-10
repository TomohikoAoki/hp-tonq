<template>
  <div class="calendar">
    <div class="calendar-title">{{ year }}年{{ month + 1 }}月</div>
    <table class="calendar-table">
      <thead class="calendar-head">
        <tr>
          <th>日</th>
          <th>月</th>
          <th>火</th>
          <th>水</th>
          <th>木</th>
          <th>金</th>
          <th>土</th>
        </tr>
      </thead>
      <tbody class="calendar-body">
        <tr
          v-for="(week, index) in calendars"
          :key="`week:${index}`"
          class="week"
        >
          <td
            v-for="(day, index) in week"
            :key="index"
            :class="[day.class, { sunday: index === 0 }]"
          >
            {{ day.date }}
          </td>
        </tr>
      </tbody>
    </table>
    <div class="calender__text"></div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      calendars: null,
    };
  },
  props: ["year", "month"],
  methods: {
    createCalendarBody() {
      const startDay = new Date(this.year, this.month, 1).getDay();
      const endDate = new Date(this.year, this.month + 1, 0).getDate();
      const weekNumber = Math.ceil((startDay + endDate) / 7);

      let calendars = [];
      let textDate = 1;

      for (let week = 1; week <= weekNumber; week++) {
        let array = [];
        for (let i = 0; i < 7; i++) {
          if (
            (week === 1 && i < startDay) ||
            (week === weekNumber && endDate < textDate)
          ) {
            array.push({
              date: null,
              class: `day date-${this.year}-${this.month}-null`,
            });
            continue;
          }

          array.push({
            date: textDate,
            class: `day date-${this.year}-${this.month}-${textDate}`,
          });
          textDate++;

        }

        calendars.push(array);
      }

      this.calendars = calendars;
    },
  },
  mounted() {
    if (this.year && this.month) this.createCalendarBody();
  },
  watch: {
    year() {
      if (this.month && !this.calendars) {
        this.createCalendarBody();
      }
    },
    month() {
      if (this.year && !this.calendars) {
        this.createCalendarBody();
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.calendar {
  width: 100%;
  padding-bottom: 20px;
  .calendar-title {
    text-align: center;
    font-weight: bold;
    padding: 1.5em 0 1.2em 0;
    font-size: 1.3em;
  }
  .calendar-table {
    width: 80%;
    margin: 0 auto;
    text-align: center;
    border: 1px solid;
    border-collapse: collapse;
  }
  .calendar-head {
    background-color: #666;
    tr {
      th {
        text-align: center;
        padding: 0.4em 0 0.2em 0;
      }
    }
  }
  .calendar-body {
    width: 80%;
    .week {
      .day {
        border: 1px solid #a9a9a9;
        background-color: #fff;
        padding: 1em 0;
        font-weight: bold;
        vertical-align: middle;
      }
      .day.sunday {
        background-color: #f0c187;
        color: #853007;
      }
    }
  }
}
</style>
