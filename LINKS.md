# Diverse Vue features

## [Filters](https://vuejs.org/v2/guide/filters.html)
Veelvoorkomende tekstformatting vereenvoudigen, bijv.

    {{ message | capitalize }}

## [Watchers](https://vuejs.org/v2/guide/computed.html#Watchers)
Functies die aangeroepen worden telkens wanneer een property wijzigt.

## [Slots](https://vuejs.org/v2/guide/components-slots.html)
Plek in een component template waar de content tussen de template tags gerenderd wordt, zodat je bijv. een "custom link" component kunt maken. Dat je zo gebruikt:

```html
<custom-link href="http://vuejs.org/">My Custom Link</custom-link>
```

(De tekst "My Custom Link" wordt gerenderd in het `<slot></slot>` in het template)

## [Transitions](https://vuejs.org/v2/guide/transitions.html)
Support voor CSS transitions/animations voor verschijnende/verdwijnende elementen en meer.


# Interessante Vue plugins / gerelateerde projecten

## Layout: [bootstrap-vue](https://bootstrap-vue.js.org/)
Combineer Vue met Bootstrap. Schrijf elegante templates. Helpt met  WAI-ARIA accessibility support. Inclusief DataTables-achtige functionaliteit.

## Routing: [vue-router](https://router.vuejs.org/)
Single-page app met aparte "pages" met hun eigen URL.

## State management: [Vuex](https://vuex.vuejs.org/)
Alle data voor complexe Vue applicaties op een plek verzamelen.

## Server-side rendering: [Nuxt](https://medium.com/vue-mastery/10-reasons-to-use-nuxt-js-for-your-next-web-application-522397c9366b)
Schrijf 'universele webapps' die zowel op de server als op de client kunnen renderen. Betere load times, SEO, etc.

## Vue.js apps
Vue.js werkt met [NativeScript](https://www.nativescript.org/vue?utm_source=vue-js-org&utm_medium=website&utm_campaign=nativescript-awareness) en [Ionic 4](https://github.com/ionic-team/ionic/tree/master/vue) om native resp. hybride apps te kunnen bouwen.

# Andere nuttige Javascript-libraries

## [Axios](https://github.com/axios/axios)
XMLHttpRequest library gebaseerd op Promises.

## [lodash](https://lodash.com/)
Javascript utility library.

## [RxJS](https://rxjs-dev.firebaseapp.com/guide/overview)
Maakt het omgaan met asynchrone / event-driven code (bijv. HTTP requests) krachtiger en eenvoudiger.
