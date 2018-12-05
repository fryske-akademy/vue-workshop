<template>
  <ul>
    <Message v-for="(message, index) in messages.slice().reverse()" :message="message" :index="index" :key="index" />
  </ul>
</template>

<script>
import Message from './Message.vue';

export default {

  components: {
    Message
  },

  props: {
    messages: Array
  }

}
</script>

<style scoped>
ul {
  padding: 0 10px 10px 10px;
}
</style>
