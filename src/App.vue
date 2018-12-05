<template>
  <div id="app">
    <h1>Kwetter</h1>
    <MessageInput ref='messageInput' v-model="newMessage" :maxLength="maxLength" />
    <button :disabled="!canPostMessage">Verstuur</button>
    <MessageFeedback :value="newMessage" :maxLength="maxLength" />
  </div>
</template>

<script>

import MessageInput from './components/MessageInput.vue';
import MessageFeedback from './components/MessageFeedback.vue';

export default {

  // Components die we gebruiken
  components: {
    MessageInput,
    MessageFeedback
  },

  // Top-level app state
  data: function() {
    return {

      // Maximale lengte van een bericht
      maxLength: 40,

      // Het nieuwe bericht dat bewerkt wordt
      newMessage: ""
    };
  },

  computed: {
    // Kan het bericht geplaatst worden, of niet? (leeg, te lang of geen naam gegeven)
    canPostMessage: function () {
      return this.newMessage.length > 0 && this.newMessage.length <= this.maxLength;
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