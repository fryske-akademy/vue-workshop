# Suggesties voor verbeteringen

+ zorg dat er bij berichten na 1 dag "X dagen geleden" staat
+ voeg een vinkje toe dat switcht tussen light / dark theme
  (dus lichte achtergrond met donkere tekst vs. andersom;
   hint: toggle een css class op de body die andere css-regels activeert)
+ geef iedere user's messages een eigen kleur op basis van username
  (hint: gebruik md5-hash modulo de lengte van een kleuren-array o.i.d.)
- ververs elke 10s de berichten van de server
- voorkom double-posts als je 2x snel op Verstuur klikt
- "zoek in berichttekst" functionaliteit
- "toon berichten van 1 auteur" functie (via selectielijst o.i.d.)

## Geavanceerd
- zorg dat #hashtags / @ mentions gekleurd worden in geposte berichten
- zorg dat de tijdvermeldingen "1 minuut geleden", etc. real-time meeveranderen
- gebruik vue-router om zoek/filter-opdrachten elk hun eigen URL te geven.
  dus bijv. /persoon/Frieda toont alleen berichten van Frieda
