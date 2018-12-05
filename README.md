# Vue.js workshop voorbereiding

Het is handig om voor de workshop alvast de volgende software op je laptop te installeren:

* **Node.js**<br>
  Losse Javascript engine
* **Node Package Manager (npm)**<br>
  Build tool
* **TypeScript**<br>
  Een superset van Javascript met types
* **Vue CLI**<br>
  Commandline tool voor Vue projecten
* **Visual Studio Code**<br>
  Web development IDE
* **Vue devtools browser plugin**<br>
  Debugger voor Vue applicaties

Hieronder staan gedetailleerde instructies.

Verder kun je je hier vast een beetje inlezen:

* [Vue introductie](https://vuejs.org/v2/guide/)

Als je de Vue introductie gezien hebt, kan dit misschien ook interessant zijn:

* [TypeScript in 5 minutes](https://www.typescriptlang.org/docs/handbook/typescript-in-5-minutes.html)
* [Vuex intro tutorial](https://www.youtube.com/watch?v=_2_C9j-8CtM) (video)

## Installeer Node.js

Node.js is de V8 Javascript engine (van Chrome) zonder de browser erbij. Je hebt Node.js nodig om Javascript tools zoals npm en vue-cli te draaien.

### Windows/Mac:

[Download](https://nodejs.org/en/download/) en installeer de nieuwste (LTS) versie.

### Linux (Debian-based):

Snelle installatie:
```
sudo apt-get install nodejs
```

Dit installeert een wat oudere LTS (long-term support) versie van Node.js. Als je de nieuwste versie wilt installeren, moet je eerst de juiste [apt source toevoegen](https://github.com/nodesource/distributions/blob/master/README.md#installation-instructions).

## Update npm

npm is de Node Package Manager, een tool die libraries voor je downloadt en je project bouwt. (Java devs: het is dus vergelijkbaar met Maven). 

Node.js installeert automatisch een versie van npm, maar dit kan een oudere versie zijn. Het is verstandig om npm te updaten voor je aan de slag gaat.

```
[sudo] npm install -g npm@latest
```

> `-g` staat voor *globally*. Zonder deze optie wordt het pakket in je projectdirectory geïnstalleerd. Dat is wat je wilt voor libraries, maar niet voor algemene tools zoals npm.

## Installeer TypeScript

TypeScript is een superset van Javascript met optionele typing. De TypeScript compiler compileert je code naar gewone Javascript. Het voordeel van optionele typing is dat je code robuuster is en je features zoals refactoring kunt gebruiken.

```
[sudo] npm install -g typescript
```

## Installeer vue-cli

vue-cli (Vue command-line interface) maakt het eenvoudig om een Vue project op te zetten.

```
[sudo] npm install -g @vue/cli @vue/cli-init
```

## Installeer Visual Studio Code

Visual Studio Code is een open source IDE van Microsoft die met name erg geschikt is voor web development. TypeScript wordt (uiteraard) out of the box ondersteund. Het user interface lijkt veel op dat van bijv. Sublime Text, Atom en IntelliJ IDEA.

[Download](https://code.visualstudio.com/download) en installeer VS Code.

### Nuttige VS Code plugins

Het *Vue VS Code Extensions pack* is een verzameling plugins die het werken met Vue prettiger maken, met syntax highlighting, slimme autocomplete, etc.

Start VS Code, ga naar Extensions (vijfde icon van boven aan de linkerkant), zoek naar "Vue VS Code Extension pack" en installeer het. Klik daarna op Reload om de plugins te activeren.

### Installeer Vue devtools browser plugin
Deze plugin maakt het heel eenvoudig en prettig om Vue-applicaties te debuggen.

- [Firefox](https://addons.mozilla.org/en-US/firefox/addon/vue-js-devtools/)
- [Chrome](https://chrome.google.com/webstore/detail/vuejs-devtools/nhdogjmejiglipccpnnnanhbledajbpd)
