<template>
  <div>
    <p class='username'>
      <input
        ref="fieldUserName"

        type='text' 
        placeholder="Wie ben je?"
        :class="{ invalid: value.user.length === 0 }" 

        :value="value.user" 
        @input="valueChanged" />
    </p>
    <textarea 
      ref="myTextArea"

      placeholder="Wat is er aan de hand?" 
      autofocus
      :class="{ invalid: value.message.length > maxLength }" 

      @keydown.enter.exact.prevent
      @keyup.enter.exact="$emit('post-message')"

      :value="value.message"
      @input="valueChanged" 
      ></textarea>
  </div>
</template>

<script lang='ts'>
import { Component, Prop, Vue } from 'vue-property-decorator';

@Component
export default class MessageInput extends Vue {

  public $refs!: {
    fieldUserName: HTMLFormElement,
    myTextArea: HTMLFormElement,
  };

  @Prop() private value!: {
    message: string,
    user: string,
  };

  @Prop() private maxLength!: number;

  // Zet de focus op het berichtenveld
  public focus() {
    this.$refs.myTextArea.focus();
  }

  // Wordt aangeroepen als de waarde van user of message verandert
  // Genereert een input event zodat dit component met v-model werkt
  private valueChanged() {
    this.$emit('input', {
      user: this.$refs.fieldUserName.value,
      message: this.$refs.myTextArea.value,
    });
  }

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
div {
  padding: 10px;
}

input, textarea {
  padding: 6px;
  border: 2px solid #aaf;
  border-radius: 4px;
  font-size: 14pt;
}

textarea {
  width: 14cm;
  height: 2cm;
}

.invalid {
  background-color: #fdd;
}

button {
  font-size: 12pt;
  margin-top: 10px;
}
</style>
