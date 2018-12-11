<template>
  <li :style='{ backgroundColor: userColor(message.user) }'>
    <b>{{ message.user }}</b>
    <span class='time-ago'>{{ timeAgo }}</span><br/>
    <span v-for="(part, index) in messageTokenized" :class="{ hl: part.highlight }" :key="index">
      {{ part.messagePart }}
    </span>
  </li>
</template>

<script>

const COLORS = ['#ddd', '#fdd', '#dfd', '#ddf', '#ffd', '#dff', '#fdf', '#fff'];

export default {

  props: {
    message: Object,
    index: Number,
    now: Number
  },

  // Dynamisch berekende props
  computed: {
    timeAgo: function () {
      let s = Math.floor( (this.now - this.message.time) / 1000 );
      //if (s < 20)
      //  return `zojuist`;
      if (s < 60)
        return `${s}s geleden`;
        //return `minder dan een minuut geleden`;
      if (s < 3600)
        if (s < 120)
          return `1 minuut geleden`;
        else
          return `${Math.floor(s / 60)} minuten geleden`;
      let dagen = Math.floor(s / 3600 / 24);
      if (dagen < 1)
        return `${Math.floor(s / 3600)} uur geleden`;
      return `${dagen} dag${ dagen > 1 ? "en" : ""} geleden`;
    },

    messageTokenized: function () {
      return this.message.message.
        replace(/(#\S+)/, "||$1||").
        split(/\|\|/).
        map( (part, index) => {
          return {
            messagePart: part,
            highlight: index % 2 !== 0
          }
        });
    }
  },

  methods: {
    userColor: function (name) {
      return COLORS[name.hashCode() % COLORS.length];
    }
  }
}
</script>

<style scoped lang='scss'>
li {
  list-style-type: none;
  padding: 10px;
  border: 1px solid #ddf;
  border-radius: 3px;
  background-color: #fff;
  margin-bottom: 5px;

  .hl {
    color: blue;
  }

}

.time-ago {
  margin-left: 10px;
  font-size: 80%;
  color: #888;
}
</style>
