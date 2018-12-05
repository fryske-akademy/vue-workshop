<template>
  <li>
    <b>{{ message.user }}</b>
    <span class='time-ago'>{{ timeAgo }}</span><br/>
    {{ message.message }}
  </li>
</template>

<script>
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
      return `${Math.floor(s / 3600)} uur geleden`;
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
