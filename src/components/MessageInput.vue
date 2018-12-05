<template>
  <div>
    <textarea 
      ref="myTextArea"

      placeholder="Wat is er aan de hand?" 
      autofocus
      :class="{ invalid: value.length > maxLength }" 

      :value="value"
      @input="valueChanged" 
      ></textarea>
  </div>
</template>

<script>
export default {

  // Waardes die dit component ontvangt van de parent.
  // Niet wijzigen in dit component!
  props: {
    value: String,            // nodig om dit component met v-model te laten werken
    maxLength: Number,
    placeholderText: String
  },

  // Methods die je bijv. kunt aanroepen in reactie op events
  methods: {

    // Wordt aangeroepen als de waarde van user of message verandert
    // Genereert een input event zodat dit component met v-model werkt
    valueChanged: function () {
      this.$emit('input', this.$refs.myTextArea.value);
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
