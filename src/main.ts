import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import App from './App.vue';

Vue.use(VueAxios, axios);

Vue.config.productionTip = false;

String.prototype.hashCode = function(this: string) {
  let hash = 0;
  if (this.length === 0) {
      return hash;
  }
  for (let i = 0; i < this.length; i++) {
      const char = this.charCodeAt(i);
      hash = ((hash << 5) - hash) + char;
      hash = hash & hash; // Convert to 32bit integer
  }
  return hash;
};

new Vue({
  render: (h) => h(App),
}).$mount('#app');
