<template>
  <li>
    {{ message }}
  </li>
</template>

<script>
export default {

  props: {
    message: String,
    index: Number
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
