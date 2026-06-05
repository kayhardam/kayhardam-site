# design-richting — kayhardam.dev

_vastgelegd na de sessie van 2 juni 2026. doel: volgende sessie kan meteen bouwen._
_grond blijft: voor mezelf, duurzaam tempo, terughoudend. de look verandert, de soberheid van aanpak niet._

## de richting in één zin

diep-donker tahoe — een warme, persoonlijke docent-bouwer-site met blauw→violet als accent, glas spaarzaam, en beweging (muybridge) als handtekening. gebouwd vanuit de gymzaal.

## invloeden

warmte en het persoonlijke: kleine letter, een mens in het midden, thema-toggle. structuur uit pill-tags, kaarten en zelfverzekerde sectiekoppen — als losse componenten, niet als dichte catalogus. macos tahoe voor de kleurwereld en de glas-flow.

## vast

**modus** — donker eerst (tahoe). lichte variant + toggle is optioneel, later.

**tokens (donker):**

```
--paper  #12173a   diep indigo, achtergrond
--card   #1b2150   paneel / kaart
--ink    #eef0ff   tekst
--muted  #9aa0cc   secundaire tekst
--line   #2b3270   rand / divider
--acc    #6f8cff   blauw — primair: nav, knoppen, links, ▸
--acc2   #9b86ff   violet — alleen beweging / accentmoment
```

_lichte variant (uitgesteld): paper #f7f4ec · card #fffdf8 · ink #171411 · muted #6e665a · line #e7e0d2 · acc #2f54eb · acc2 #6b46e8._

**accent-logica** — blauw draagt, violet licht alleen op bij beweging. twee tonen die de tahoe-flow nadoen zonder dat het overal blauw wordt (bewust: "deel accent anders"). accent blijft spaarzaam, ~5% van het beeld.

**glas** — alleen op de echte site, niet in mocks. doorschijnende panelen (rgba over indigo) + `backdrop-filter: blur()` boven een blauw→violet verloop. spaarzaam: nav en kaarten, niet overal. de terughouding maakt het van mij — anders wordt het een zoveelste liquid-glass-site.

**typografie** — inter + jetbrains mono blijven, self-hosted. lowercase display, LOWERCASE mono labels.

**hoeken** — zachte radius: rounded-2xl (16px) kaarten, rounded-lg (8px) knoppen. dit vervangt de oude "no border-radius"-regel.

**layout-dna** — zelfverzekerde lowercase hero-kop, warme persoonlijke stem, pill-tags voor wayfinding en identiteit.

## de handtekening — filmische muybridge

de hero krijgt een handbal-worp: de loper neemt aanloop → wordt handballer → gooit een bal die het canvas af gaat.

- uitbreiding van de bestaande `x-muybridge` component — zelfde 4-frame svg-aanpak, maar worp-frames (aanloop → uithaal → release).
- de bal verlaat de viewport via een transform voorbij de rand.
- frame-overgang: view transitions of css-steps.
- trigger: scroll-gedreven (speelt af bij het in-scrollen van de hero), filmischer dan hover.
- `prefers-reduced-motion` respecteren. beweging is sowieso opt-in en lokaal — geen constante auto-animatie; oplichten waar de cursor is.

## wat meekomt uit het bestaande systeem

server-first laravel 13 + blade + tailwind v4, geen db, markdown-content. de tool-accent-pattern (`.tool-*`) blijft: per-tool kleuren (team-shuffler blauw, leerdoel-coach koraal) leven naast het blauw/violet van de site-chrome. bestaande inhoud — case, tools — blijft live.

## bouwvolgorde

op een branch, sectie voor sectie. de live site blijft de hele tijd draaien — geen "under construction". volgorde: nav → hero → footer, daarna de rest. de worp bouwen we wanneer de hero aan de beurt is (dán tekenen we de frames). conventional commits, geen ai-attributie.

## nog open

- lichte variant + thema-toggle (donker eerst).
- een mens in het midden? jouw gezicht, een beeld uit de gymzaal, of blijft de baan de enige "persoon" op de pagina? identiteitskeuze, nog te maken.
- exacte glas-intensiteit, en de parabool- en scroll-choreografie van de worp.
