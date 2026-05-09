# CLAUDE.md

Reference voor Claude Code-sessies en voor mezelf later. Wanneer iets hier drift van de werkelijke code, update deze file in dezelfde commit als de code-wijziging.

## Project

**kayhardam.dev** — persoonlijke indie portfolio.

Vakleerkracht sport in het Nederlandse VSO (RENN4). Bouw open-source sport- en lesgeef-tools als oefening in design + development met AI. Leer Laravel from scratch, zero PHP-ervaring.

Single-page scroll. NL primair, EN-toggle gepland. Secties: hero met live demo, about, tools, field notes, footer.

**Designfilosofie**: function-first, niet identity-first. Geen "kijk wat ik kan", wel "hier zijn dingen die werken". De site dient zichzelf en wie er iets aan heeft.

## Stack

- Laravel 13 (PHP 8.3+)
- Blade + Tailwind v4 via Vite
- Markdown voor field notes via `Str::markdown()` of `league/commonmark` (zit in framework)
- Self-hosted fonts via `@fontsource/inter` en `@fontsource/jetbrains-mono`
- Geen database
- Hosting: Laravel Cloud Starter (EU Frankfurt). Domein via Cloudflare DNS-only (geen proxy/oranje wolk — Laravel Cloud heeft eigen edge).

## Design tokens

Indie/brutalist met highlighter yellow als bijna-enige accent. Tokens leven in `resources/css/app.css` als `@theme`-block:

```css
@theme {
    --color-bg: #fcfaf4;          /* warm cream wit */
    --color-fg: #0f0f0f;          /* near-black */
    --color-fg-soft: #3d3d3d;     /* secundaire body-tekst */
    --color-muted: #6b6b6b;       /* mono labels, h2-subtitles */
    --color-muted-light: #9a9a9a; /* tekst op donkere bg (lab-block) */
    --color-accent: #ffe54b;      /* highlighter yellow, golden niet chartreuse */
    --color-accent-hover: #f5c518;/* CTA-button hover */
    --color-divider: #e5e0d5;     /* subtiele rule-lijnen */

    --font-sans: 'Inter', system-ui, sans-serif;
    --font-mono: 'JetBrains Mono', ui-monospace, monospace;
}
```

### Yellow-discipline

Yellow alleen voor accent, niet decoratie. Op de live homepage staat geel op vijf plekken: drie section-labels (rechthoekige pills met mono), één lab-tag binnen het donkere demo-block, en de lab-CTA-button. Elk heeft functie.

Wat **niet** yellow is: tag-pills, link-underlines, github-button-fills, footer-links, nav-pills. Als het terugkruipt op die plekken, dan kruipt yellow terug van accent naar decoratie. Dat is de val.

Vuistregel: als yellow op meer dan ~5% van de viewport voorkomt op enig moment, is het te veel.

### Casing

- Display headings: **lowercase** ("kay hardam", "wat ik bouw")
- Body, paragrafen: **sentence case** ("Vakleerkracht sport in het...")
- Mono labels: **UPPERCASE** met letter-spacing 0.04–0.08em ("WAT IS DIT", "01 / OVER")
- Inline links in body: zoals omringende tekst

### Edges

Geen `border-radius`. Brutalist commitment. Section-pills, lab-block, buttons — allemaal scherp. Eén ronde corner ergens kraakt het hele systeem.

### Type-aanpak

Geen vaste type-scale-tokens. Tailwind defaults + arbitrary values per gebruik. Bijvoorbeeld:
- Hero: `text-[64px] md:text-[88px]`
- Section h2: `text-[38px]`
- Body: `text-[15px]`
- Lead: `text-[17px]`
- Mono labels: `text-[11px]`

Houdt flexibiliteit. Tokeniseren als patronen vaak genoeg terugkomen om te verdienen.

## Code-conventies

- Tailwind utility-first inline. Custom utilities via `@utility` alleen bij ≥5× repetitie.
- CSS custom properties via `@theme` voor tokens. Worden auto-generated als utilities (`bg-accent`, `text-muted`, etc.).
- Vanilla JS, geen framework. Modules in `resources/js/`, geïmporteerd vanuit `app.js`.
- Locale: NL primair in markup en copy. EN volgt als de site er om vraagt.
- Honest empty states: als een sectie nog leeg is (tools, notes), zég dat. Geen placeholder-cards die fake gewicht geven.

## Git-commits

Lowercase imperatief, kort, zelf-omschrijvend.

- ✓ `add hero section`
- ✓ `refine homepage: restrained yellow, sharp edges`
- ✓ `add open graph tags + share image`
- ✗ `feat: implement homepage refinement (closes #12)`

Geen conventional-commits-prefixes. Geen issue-refs. Geen emojis. Korte zinnen die zichzelf uitleggen.

### Niet onderhandelbaar

**NEVER include "Co-authored-by Claude" of soortgelijke AI-attributie** in commits, PRs, code-comments, README, file headers, of waar dan ook. Code is van mij. Sessies met Claude zijn tooling, geen co-authorship.

## Sessies met Claude Code

1. Laat eerst CLAUDE.md en CONTENT.md lezen
2. Eén focus-area per sessie (één feature, één refactor) — niet mixen
3. Refereer tokens en sectie-namen bij naam
4. Commits volgen bovenstaande regels — geen attributie, geen ceremonie

## Living document

Wanneer een token, conventie of beslissing verandert, update deze file in dezelfde commit als de code. Toekomstige sessies (Claude of mens) moeten kunnen reconstrueren wat de intent was zonder externe context.
