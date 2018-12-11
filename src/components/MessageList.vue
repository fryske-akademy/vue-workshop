<template>
  <ul>
    <Message :now="now" v-for="(message, index) in messages.slice().reverse()" :message="message" :index="index" :key="index" />
  </ul>
</template>

<script lang='ts'>
import { Component, Prop, Vue } from 'vue-property-decorator';
import Message from './Message.vue';
import MessageType from './App.vue';

@Component({
  components: {
    Message,
  },
})
export default class MessageList extends Vue {

  @Prop() private messages!: MessageType[];

  @Prop() private now!: number;

}
</script>

<style scoped>
ul {
  padding: 0 10px 10px 10px;
}
</style>
