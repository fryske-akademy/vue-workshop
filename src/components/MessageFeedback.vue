<template>
  <p>
    ({{ numberOfWords }} woorden, {{ value.message.length }} / {{ maxLength }} tekens ({{ messageLengthComment }})
  </p>
</template>

<script>
export default {

  props: {
    value: Object,
    maxLength: Number
  },

  computed: {

    // Feedback op de lengte van je bericht (tekens over / te lang)
    messageLengthComment: function () {
      if (this.value.message.length <= this.maxLength)
        return `nog ${this.maxLength - this.value.message.length} tekens over`;
      if (this.value.message.length < this.maxLength * 1.5)
        return `${this.value.message.length - this.maxLength} tekens teveel`;
      return `Hee, rustig aan, Dostoevsky!`;
    },

    // Tel aantal woorden in bericht
    numberOfWords: function () {
      let m = this.value.message.trim();
      if (m.length === 0)
        return 0;
      return m.split(/\s+/).length;
    }

  }

}
</script>

<style scoped>
p {
  padding: 10px;
  margin: 0;
}
</style>
