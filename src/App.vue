<template>
  <div id="app">
    <h1>Kwetter</h1>
    <label><input type='checkbox' v-model='darkTheme' /> Dark theme</label>
    <MessageInput ref='messageInput' v-model="newMessage" @post-message="postMessage($event)" :maxLength="maxLength" />
    <button @click="postMessage" :disabled="!canPostMessage">Verstuur</button>
    <MessageFeedback :value="newMessage" :maxLength="maxLength" />
    <label>Zoek: <input v-model="zoek" /></label>
    <MessageList :messages="messagesToShow" :now="now" />
  </div>
</template>

<script lang="ts">
import { Component, Watch, Vue } from 'vue-property-decorator';
import MessageInput from './components/MessageInput.vue';
import MessageFeedback from './components/MessageFeedback.vue';
import MessageList from './components/MessageList.vue';

const BACKEND_URL = 'https://gwtp.net/jn/kwetter.php';

interface MessageType {
  message: string;
  user: string;
  time: number;
}

@Component({
  components: {
    MessageInput,
    MessageFeedback,
    MessageList,
  },
})
export default class App extends Vue {

  public $refs!: {
    messageInput: InstanceType<typeof MessageInput>,
  };

  private newMessage = {
    message: 'test',
    user: 'ik',
  };

  private now = (new Date()).getTime();

  // Maximale lengte van een bericht
  private maxLength = 40;

  // Berichten tot nu toe
  private messages: MessageType[] = [];

  // Do we want the dark theme?
  private darkTheme = false;

  // Are we in the process of posting a message?
  // If so, don't allow doubleposting
  private postInProgress = false;

  // Waar willen we op zoeken?
  private zoek = '';

  // Kan het bericht geplaatst worden, of niet? (leeg, te lang of geen naam gegeven)
  get canPostMessage() {
    return !this.postInProgress && this.newMessage.user.length > 0 &&
      this.newMessage.message.length > 0 && this.newMessage.message.length <= this.maxLength;
  }

  get messagesToShow() {
    if (this.zoek.length === 0)
      return this.messages;
    return this.messages.filter((m) => m.message.indexOf(this.zoek) >= 0 || m.user.indexOf(this.zoek) >= 0);
  }

  @Watch('darkTheme')
  private onDarkThemeChanged() {
    document.querySelector('body')!.classList.toggle('dark', this.darkTheme);
  }

  private mounted() {
    this.loadData();
    setInterval(() => {
      this.loadData();
    }, 10000);

    setInterval(() => {
      this.now = (new Date()).getTime();
    }, 1000);
  }

  private loadData() {
    // Get messages from backend
    Vue.axios.get(BACKEND_URL).then((response: { data: MessageType[] }) => {
      this.messages = response.data;
    });
  }

  // Post new message
  private postMessage() {
    if (!this.canPostMessage)
      return;
    const params = new URLSearchParams();
    params.append('message', this.newMessage.message );
    params.append('user', this.newMessage.user );
    params.append('time', (new Date()).getTime().toString() );
    this.postInProgress = true;
    Vue.axios.post(BACKEND_URL, params).
      then((response: any) => {
        this.messages = response.data;
        this.postInProgress = false;
      });
    this.newMessage.message = '';
    this.$refs.messageInput.focus();
  }

}
</script>

<style lang="scss">

body {

  &.dark {
    background-color: #333;
    color: white;

    li {
      color: black;
    }
  }

  color: #2c3e50;

}

label {
  padding: 10px;
}

#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
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