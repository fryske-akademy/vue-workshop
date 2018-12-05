<template>
  <div id="app">
    <h1>Kwetter</h1>
    <MessageInput ref='messageInput' v-model="newMessage" @post-message="postMessage($event)" :maxLength="maxLength" />
    <button @click="postMessage" :disabled="!canPostMessage">Verstuur</button>
    <MessageFeedback :value="newMessage" :maxLength="maxLength" />
    <MessageList :messages="messages" />
  </div>
</template>

<script>

import MessageInput from './components/MessageInput.vue';
import MessageFeedback from './components/MessageFeedback.vue';
import MessageList from './components/MessageList.vue';

export default {

  // Components die we gebruiken
  components: {
    MessageInput,
    MessageFeedback,
    MessageList
  },

  // Top-level app state
  data: function() {
    return {

      // Maximale lengte van een bericht
      maxLength: 40,

      // Berichten tot nu toe
      messages: [],

      // Het nieuwe bericht dat bewerkt wordt
      newMessage: {
        message: "",
        user: ""
      }
    };
  },

  computed: {
    // Kan het bericht geplaatst worden, of niet? (leeg, te lang of geen naam gegeven)
    canPostMessage: function () {
      return this.newMessage.user.length > 0 && this.newMessage.message.length > 0 && this.newMessage.message.length <= this.maxLength;
    }
  },

  // Methods die je in bijv. event handlers kunt aanroepen
  methods: {

    // Post new message
    postMessage: function() {
      this.messages.push({
        message: this.newMessage.message,
        user: this.newMessage.user,
        time: (new Date()).getTime()
      });
      this.newMessage.message = '';
      this.$refs.messageInput.focus();
    }

  }

}
</script>

<style>

#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  max-width: 15cm;
}

h1 {
  padding: 10px;
  margin: 0;
}

button {
  margin-left: 10px;
}

</style>