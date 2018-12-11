<template>
  <div id="app" :class="{ dark: darkTheme }">
    <h1>Kwetter</h1>
    <label><input type='checkbox' v-model='darkTheme' /> Dark theme</label>
    <MessageInput ref='messageInput' v-model="newMessage" @post-message="postMessage($event)" :maxLength="maxLength" />
    <button @click="postMessage" :disabled="!canPostMessage">Verstuur</button>
    <MessageFeedback :value="newMessage" :maxLength="maxLength" />
    <label>Zoek: <input v-model="zoek" /></label>
    <MessageList :messages="messagesToShow" />
  </div>
</template>

<script>

import Vue from 'vue';
import MessageInput from './components/MessageInput.vue';
import MessageFeedback from './components/MessageFeedback.vue';
import MessageList from './components/MessageList.vue';

const BACKEND_URL = "https://gwtp.net/jn/kwetter.php";

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
      },

      // Do we want the dark theme?
      darkTheme: false,

      // Are we in the process of posting a message?
      // If so, don't allow doubleposting
      postInProgress: false,

      // Waar willen we op zoeken?
      zoek: ""
    };
  },

  computed: {
    // Kan het bericht geplaatst worden, of niet? (leeg, te lang of geen naam gegeven)
    canPostMessage: function () {
      return !this.postInProgress && this.newMessage.user.length > 0 && this.newMessage.message.length > 0 && this.newMessage.message.length <= this.maxLength;
    },

    messagesToShow: function () {
      if (this.zoek.length === 0)
        return this.messages;
      return this.messages.filter(m => m.message.indexOf(this.zoek) >= 0 || m.user.indexOf(this.zoek) >= 0);
    }
  },

  mounted: function () {
    this.loadData();
    setInterval(function () {
      this.loadData();
    }.bind(this), 10000); 
  },

  // Methods die je in bijv. event handlers kunt aanroepen
  methods: {

    loadData: function () {
      // Get messages from backend
      Vue.axios.get(BACKEND_URL).then((response) => {
        this.messages = response.data;
      });
    },

    // Post new message
    postMessage: function() {
      if (!this.canPostMessage)
        return;
      let params = new URLSearchParams();
      params.append('message', this.newMessage.message );
      params.append('user', this.newMessage.user );
      params.append('time', (new Date()).getTime() );
      this.postInProgress = true;
      Vue.axios.post(BACKEND_URL, params).then((response) => {
        this.messages = response.data;
        this.postInProgress = false;
      });
      this.newMessage.message = '';
      this.$refs.messageInput.focus();
    }

  }

}
</script>

<style lang="scss">

#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  max-width: 15cm;

  &.dark {
    background-color: #333;
    color: white;
  }

}

h1 {
  padding: 10px;
  margin: 0;
}

button {
  margin-left: 10px;
}

</style>