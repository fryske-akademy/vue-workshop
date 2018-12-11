<template>
  <li :style='{ backgroundColor: userColor(message.user) }'>
    <b>{{ message.user }}</b>
    <span class='time-ago'>{{ timeAgo }}</span><br/>
    {{ message.message }}
  </li>
</template>

<script>

const COLORS = ['#ddd', '#fdd', '#dfd', '#ddf', '#ffd', '#dff', '#fdf', '#fff'];

export default {

  props: {
    message: Object,
    index: Number
  },

  // Dynamisch berekende props
  computed: {
    timeAgo: function () {
      let s = Math.floor( ((new Date()).getTime() - this.message.time) / 1000 );
      if (s < 20)
        return `zojuist`;
      if (s < 60)
        return `minder dan een minuut geleden`;
      if (s < 3600)
        if (s < 120)
          return `1 minuut geleden`;
        else
          return `${Math.floor(s / 60)} minuten geleden`;
      let dagen = Math.floor(s / 3600 / 24);
      if (dagen < 1)
        return `${Math.floor(s / 3600)} uur geleden`;
      return `${dagen} dag${ dagen > 1 ? "en" : ""} geleden`;
    }
  },

  methods: {
    userColor: function (name) {
      return COLORS[name.hashCode() % COLORS.length];
    }
  }
}
</script>

<style scoped>
li {
  list-style-type: none;
  padding: 10px;
  border: 1px solid #ddf;
  border-radius: 3px;
  background-color: #fff;
  margin-bottom: 5px;
}

.time-ago {
  margin-left: 10px;
  font-size: 80%;
  color: #888;
}
</style>
