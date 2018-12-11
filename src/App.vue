<template>
  <div id="app" v-bind:style="{backgroundColor: bg, color: fg}">
    <h1>Kwetter</h1>
    <div class="theme">
      <label for="theme" >dark?</label><input id="theme" type="checkbox" @click="toggleTheme"/>
    </div>
    <MessageInput ref='messageInput' v-model="newMessage" @post-message="postMessage($event)" :maxLength="maxLength" />
    <button @click="postMessage" :disabled="!canPostMessage">Verstuur</button>
    <MessageFeedback :value="newMessage" :maxLength="maxLength" />
    <MessageList :messages="messages" />
  </div>
</template>

<script>

import Vue from 'vue';
import MessageInput from './components/MessageInput.vue';
import MessageFeedback from './components/MessageFeedback.vue';
import MessageList from './components/MessageList.vue';
import invert from 'invert-color';
import VueTimers from 'vue-timers/mixin'

const BACKEND_URL = "https://gwtp.net/jn/kwetter.php";

export default {
  mixins: [VueTimers],

  // Components die we gebruiken
  components: {
    MessageInput,
    MessageFeedback,
    MessageList
  },

  // timers
  timers: {
    laden: {time: 10000, autostart: true, repeat: true}
  },

  // Top-level app state
  data: function() {
    return {

      // Maximale lengte van een bericht
      maxLength: 40,

      // Berichten tot nu toe
      messages: [],

      // Dark
      dark: "#333333",
      // Light
      light: "#eeeeee",
      // current bg color
      bg: this.light,
      // current fg color
      fg: this.dark,
      // no double post
      posting: false,

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

  // Wordt aangeroepen als de app voor het eerst start
  mounted: function () {
    // Get messages from backend
    this.get();
  },

  // Methods die je in bijv. event handlers kunt aanroepen
  methods: {

    // Post new message
    postMessage: function() {
      if (this.posting===true) {
        return;
      }
      this.posting===true;
      let params = new URLSearchParams();
      params.append('message', this.newMessage.message );
      params.append('user', this.newMessage.user );
      params.append('time', (new Date()).getTime() );
      Vue.axios.post(BACKEND_URL, params).then((response) => {
        this.messages = response.data;
      }).finally(() => {this.posting=false;});
      this.newMessage.message = '';
      this.$refs.messageInput.focus();
    },

    toggleTheme: function() {
      this.bg = this.bg == this.dark ? this.light: this.dark;
      this.fg = invert(this.bg)
    },
    get: function() {
      Vue.axios.get(BACKEND_URL).then((response) => {
        this.messages = response.data;
      });
    },
    laden: function() {
      this.get();
    }



  }

}
</script>

<style>

#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  max-width: 15cm;
  margin: auto;
}

h1 {
  padding: 10px;
  margin: 0;
}

button {
  margin-left: 10px;
}
  div.theme {float: right; margin-top: -30px}

</style>