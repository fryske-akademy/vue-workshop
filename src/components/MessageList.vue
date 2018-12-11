<template>
  <ul>
    <Message :now="now" v-for="(message, index) in messages.slice().reverse()" :message="message" :index="index" :key="index" />
  </ul>
</template>

<script>
import Message from './Message.vue';

export default {

  components: {
    Message
  },

  props: {
    messages: Array,
    now: Number
  }

}
</script>

<style scoped>
ul {
  padding: 0 10px 10px 10px;
}
</style>
