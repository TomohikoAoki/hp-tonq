<template>
  <div class="calendar">
    <div class="calendar-title"><span>{{ year }}</span>年<span>{{ month + 1 }}</span>月</div>
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
    <div class="calendar__text">
      <span class="close-day-title">店休日は</span>
      <span
        v-for="(day, index) in textCloseDays"
        :key="index"
        class="close-day-list"
        ><span :class="{'dotted-first':index === 0}">・</span><span class="close-day">{{ day }}</span
        >日</span
      >
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      calendars: null,
    };
  },
  props: ["year", "month", "shopData"],
  computed: {
    textCloseDays() {
      const close = this.shopData.close.find(
        (item) => item.month - 1 === this.month
      );
      if (close) {
        return close.day;
      }
      return [];
    },
  },
  methods: {
    createCalendarBody() {
      const startDay = new Date(this.year, this.month, 1).getDay();
      const endDate = new Date(this.year, this.month + 1, 0).getDate();
      const weekNumber = Math.ceil((startDay + endDate) / 7);

      let calendars = [];
      let textDate = 1;
      const close = this.shopData.close.find(
        (item) => item.month - 1 === this.month
      );

      for (let week = 1; week <= weekNumber; week++) {
        let array = [];
        for (let i = 0; i < 7; i++) {
          if (
            (week === 1 && i < startDay) ||
            (week === weekNumber && endDate < textDate)
          ) {
            array.push({
              date: null,
              class: `day date-${this.year}-${this.month + 1}-null`,
            });
            continue;
          }

          let obj = {
            date: textDate,
            class: `day date-${this.year}-${this.month + 1}-${textDate}`,
          };

          if (close) {
            if (close.day.includes(textDate)) obj.class = obj.class + " close";
          }

          array.push(obj);

          textDate++;
        }

        calendars.push(array);
      }

      this.calendars = calendars;
    },
  },
  mounted() {
    if (this.year && this.month && this.shopData) this.createCalendarBody();
  },
  watch: {
    year() {
      if (this.month && !this.calendars && this.shopData)
        this.createCalendarBody();
    },
    month() {
      if (this.month && !this.calendars && this.shopData)
        this.createCalendarBody();
    },
    shopData() {
      if (this.month && !this.calendars && this.year) this.createCalendarBody();
    },
  },
};
</script>

<style lang="scss" scoped>
.calendar {
  width: 100%;
  padding-bottom: 25px;
  .calendar-title {
    text-align: center;
    font-weight: bold;
    padding: 0em 0 0.7em 0;
    font-size: 1.3em;
    span {
      font-size: 1.2em;
    }
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
      .day.close {
        background-color: #853007;
        color: #fff;
      }
      .day.sunday.close {
        background-color: #853007;
        color: #fff;
      }
      .day.sunday {
        background-color: #f0c187;
        color: #853007;
      }
    }
  }
  .calendar__text {
    text-align: center;
    margin: 1em 0 0 0;
    font-size: 1.2em;
    @media screen and (max-width:600px) {
      font-size: 1.0em;
    }
    .close-day-title {
      display: inline-block;
    }
    .close-day-list {
      font-weight: bold;
      .close-day {
        font-size: 1.2em;
      }
      .dotted-first {
        display: none;
      }
    }
  }
}
.date-2022-8-11,
.date-2022-9-19,
.date-2022-9-23 {
  color: #853007;
}
</style>
