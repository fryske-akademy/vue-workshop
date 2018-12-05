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

<script>
export default {

  // Waardes die dit component ontvangt van de parent.
  // Niet wijzigen in dit component!
  props: {
    value: Object,            // nodig om dit component met v-model te laten werken
    maxLength: Number,
    placeholderText: String
  },

  // Methods die je bijv. kunt aanroepen in reactie op events
  methods: {

    // Wordt aangeroepen als de waarde van user of message verandert
    // Genereert een input event zodat dit component met v-model werkt
    valueChanged: function () {
      this.$emit('input', {
        user: this.$refs.fieldUserName.value,
        message: this.$refs.myTextArea.value
      });
    },

    // Zet de focus op het berichtenveld
    focus: function () {
      this.$refs.myTextArea.focus();
    }

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
